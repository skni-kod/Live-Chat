<?php

namespace App\Http\Controllers\Conversation;

use App\Events\SupportCall;
use App\Http\Controllers\Controller;
use App\Services\ChatService;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Message;
use App\Events\NewChatMessage;
use Illuminate\Support\Facades\DB;

abstract class ConversationController extends Controller
{
    abstract public function joinConversation(Request $request);
    abstract protected function loadConversationMessages($chat_user);
    abstract public function sendMessage(Request $request);

    protected function getConversationAgent($appid){
        return 2;
        //Team::select('')->where('app_id', '=', $appid)->get();
    }

    protected function getConversationMessages($conversationId){
        return Message::where('conversation_id', '=', $conversationId)->get();
    }

    protected function insertMessage($conversationId, $agentId, $visitorId, $message){
        Message::create([
            'conversation_id' => $conversationId,
            'agent_id' => $agentId,
            'visitor_id' => $visitorId,
            'message' => $message
        ]);

        $isSupportAgent = !is_null($agentId);

        event(new NewChatMessage($message, $isSupportAgent, $conversationId));
        $chatService = new ChatService();
        $chatService->supportChatsRefresh($conversationId);

        return response()->json([], 200);
    }
}
