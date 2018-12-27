<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class ReportController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->get();

        return view($this->viewLocation('administrator.report.index'), compact(['orders']));
    }
}
