<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $fillable = ['name','address','description','slug'];

    public function slots()
    {
        return $this->hasMany(Slot::class);
    }
}
