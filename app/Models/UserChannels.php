<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChannels extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'channel_id',
        'is_admin',
        'joined_at',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function channel()
    {
        return $this->belongsToMany(Channels::class);
    }
}
