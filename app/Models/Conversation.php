<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $table = 'conversations';
    protected $fillable = ['id', 'app_id', 'visitor_id', 'agent_id', 'status'];
    protected $casts = [
        'id' => 'string'
    ];

    protected $keyType = 'string';

    //protected $keyType = 'string';


}
