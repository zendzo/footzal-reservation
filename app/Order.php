<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['code','seat_id','user_id'];

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }

    public function member()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
