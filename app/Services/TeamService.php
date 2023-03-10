<?php

namespace App\Services;

use App\Models\Team;
use App\Models\TeamMember;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeamService{
    private function generateUniqueId($tableName, $columnName, $length){
        do{
            $string = Str::random($length);
        } while(DB::table($tableName)->where($columnName, $string)->exists());
        return $string;
    }

    public function createTeam($creatorId){
        $appId = $this->generateUniqueId('teams', 'app_id', 16);
        $join_code = $this->generateUniqueId('teams', 'join_code', 9);

        $team = Team::create([
            'team_creator' => $creatorId,
            'app_id' => $appId,
            'join_code' => $join_code
        ]);

        TeamMember::create([
            'user_id' => $creatorId,
            'team_id' => $team->id,
            'edit_chat_settings' => 1
        ]);
    }

    public function getTeamAppId($userId){
        //Team::select('app_id')->where('')
    }
}
