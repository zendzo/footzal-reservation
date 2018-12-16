<?php

namespace App\Http\Controllers;

use App\Lapangan;
use Illuminate\Http\Request;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lapangans = Lapangan::all();
        
        return view($this->viewLocation('administrator.lapangan.index'), compact(['lapangans']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function show(Lapangan $lapangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lapangan $lapangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lapangan $lapangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lapangan  $lapangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lapangan $lapangan)
    {
        //
    }
}
