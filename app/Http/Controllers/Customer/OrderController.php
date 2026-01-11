<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function myOrders()
    {
        $orders = auth()->user()->orders()->latest()->get();
        return view('customer.orders', compact('orders'));
    }
}
