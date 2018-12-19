<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Slot;
use App\Lapangan;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slots = Slot::all();

        return view($this->viewLocation('administrator.slot.index'), compact(['slots']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //code
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lapangan = Lapangan::findOrfail($request->get('lapangan_id'));

        $start_time = $request->get('start_time');

        $total_seat = $request->get('total_seat');
        
        try{
            $slot = $lapangan->slots()->create([
                'rent_date' => Carbon::createFromFormat('d-m-Y', $request->get('rent_date'))
            ]);

            if ($slot) {
                for ($i=1; $i <= $total_seat; $i++) {

                    $hour = $start_time + $i; 

                    $slot->seats()->create([
                        'rent_time' => Carbon::createFromTime($hour,0,0,'Asia/Jakarta'),
                        'price' => $request->get('price')
                    ]);
                }
            }
 
             return redirect()->back()
                 ->with('message', 'Data Telah Tersimpan!')
                 ->with('status','success')
                 ->with('type','success');

         }catch(\Exception $e){
             return redirect()->back()
                 ->with('message', $e->getMessage())
                 ->with('status','error')
                 ->with('type','error');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function show(Slot $slot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function edit(Slot $slot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slot $slot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slot  $slot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slot $slot)
    {
        //
    }
}
