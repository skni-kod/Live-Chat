<?php

namespace App\Services;

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
}
