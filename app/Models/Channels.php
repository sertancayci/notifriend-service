<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Channels extends Model
{
    use HasFactory;
    use SoftDeletes;

    const STATUS = [
        "PRIVATE" => "Özel",
        "PUBLIC" => "Genel",
    ];

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'thumbnail',
        'status',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function category()
    {
        return $this->belongsToMany(Categories::class);
    }

    public function userChannels()
    {
        return $this->hasMany(UserChannels::class);
    }
}
