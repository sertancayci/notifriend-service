<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Abbasudo\Purity\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Channels extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;
    use Sortable;

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
        return $this->belongsTo(Category::class, "category_id");
    }

    public function userChannels()
    {
        return $this->hasMany(UserChannels::class);
    }
}
