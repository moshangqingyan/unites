<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eight extends Model
{
    protected $table = 'eight';
    public $timestamps = false;

    public function account()
    {
        return $this->belongsTo(Account::class, 'id', 'account_id');
    }
}
