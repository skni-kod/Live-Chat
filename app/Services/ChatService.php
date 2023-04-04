<?php

namespace App\Services;

use App\Events\SupportCall;
use App\Models\Team;
use App\Models\TeamMember;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Chat;

class ChatService{

    public function getChatSettings($userId){
        return DB::table('chat_settings')
            ->where('team_id', '=', function ($query) use ($userId) {
                $query->select('team_id')
                    ->from('team_members')
                    ->where('user_id', '=', $userId);
            })
            ->first();
    }

    public function getChatSettingsByAppid($appId){
        return DB::table('chat_settings')
            ->where('team_id', function($query) use ($appId) {
                $query->select('id')
                    ->from('teams')
                    ->where('app_id', '=', $appId);
            })
            ->first();
    }

    public function getConversations($conversationsId){
        return DB::table('conversations as c')
            ->rightJoin(DB::raw('(SELECT message, conversation_id, created_at AS last_message_created_at FROM messages WHERE created_at IN (SELECT MAX(created_at) FROM messages GROUP BY conversation_id)) AS m '), function($join){
                $join->on('c.id', '=', 'm.conversation_id');
            })
            ->leftJoin('visitors', 'visitors.visitor_id', '=', 'c.visitor_id')
            ->whereIn('c.id',  $conversationsId)
            ->get();
    }

    private function getSupportChannels($conversationId){
        $channels = [];
        $results = DB::table('team_members as t')
            ->select('t.user_id', 'c.agent_id')
            ->leftJoin('teams', 't.team_id', '=', 'teams.id')
            ->leftJoin('conversations as c', function($join) use($conversationId) {
                $join->on('teams.app_id', '=', 'c.app_id')
                    ->where('c.id', '=', $conversationId);
            })
            ->get();

        foreach($results as $result){
            if($result->agent_id == $result->user_id || is_null($result->agent_id)) $channels[] = 'support'.$result->user_id;
        }
        return $channels;
    }

    public function supportChatsRefresh($conversationId, $isSupportAgent = false){
        $supportChannels = $this->getSupportChannels($conversationId);
        $conversationData = $this->getConversations([$conversationId])[0];
        event(new SupportCall($supportChannels, $conversationData, $isSupportAgent));
    }

    public static function agentConversationExist($userId, $conversationId){
        return DB::table('conversations')
            ->where('app_id', '=', function ($query) use ($userId) {
                $query->select('app_id')
                    ->from('teams')
                    ->where('id', '=', function ($query) use ($userId) {
                        $query->select('team_id')
                            ->from('team_members')
                            ->where('user_id', '=', $userId);
                    });
            })
            ->where('id', '=', $conversationId)
            ->where(function($query) use ($userId){
                $query->orWhere('agent_id', '=', $userId)->orWhereNull('agent_id');
            })
            ->exists();
    }
}
