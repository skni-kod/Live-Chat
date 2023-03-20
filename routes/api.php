<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/load-chat/{visitorId}/{appId}', [App\Http\Controllers\Conversation\ClientConversationController::class, 'loadBaseConversation']);
Route::post('/create-conversation', [App\Http\Controllers\Conversation\ClientConversationController::class, 'createConversation']);

Route::post('/client-message', [App\Http\Controllers\Conversation\ClientConversationController::class, 'sendMessage']);
