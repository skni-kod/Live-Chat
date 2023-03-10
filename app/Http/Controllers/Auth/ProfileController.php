<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\Profile;

use App\Models;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);

        $avatar = $request->file('avatar');
        $avatarName = $avatar->getClientOriginalName();
        $avatar->storeAs('public/avatars', $avatarName);

        auth()->user()->profile()->update(['avatar' => $avatarName]);

        return back()->with('success', 'Avatar uploaded successfully.');
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->input('username');
        $user->email = $request->input('email');

        $user->save();

        Profile::where('user_id', $id)->update(['name' => $request->input('shownName')]);

        return back()->with('success', 'Data updated successfully!');
    }

    public function __construct(){
        $this->middleware('auth');
    }
}
