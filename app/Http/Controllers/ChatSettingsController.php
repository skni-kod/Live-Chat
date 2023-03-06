<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Setting;

class ChatSettingsController extends Controller
{
    public function showSettings()
    {
        return view('settings');
    }

}
