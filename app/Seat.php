<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = ['slot_id','rent_time','booked','confirmed'];

    // protected $dates = ['rent_time'];

    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
