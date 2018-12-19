<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function myOrder()
    {
        $myOrders = auth()->user()->orders;

        return view($this->viewLocation('member.order.index'), compact(['myOrders']));
    }

    public function uploadPayment($code)
    {
        $order = Order::whereCode($code)->first();

        return view($this->viewLocation('member.order.upload'), compact(['order']));
    }

    public function store(Request $request)
    {
        try{
            $order = Order::create([
                'code' => str_random(10),
                'seat_id' => $request->get('seat_id'),
                'user_id' => auth()->id()
            ]);

            // ser seat to booked
            $order->seat()->update(['booked' => true]);
 
           if($order){
             return redirect()->back()
                 ->with('message', 'Data Telah Tersimpan!')
                 ->with('status','success')
                 ->with('type','success');
           }
         }catch(\Exception $e){
             return redirect()->back()
                 ->with('message', $e->getMessage())
                 ->with('status','error')
                 ->with('type','error');
         }
    }
}
