<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Index()
    {
        $pending_orders = Order::where('status', 'pending')->latest()->get();
        return view('admin.pendingorders', compact('pending_orders'));
    }

    public function ConfirmOrders($id){
        Order::findOrFail($id)->update([
            'status' => 'confirmed'
        ]);
        return redirect()->route('pendingorders')->with('message', 'Order Confirmed');
    }

    public function CompletedOrders(){
        $confirmed_orders = Order::where('status', 'confirmed')->latest()->get();
        return view('admin.completedorder', compact('confirmed_orders'));
    }
}
