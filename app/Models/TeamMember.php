<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;
    protected $table = 'team_members';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'team_id', 'edit_chat_settings'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
