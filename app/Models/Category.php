<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const STATUS = [
        "ACTIVE" => "Aktif",
        "PASSIVE" => "Pasif",
    ];

    public function channels()
    {
        return $this->hasMany(Channels::class);
    }

}
