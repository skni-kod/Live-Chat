<?php

namespace App\Http\Controllers\Conversation;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Visitor;
use App\Services\ChatService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Ramsey\Uuid\Uuid;
use Stevebauman\Location\Facades\Location;

class ClientConversationController extends ConversationController
{
    private function creatingConversationValidation(Request $request)
    {
        if (!$request->filled('user_id', 'app_id', 'user_data')) return false;
    }

    private function updateVisitorData($data)
    {
        Visitor::updateOrCreate(['visitor_id' => $data['visitor_id']], ['ip' => $data['ip'], 'city' => $data['city'], 'country' => $data['country'], 'system' => $data['system'], 'browser' => $data['browser'], 'browser_version' => $data['browser_version'], 'visits' => 0, 'chats' => 0]);

    }

    private function hasActiveConversation($visitorId)
    {

    }

    private function getVisitorActiveConversation($visitorId)
    {
        $result = Conversation::where('visitor_id', '=', $visitorId)->where('status', '<>', 'closed')->limit(1)->first();
        if ($result) return $result->toArray();
        else return [];
    }

    protected function loadConversationMessages($chat_user)
    {
        $activeConversation = $this->getVisitorActiveConversation($chat_user);
        if (isset($activeConversation['id'])) return $this->getConversationMessages($activeConversation['id']);
        return [];
    }

    public function loadBaseConversation(Request $request, $visitorId, $appId)
    {
        $agent = new Agent();
        $platform = $agent->platform();
        $browser = $agent->browser();
        $version = $agent->version($browser);
        $ip = $request->ip();
        $currentUserInfo = Location::get($ip);
        $city = $currentUserInfo->cityName ?? '';
        $country = $currentUserInfo->countryName ?? '';
        $data = [
            'ip' => $ip,
            'visitor_id' => $visitorId,
            'city' => $city,
            'country' => $country,
            'system' => $platform,
            'browser' => $browser,
            'browser_version' => $version
        ];

        $this->updateVisitorData($data);
        $messages = $this->loadConversationMessages($visitorId);
        $chatService = new ChatService();
        $chat = $chatService->getChatSettingsByAppid($appId);

        $chatHtml = view('chat_templates.basic', ['chat' => $chat])->render();
        $response = [
            'status' => 'ok',
            'data' => ['chat_html' => $chatHtml, 'messages' => $messages, 'chat_css' => asset(config('chat_settings.css'))]
        ];
        return response()->json($response);
    }

    public function sendMessage(Request $request)
    {
        $visitorId = $request->input('visitor_id');
        $activeConversation = $this->getVisitorActiveConversation($visitorId);
        if (!isset($activeConversation['id'])) {
            return false;
        }
//        echo '<pre>';
//        print_r($activeConversation);
//        echo '</pre>';
        //echo $request->input('message');
        //echo $activeConversation['id'];
        $this->insertMessage($activeConversation['id'], null, $visitorId, $request->input('message'));
        return true;
    }

    public function joinConversation(Request $request)
    {
        // TODO: Implement joinConversation() method.
    }

    public function createConversation(Request $request)
    {
        try{
            $id = Uuid::uuid4();
            Conversation::create(['id' => $id, 'app_id' => $request->input('app_id'), 'visitor_id' => $request->input('visitor_id'), 'agent_id' => null, 'status' => 'created']);
        } catch(QueryException $e){
            return response()->json(['status' => 'error', 'message' => 'Nie udało się utworzyć konwersacji'], 400);
        }

        return response()->json(['status' => 'ok', 'conversation_id' => $id]);
    }


}

