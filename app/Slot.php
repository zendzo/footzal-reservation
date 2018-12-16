<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = ['lapangan_id','rent_date'];

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
