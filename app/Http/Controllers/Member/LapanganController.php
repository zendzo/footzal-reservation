<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lapangan;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangans = Lapangan::paginate(3);

        return view($this->viewLocation('member.lapangan.index'), compact(['lapangans']));
    }
    public function findByName($name)
    {
        $lapangan = Lapangan::where('slug', $name)->first();

        return view($this->viewLocation('member.lapangan.show'), compact(['lapangan']));
    }
}
