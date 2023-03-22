<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\Profile;
use App\Models\User;
use App\Models\TeamMember;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        // Tu biore TeamID od aktualnie zalogowanego użytkownika
        $currentTeamId = Team::join('team_members', 'teams.id', '=', 'team_members.team_id')
            ->where('team_members.user_id', Auth::user()->id)
            ->value('teams.id');

        // Znajduje odpowiedni zespół
        $team = Team::find($currentTeamId);

        if ($team) {
            // Jeśli isntieje taki teamZbieram wszystkich użytkowników którzy są w mojej drużynie
            $teamMembers = $team->members()->pluck('user_id');

            // No i tu zbieram wszystkie informacje które chce wyświetlić na stronce
            $userData = User::whereIn('id', $teamMembers)->get();
            $profileData = Profile::whereIn('user_id', $teamMembers)->get();

            // Merguje to wszystko w jedno i zwracam usera
            $userData = $userData->map(function ($user) use ($profileData) {
                $profile = $profileData->where('user_id', $user->id)->first();
                $user->profile_name = $profile->name;
                $user->avatar = $profile->avatar;
                return $user;
            });
            $joinCode = $team->join_code;

        } else {
            // jak nie ma druzyny zeby nie wyjebalo errora to mam taki warunek
            $userData = collect();
            $joinCode = null;

        }

        // No i tu zwracam sie do stronki teammmanager.blade.php z tym co udało mi się zebrać
        return view('teammanager', ['userData' => $userData, 'joinCode' => $joinCode]);
    }


    public function removeMember(Request $request)
    {
        $currentTeamId = Team::join('team_members', 'teams.id', '=', 'team_members.team_id')
            ->where('team_members.user_id', Auth::user()->id)
            ->value('teams.id');

        $userId = $request->input('user_id');

        // Tu usuwam z teamu
        TeamMember::where('user_id', $userId)
            ->where('team_id', $currentTeamId)
            ->delete();

        // Tu wracam do stronki
        return redirect()->back();
    }


    public function generateCode(Request $request)
    {
        // Tu biore TeamID od aktualnie zalogowanego użytkownika
        $currentTeamId = Team::join('team_members', 'teams.id', '=', 'team_members.team_id')
            ->where('team_members.user_id', Auth::user()->id)
            ->value('teams.id');

        // Znajduje odpowiedni zespół
        $team = Team::find($currentTeamId);

        if (!$team) {
            abort(403, 'Nie jesteś w żadnym zespole');
        }

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        do {
            $code = substr(str_shuffle($characters), 0, 9);
        } while (Team::where('join_code', $code)->exists());

        $team->join_code = $code;
        $team->save();

        return redirect()->back();
    }

        public function join(Request $request)
        {
            $joinCode = $request->input('team_code');

            $team = Team::where('join_code', $joinCode)->firstOrFail();

            if (!$team) {
                return redirect()->back()->withErrors(['team_code' => 'Nie znaleziono drużyny z podanym kodem']);
            }

            $isMember = TeamMember::where('team_id', $team->id)
                ->where('user_id', Auth::user()->id)
                ->exists();

            if ($isMember) {
                return redirect()->back()->withErrors(['team_code' => 'Jesteś już członkiem tej drużyny']);
            }
            $teamMember = new TeamMember([
                'user_id' => Auth::user()->id,
            ]);

            TeamMember::where('user_id', Auth::user()->id)->delete();

            $team->members()->save($teamMember);

            return redirect()->back();
        }
}
