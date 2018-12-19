<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class UploadPaymentController extends Controller
{
    public function upload(Request $request)
    {
        $order = Order::whereCode($request->code)->first();

        try{

            $order->paid = true;
            $order->save();

            if ($request->hasFile('file')) {
                $order->addMediaFromRequest('file')->toMediaCollection('payment');
            }

            if ($order) {
                return redirect()->route('member.order.list')
                    ->with('message', 'Data Telah Tersimpan!')
                    ->with('status','success')
                    ->with('type','success');
            }

        }catch(\Exception $e){
            return redirect()->back()
                    ->with('message', $e->getMessage()())
                    ->with('status','error')
                    ->with('type','error');
        }
    }
}
