<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        $ordersCount   = Order::where('user_id', $user->id)->count();
        $totalSpent    = Order::where('user_id', $user->id)->sum('total_price');
        $recentOrders  = Order::where('user_id', $user->id)->latest()->take(5)->get();

        return view('customer.dashboard', compact('ordersCount', 'totalSpent', 'recentOrders'));
    }

    public function profile()
    {
        return view('customer.profile');
    }

    public function orders()
    {
        $orders = Order::where('user_id', auth()->id())->with('items.product')->latest()->paginate(10);
        return view('customer.orders', compact('orders'));
    }
}
