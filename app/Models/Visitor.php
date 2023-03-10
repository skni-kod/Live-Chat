<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $primaryKey = 'visitor_id';
    protected $table = 'visitors';
    protected $fillable = ['visitor_id', 'ip', 'city', 'country', 'system', 'browser', 'browser_version', 'visits', 'chats'];

}
