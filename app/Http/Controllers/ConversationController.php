<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversationController extends Controller
{
    private function creatingConversationValidation(Request $request){
        if(!$request->filled('user_id', 'app_id', 'user_data')) return false;


    }

    public function createConversation(Request $request){

    }
}
