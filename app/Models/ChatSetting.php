<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatSetting extends Model
{
    use HasFactory;
    protected $table = 'chat_settings';

    protected $fillable = [
        'team_id',
        'chat_title',
        'chat_color',
        'side',
        'status',
        'message_box'
    ];

    public function team()
    {
        return $this->belongsTo(Chat::class);
    }
}
