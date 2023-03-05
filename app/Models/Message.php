<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\WebsocketEvent;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'user_id', 'conversation_id'];

    public static function createMessage($content, $userId, $conversationId)
    {
        $message = new Message([
            'message' => $content,
            'user_id' => $userId,
            'conversation_id' => $conversationId,
        ]);
        $message->save();
        return $message;
    }
}
