<?php

namespace App\Http\Controllers;

use App\Events\WebsocketEvent;
use Illuminate\Http\Request;
use Pusher\Pusher;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*
        $data = ['message' => 'dziala2'];
        $event = 'client-message';
        broadcast(new WebsocketEvent($event, $data));

        $pusher = new Pusher(env('PUSHER_APP_KEY'),env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), ['cluster' => env('PUSHER_APP_CLUSTER'), 'useTLS' => true]);
        $channels = $pusher->getChannels();
//        echo '<pre>';
//        print_r($channels);
//        echo '</pre>';

        $channel = $pusher->get('client-WebsocketEvent');
        $channel->bind('WebsocketEvent', function ($data) {
            $data = ['message' => 'dziala3'];
            $event = 'client-message';
            broadcast(new WebsocketEvent($event, $data));
        });
        */
        return view('dashboard');
    }
}
