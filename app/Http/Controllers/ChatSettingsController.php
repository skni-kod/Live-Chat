<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;

class ChatSettingsController extends Controller
{
    public function showChat()
    {
        $chat = Chat::firstOrCreate([]);
        return view('chatonly', compact('chat'));
    }

    public function index()
    {
        $chat = Chat::firstOrCreate([]);
        return view('settings', compact('chat'));
    }

    public function store(Request $request)
    {
        $setting = Chat::firstOrCreate([]);

        $color = $request->input('chatcoloristic');
        $side = $request->input('livechat-position-selector');
        $title = $request->input('chat_title');
        $status = $request->input('status');
        $message_box = $request->input('message_box');


        if ($request->filled('color'))
        {
            $setting->chat_color = $color;
        }

        if ($request->filled('status'))
        {
            $setting->message_box = $message_box;
        }

        if ($request->filled('chat_title'))
        {
            $setting->chat_title = $title;
        }

        if ($request->filled('status'))
        {
            $setting->status = $status;
        }

        if ($request->filled('livechat-position-selector'))
        {
            $setting->side = $side;
        }


        $setting->save();

        return redirect()->back()->with('success', 'Settings saved successfully.');
    }

    public function savePosition(Request $request) {

        $setting = Chat::firstOrCreate([]);
        $setting->side = $request->input('selected_option');
        $setting->save();

        // Redirect back to the form with a success message
        return redirect()->back()->with('success', 'Chat window position updated successfully.');
    }
}
