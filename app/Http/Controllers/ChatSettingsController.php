<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatSettingsRequest;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\ChatSetting;
use App\Services\ChatService;

class ChatSettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showChat()
    {
        $chatSerive  = new ChatService();
        $chat = $chatSerive->getChatSettings(auth()->user()->id);
        return view('chatonly', compact('chat'));
    }

    public function index()
    {
        $chatSerive  = new ChatService();
        $chat = $chatSerive->getChatSettings(auth()->user()->id);
        return view('settings', ['chat' => $chat]);
    }

    public function store(StoreChatSettingsRequest $request)
    {
        $chatSerive  = new ChatService();
        $color = $request->input('chatcoloristic');
        $side = $request->input('chat_position');
        $title = $request->input('chat_title');
        $status = $request->input('status');
        $message_box = $request->input('message_box');
        $chat = $chatSerive->getChatSettings(auth()->user()->id);

        if ($request->filled('chatcoloristic')) {
            $chat->chat_color = $color;
        }
        
        if ($request->filled('status')) {
            $chat->message_box = $message_box;
        }
        
        if ($request->filled('chat_title')) {
            $chat->chat_title = $title;
        }
        
        if ($request->filled('status')) {
            $chat->status = $status;
        }
        
        if ($request->filled('chat_position')) {
            $chat->side = $side;
        }

        $chat->save();

        return redirect()->back()->with('success', 'Settings saved successfully.');
    }

    public function savePosition(Request $request)
    {

        $setting = Chat::firstOrCreate([]);
        $setting->side = $request->input('selected_option');
        $setting->save();

        // Redirect back to the form with a success message
        return redirect()->back()->with('success', 'Chat window position updated successfully.');
    }
}
