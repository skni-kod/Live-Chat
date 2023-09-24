<?php

namespace App\Http\Controllers\Conversation;

use App\Models\Visitor;
use App\Events\CloseChat;
use Jenssegers\Agent\Agent;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Services\ChatService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class SupportConversationController extends ConversationController
{
    public function sendMessage(Request $request){
        $rules = [
          'conversation_id' => 'required|string|exists:conversations,id,agent_id,' . auth()->user()->id, 'message' => 'required|string|max:'.config('conversation.message_max_length')
        ];

        $json = $request->getContent();
        $data = json_decode($json, true);
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error_message' => $validator->errors()], 400);
        }

        $this->insertMessage($data['conversation_id'], auth()->user()->id, null, $data['message']);
        return response()->json(['status' => 'ok'], 200);
    }

    public function joinConversation(Request $request)
    {
        $agent_id = auth()->user()->id;
        if(!$request->has('conversation_id')) return response()->json(['status' => 'error', 'message' => 'Niepoprawne ID konwersacji']);
        $conversationId = $request->input('conversation_id');
        if(!$this->conversationExist($conversationId)) return response()->json(['status' => 'error', 'message' => 'Niepoprawne ID konwersacji']);
        Conversation::where('id', '=', $conversationId)
            ->update(['agent_id' => $agent_id]);

        $messages = $this->getConversationMessages($request->input('conversation_id'));
        $response = [
            'status' => 'ok',
            'data' => $messages
        ];
        return response()->json($response);
    }

    public function getFullConversationList(){
        $agentConversations = Conversation::select('id')->where('agent_id', '=', auth()->user()->id)->orWhereNull('agent_id')->get()->pluck('id');
        $chatService = new ChatService();
        $chats = $chatService->getConversations($agentConversations);
        $response = [
            'status' => 'ok',
            'data' => $chats
        ];
        return response()->json($response);
    }

    private function conversationExist($conversationId){
        return ChatService::agentConversationExist(auth()->user()->id, $conversationId);
    }

    private function setConversationClosedState($conversationId){
        Conversation::where('id', '=', $conversationId)->update(['status' => 'closed']);
        $chatService = new ChatService();
        $chatService->supportChatsRefresh($conversationId, true);
    }

    public function closeConversation(Request $request){
        if(!filled($request->conversation_id)) return response()->json(['status' => 'error', 'message' => 'Niepoprawne ID konwersacji'], 400);
        if(!$this->conversationExist($request->conversation_id)) return response()->json(['status' => 'error', 'message' => 'Podana konwersacja nie istnieje'], 400);
        $this->setConversationClosedState($request->conversation_id);
        event(new CloseChat($request->conversation_id));
        return response()->json(['status' => 'ok', 'Konwersacja została zamknięta']);
    }

}
