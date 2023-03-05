<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $fillable = [ 'name',
                            'email',
                            'avatar',
                            'user_id'
    ];
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->attributes['name'] = Config::get('profile.default_name');
        $this->attributes['avatar'] = Config::get('profile.default_avatar');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
