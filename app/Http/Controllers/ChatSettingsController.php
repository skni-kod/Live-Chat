<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
<<<<<<< HEAD

class ChatSettingsController extends Controller
{
    public function showSettings()
    {
        // Retrieve the authenticated user's chat settings
        $chatSettings = auth()->user()->chat;

        return view('settings', compact('chatSettings'));
    }

    public function updateSettings(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'chat_title' => 'nullable|string',
        ]);

        // Retrieve the authenticated user's chat settings
        $chatSettings = auth()->user()->chat;

        // Update the chat settings with the validated data
        $chatSettings->fill($validatedData)->save();

        return back()->with('success', 'Chat settings updated successfully.');
    }

    public function resetSettings()
    {

=======
use App\Models\Chat;

class ChatSettingsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

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
>>>>>>> 2bbb3ad5829ee8717c6b81626b1d53378bc4136e
    }
}
