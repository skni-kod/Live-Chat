<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth\login');
});

Route::get('test', function(){
   return view('client_chat_test');
});


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\Auth\ProfileController::class, 'showProfile'])->name('profile');
Route::post('/avatar/upload', [App\Http\Controllers\Auth\ProfileController::class, 'uploadAvatar'])->name('avatar.upload');
Route::put('/profile/{id}', [App\Http\Controllers\Auth\ProfileController::class, 'updateProfile'])->name('profile.update');

Route::get('/settings', [App\Http\Controllers\ChatSettingsController::class, 'index'])->name('settings');
Route::post('/chat-settings', [App\Http\Controllers\ChatSettingsController::class, 'store'])->name('settings.store');
Route::post('/save-livechat-option', [App\Http\Controllers\ChatSettingsController::class, 'savePosition'])->name('save-livechat-option');

Route::get('/chatonly',  [App\Http\Controllers\ChatSettingsController::class, 'showChat'])->name('chatonly');




Route::get('/team', [App\Http\Controllers\TeamController::class, 'index'])->name('team');
Route::post('/team/remove', [App\Http\Controllers\TeamController::class, 'removeMember'])->name('team.remove');
Route::post('/teams/generate-code', [App\Http\Controllers\TeamController::class, 'generateCode'])->name('team.generatecode');





use App\Http\Controllers\ChatSettingsController;

Route::prefix('chat')->group(function () {
    Route::get('settings', [ChatSettingsController::class, 'edit'])->name('chat-settings.edit');
    Route::put('settings', [ChatSettingsController::class, 'updateSettings'])->name('chat-settings.update');
});
