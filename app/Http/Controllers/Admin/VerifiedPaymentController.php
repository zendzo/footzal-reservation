<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\OrderStatusChangedEvent;
use App\Order;
use App\Notifications\VerifyPaymentNotification;
use App\Notifications\RejectPaymentNotification;

class VerifiedPaymentController extends Controller
{
    public function verify(Request $request)
    {
        $order = Order::whereCode($request->code)->first();

        try{

            $order->confirmed = true;
            $order->save();

            if ($order) {
                // send notification
                $order->member->notify(new VerifyPaymentNotification($order));
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
            $order->seat->save();
            $order->rejected = true;
            $order->save();
            $seat = $order->seat;

            // $delete = $order->delete();

            event(new OrderStatusChangedEvent($seat));

            if ($order) {
                // send notification
                $order->member->notify(new RejectPaymentNotification($order));
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
