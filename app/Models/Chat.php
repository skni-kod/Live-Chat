<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chat_settings';
<<<<<<< HEAD
    protected $primaryKey = 'id';

    protected $fillable = [ 'chat_title',
                            'chat_color	',
                            'side',
                            'status',
                            'message_box'
                            ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

=======

    protected $fillable = [
        'chat_title',
        'chat_color',
        'side',
        'status',
        'message_box'
    ];
>>>>>>> 2bbb3ad5829ee8717c6b81626b1d53378bc4136e
}
