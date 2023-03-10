<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['app_id', 'team_creator', 'join_code'];

    public function user(){
        return $this->belongsTo(User::class, 'id');
    }
}
