<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Abbasudo\Purity\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NFNotification extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;
    use Sortable;

    protected $table = 'notifications';

    protected $fillable = [
        'sender_user_id',
        'receiver_user_id',
        'message_id',
        'is_sent',
        'is_read',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function message()
    {
        return $this->belongsTo(NotificationMessage::class, 'message_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, "sender_user_id");
    }


}
