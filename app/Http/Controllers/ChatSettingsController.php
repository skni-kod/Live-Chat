<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

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

    }
}
