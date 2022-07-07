<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeUserController extends Controller
{
    public function index()
    {
        $quantity = null;
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            $quantity = null;
            foreach ($order->products as $product) {
                $quantity += $product->pivot->count;
            }
        }

        $orders = Auth::user()->orders()->where('status', 1)->paginate(20);

        return view('user.main', compact('orders', 'quantity'));
    }

    public function show($orderId)
    {
        $quantity = null;
        $orderIdForCount = session('orderId');
        if (!is_null($orderIdForCount)) {
            $order_for_count = Order::findOrFail($orderIdForCount);
            $quantity = null;
            foreach ($order_for_count->products as $product) {
                $quantity += $product->pivot->count;
            }
        }

        $order = Order::where('id', $orderId)->first();
        if (!Auth::user()->orders->contains($order)) {
            return back();
        }
        return view('user.show', compact('order', 'quantity'));
    }
}
