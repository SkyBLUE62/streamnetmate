<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use PDF;

class OrdersController extends Controller
{


    public function show($idOrder)
    {
        $order = Order::where('idOrder', '=', $idOrder)->first();
        $pdf = PDF::loadView('orders.pdf', ['order' => $order]);
        return $pdf->stream('order.pdf');
    }
}
