<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\OrderStatusChangedEvent;
use App\Order;

class VerifiedPaymentController extends Controller
{
    public function verify(Request $request)
    {
        $order = Order::whereCode($request->code)->first();

        try{

            $order->confirmed = true;
            $order->save();

            if ($order) {
                return redirect()->route('admin.order.list')
                    ->with('message', 'Konfirmasi Berhasil!')
                    ->with('status','Pembayaran Telah Dikonfirmasi')
                    ->with('type','success');
            }

        }catch(\Exception $e){
            return redirect()->back()
                    ->with('message', $e->getMessage()())
                    ->with('status','error')
                    ->with('type','error');
        }
    }

    public function reject(Request $request)
    {
        $order = Order::whereCode($request->code)->first();

        try{

            $order->seat->booked = false;
            $seat = $order->seat;
            $order->seat->save();

            $delete = $order->delete();

            event(new OrderStatusChangedEvent($seat));

            if ($delete) {
                return redirect()->route('admin.order.list')
                    ->with('message', 'Pemesanan Telah Dibatalkan!')
                    ->with('status','Pembatalan Pemesanan')
                    ->with('type','warning');
            }

        }catch(\Exception $e){
            return redirect()->back()
                    ->with('message', $e->getMessage()())
                    ->with('status','error')
                    ->with('type','error');
        }
    }
}
