<?php

namespace App;

use App\Models\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reception extends Model
{
    use Notifiable, Timestamp;
    protected $table = 'reception';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];
}
