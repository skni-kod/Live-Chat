<?php

namespace App\Http\Controllers\Conversation;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Validator;


class SupportConversationController extends ConversationController
{

    protected function loadConversationMessages($chat_user){

    }

    public function sendMessage(Request $request){
        //Do poprawy walidacja, wartości z configa
        $rules = [
          'conversation_id' => 'required|string|exists:conversations,id,agent_id,' . auth()->user()->id, 'message' => 'required|string|max:200'
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
        Conversation::where('id', '=', $request->input('conversation_id'))
            ->update(['agent_id' => $agent_id]);

        $messages = $this->getConversationMessages($request->input('conversation_id'));
        $response = [
            'status' => 'ok',
            'data' => $messages
        ];
        return response()->json($response);
    }

}
