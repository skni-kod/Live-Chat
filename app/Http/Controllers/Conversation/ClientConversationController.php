<?php

namespace App\Http\Controllers\Conversation;

use App\Models\Team;
use Ramsey\Uuid\Uuid;
use App\Models\Visitor;
use App\Events\CloseChat;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Services\ChatService;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Stevebauman\Location\Facades\Location;

class ClientConversationController extends ConversationController
{
    private function creatingConversationValidation(Request $request)
    {
        if (!$request->filled('user_id', 'app_id', 'user_data')) return false;
    }

    private function createVisitorid()
    {
        do {
            $visitorId = Str::random(12);
        } while ($this->visitorExist($visitorId));
        return $visitorId;
    }

    private function updateVisitorData($data, $visitorId, $isNewVisit = false)
    {
        Visitor::updateOrCreate(['visitor_id' => $visitorId], ['ip' => $data['ip'], 'city' => $data['city'], 'country' => $data['country'], 'system' => $data['system'], 'browser' => $data['browser'], 'browser_version' => $data['browser_version'], 'chats' => 0]);
        if ($isNewVisit) Visitor::where('visitor_id', $visitorId)->increment('visits');
    }

    private function visitorExist($visitorId)
    {
        if (empty($visitorId)) return false;
        $visitor = Visitor::where('visitor_id', $visitorId)->first();
        if ($visitor) return true;
        return false;
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

    private function appIdExist($appId)
    {
        return Team::where('app_id', '=', $appId)->exists();
    }

    private function validateConversationLoading($request, $appId)
    {
        if (!$request->has('visitor_id') || !$request->has('visited')) return response()->json(['status' => 'error', 'Wystąpił błąd podczas ładowania chatu']);
        if (empty($appId) || !$this->appIdExist($appId)) return response()->json(['status' => 'error', 'Niepoprawne ID chatu']);
    }

    public function loadBaseConversation(Request $request, $appId)
    {
        $this->validateConversationLoading($request, $appId);
        $agent = new Agent();
        $visitorId = $request->input('visitor_id');
        $platform = $agent->platform();
        $browser = $agent->browser();
        $version = $agent->version($browser);
        $ip = $request->getClientIp(true);
        //$ip = $request->ip();
        $currentUserInfo = Location::get($ip);
        $city = $currentUserInfo->cityName ?? '';
        $country = $currentUserInfo->countryName ?? '';
        $data = [
            'ip' => $ip,
            'city' => $city,
            'country' => $country,
            'system' => $platform,
            'browser' => $browser,
            'browser_version' => $version,
        ];

        if ($request->input('visited') == 0) $isNewVisit = true;
        else $isNewVisit = false;

        if (!$this->visitorExist($visitorId)) $visitorId = $this->createVisitorid();
        $this->updateVisitorData($data, $visitorId, $isNewVisit);
        $messages = $this->loadConversationMessages($visitorId);
        $chatService = new ChatService();
        $chat = $chatService->getChatSettingsByAppid($appId);

        $chatHtml = view('chat_templates.basic', ['chat' => $chat])->render();
        $response = [
            'status' => 'ok',
            'data' => ['chat_html' => $chatHtml, 'messages' => $messages, 'chat_css' => asset(config('chat_settings.css')), 'visitor_id' => $visitorId]
        ];
        return response()->json($response);
    }

    private function validateSendMessage($request)
    {
        if (!$request->has('visitor_id') || !$request->has('message') || !$request->has('app_id')) return response()->json(['status' => 'error', 'message' => 'Wszystkie pola są wymagane']);
        if (!$this->appIdExist($request->input('app_id'))) return response()->json(['status' => 'error', 'message' => 'Niepoprawne ID konwersacji']);
        if (!$this->visitorExist($request->input('visitor_id'))) return response()->json(['status' => 'error', 'message' => 'Niepoprawny ID klienta. Odśwież stronę i spróbuj ponownie']);
        if (strlen($request->input('message')) > config('conversation.message_max_length') || strlen($request->input('message')) == 0) return response()->json(['statu' => 'error', 'message' => 'Niepoprawna długość wiadomości']);
    }

    public function sendMessage(Request $request)
    {
        $this->validateSendMessage($request);
        $visitorId = $request->input('visitor_id');
        $activeConversation = $this->getVisitorActiveConversation($visitorId);
        if (!isset($activeConversation['id'])) return response()->json(['status' => 'error', 'message' => 'Wybrana konwersacja nie istnieje lub jest zamknięta']);
        $this->insertMessage($activeConversation['id'], null, $visitorId, $request->input('message'));
    }

    public function createConversation(Request $request)
    {
        $visitorId = $request->input('visitor_id');
        if (!$this->visitorExist($visitorId)) return response()->json(['status' => 'error', 'message' => 'Nieprawidłowy identyfikator użytkownika'], 400);

        try {
            $id = Uuid::uuid4();
            Conversation::create(['id' => $id, 'app_id' => $request->input('app_id'), 'visitor_id' => $visitorId, 'agent_id' => null, 'status' => 'created']);
        } catch (QueryException $e) {
            return response()->json(['status' => 'error', 'message' => 'Nie udało się utworzyć konwersacji'], 400);
        }

        return response()->json(['status' => 'ok', 'conversation_id' => $id]);
    }

    public function closeConversation(Request $request)
    {
        $visitorId = $request->input('visitor_id');
        if (!$this->visitorExist($visitorId)) return response()->json(['status' => 'error', 'message' => 'Nieprawidłowy identyfikator użytkownika'], 400);
        $activeConversation = $this->getVisitorActiveConversation($visitorId);
        if(!empty($activeConversation)){
            Conversation::where('id', $activeConversation['id'])->update(['status' => 'closed']);
            $chatService = new ChatService;
            $chatService->supportChatsRefresh($activeConversation['id'], false);
            return response()->json(['status' => 'ok']);
        }
        return response()->json(['status' => 'error', 'message' => 'Podana kowersacja nie istnieje'], 400);
    }
}
