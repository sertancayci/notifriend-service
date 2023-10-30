<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Abbasudo\Purity\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotificationMessage extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;
    use Sortable;

    protected $table = 'notification_message';

    protected $fillable = [
        'sender_user_id',
        'channel_id',
        'message',
        'thumbnail',
        'status',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function channel()
    {
        return $this->belongsToMany(Channels::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }

}
