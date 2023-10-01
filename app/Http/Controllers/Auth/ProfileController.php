<?php

namespace App\Http\Controllers\Auth;
use App\Models;
use App\Models\User;

use App\Models\Profile;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $randomString = Str::random(32);
        $extension = $avatar->getClientOriginalExtension();
        $newFileName = $randomString . '.' . $extension;
        $avatar->storeAs('public/avatars', $newFileName);

        auth()->user()->profile()->update(['avatar' => $newFileName]);

        return back()->with('success', 'Avatar uploaded successfully.');
    }


    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:'.config('account.username_max_length'), 'min:'.config('account.username_min_length')],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'shownName' => ['required', 'string', 'max:50']
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors(['profile_error' => $validator->errors()->first()]);
        $name = $request->input('username');
        $email = $request->input('email');
        $shownName = $request->input('shownName');

        Profile::where('user_id', auth()->user()->id)->update(['name' => $shownName]);
        User::where('id', auth()->user()->id)->update(['email' => $email, 'name' => $name]);

        return back()->with('success', 'Data updated successfully!');
    }

    public function __construct(){
        $this->middleware('auth');
    }
}
