<?php

namespace App;

use App\Models\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Account extends Model
{
    use Notifiable, Timestamp;
    protected $table = 'userinfo';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function eight()
    {
        return $this->hasMany(Eight::class, 'account_id', 'id');

    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {

            $model->ba = json_encode($model->ba);

        });
    }
}
