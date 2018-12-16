<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lapangan;

class LapanganController extends Controller
{
    public function findByName($name)
    {
        $lapangan = Lapangan::where('slug', $name)->first();

        return view($this->viewLocation('member.lapangan.show'), compact(['lapangan']));
    }
}
