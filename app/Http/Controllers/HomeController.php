<?php

namespace App\Http\Controllers;

use App\Events\WebsocketEvent;
use App\Models\Conversation;
use App\Services\ChatService;
use Illuminate\Http\Request;
use Pusher\Pusher;
use Illuminate\Support\Facades\DB;
use App\Models\TeamMember;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getAgentConversations(){
        $agentConversations = Conversation::select('id')->where('agent_id', '=', auth()->user()->id)->orWhereNull('agent_id')->get()->pluck('id');

        $chatService = new ChatService();
        return $chatService->getConversations($agentConversations);
    }

    private function getConversations($userId){
        $groupedConversations['closed'] = [];
        $groupedConversations['active'] = [];

        $conversations = DB::table('conversations as c')
            ->leftJoin('teams as t', 'c.app_id', '=', 't.app_id')
            ->rightJoin(DB::raw('(SELECT message, conversation_id, created_at AS last_message_created_at FROM messages WHERE created_at IN (SELECT MAX(created_at) FROM messages GROUP BY conversation_id)) as m'), function($join) {
                $join->on('c.id', '=', 'm.conversation_id');
            })
            ->where(function($query) use ($userId) {
                $query->where('t.id', DB::raw('(SELECT team_id FROM team_members WHERE user_id = ' . $userId . ')'))
                    ->where(function($query) use ($userId) {
                        $query->where('c.agent_id', $userId)
                            ->orWhereNull('c.agent_id');
                    });
            })
            ->get();

        foreach ($conversations as $conversation){
            if($conversation->status == "closed") $groupedConversations['closed'][] = $conversation;
            else $groupedConversations['active'][] = $conversation;
        }

        return $groupedConversations;
    }

    private function countAgents(){
        $userId = auth()->user()->id;

        $countWithUpdatedAt = TeamMember::where('team_id', function ($query) use ($userId) {
            $query->select('team_id')
                ->from('team_members')
                ->where('user_id', $userId);
        })
            ->when(true, function ($query) {
                return $query->where('updated_at', '>=', now()->subWeek());
            })
            ->count();

        $countWithoutUpdatedAt = TeamMember::where('team_id', function ($query) use ($userId) {
            $query->select('team_id')
                ->from('team_members')
                ->where('user_id', $userId);
        })
            ->count();

        return [$countWithUpdatedAt, $countWithoutUpdatedAt];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $appId = DB::table('teams')->where('team_creator', '=', $user->id)->value('app_id');
        $conversations = $this->getAgentConversations();

        $statisticData = app('App\Http\Controllers\VisitorController')->getStatistics();


        return view('dashboard', ['app_id' => $appId,
                                        'statisticData' => $statisticData,
                                        'conversations' => $conversations,
            'agentsCount' => $this->countAgents()
        ]);
    }
}
