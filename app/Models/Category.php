<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Abbasudo\Purity\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Filterable;
    use Sortable;

    const STATUS = [
        "ACTIVE" => "Aktif",
        "PASSIVE" => "Pasif",
    ];

    //TODO: add fillable
    protected $fillable = [
        'name',
        'slug',
        'status',
        'thumbnail',
    ];

    public function channels()
    {
        return $this->hasMany(Channels::class);
    }

}
