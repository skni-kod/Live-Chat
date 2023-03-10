<?php

namespace App\Http\Controllers\Conversation;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class SupportConversationController extends ConversationController
{

    protected function loadConversationMessages($chat_user){

    }

    public function sendMessage(Request $request){

    }

    public function joinConversation()
    {
        // TODO: Implement joinConversation() method.
    }
}
