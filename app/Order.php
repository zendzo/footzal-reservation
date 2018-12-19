<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Order extends Model implements HasMedia
{
    use HasMediaTrait;
    
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
