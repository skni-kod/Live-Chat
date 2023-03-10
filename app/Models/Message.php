<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\WebsocketEvent;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $fillable = ['message', 'agent_id', 'conversation_id', 'visitor_id', 'sent_at'];



}
