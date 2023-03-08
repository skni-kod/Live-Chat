<?php

namespace App\Http\Controllers\Conversation;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class ClientConversationController extends ConversationController
{
    private function creatingConversationValidation(Request $request){
        if(!$request->filled('user_id', 'app_id', 'user_data')) return false;
    }

    private function updateVisitorData($visitorid){
        Visitor::updateOrCreate(['visitor_id' => $visitorid], ['ip' => '', 'city' => '', 'country' => '', 'system' => '', 'browser' => '', 'browser_version' => '', 'visits' => 0, 'chats' => 0]);

    }

    private function hasActiveConversation($visitorId){

    }

    public function createConversation($visitorId){
        Conversation::create(['visitor_id' => $visitorId, 'agent_id' => null, 'status' => 'created']);

        //Conversation::createConversation($visitorId, , 'started');
    }

    private function getVisitorActiveConversation($visitorId){
        return Conversation::where('visitor_id', '=', $visitorId)->where('status', '<>', 'closed')->limit(1)->first()->toArray();
    }

    protected function loadConversationMessages($chat_user){
        $activeConversation = $this->getVisitorActiveConversation($chat_user);
        if(isset($activeConversation['id'])) return $this->getConversationMessages($activeConversation['id']);
        return [];
    }

    public function loadBaseConversation($chat_user){
        $agent = new Agent();
        $platform = $agent->platform();
        $browser = $agent->browser();
        $version = $agent->version($browser);
        $this->updateVisitorData($chat_user);
        $messages = $this->loadConversationMessages($chat_user);
        $response = [
            'status' => 'ok',
            'data' => ['chat_html' => '', 'messages' => $messages]
        ];
        return response()->json($response);
    }

    public function sendMessage(Request $request){
        $visitorId = $request->input('visitor_id');
        $activeConversation = $this->getVisitorActiveConversation($visitorId);
        if(!isset($activeConversation['id'])){
            $this->createConversation($visitorId);
            $activeConversation = $this->getVisitorActiveConversation($visitorId);
        }
//        echo '<pre>';
//        print_r($activeConversation);
//        echo '</pre>';
        //echo $request->input('message');
        //echo $activeConversation['id'];
        $this->insertMessage($activeConversation['id'], null, $visitorId, $request->input('message'));
    }

    public function joinConversation()
    {
        // TODO: Implement joinConversation() method.
    }


}
