<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use App\Message;
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

        $messages = Message::all();

        $categories = Category::orderBy('id', 'asc')->get();

        $orders = Auth::user()->orders()->where('status', 1)->paginate(20);

        return view('user.main', compact('orders', 'quantity', 'messages', 'categories'));
    }

    public function show($orderId)
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

        $messages = Message::all();

        $categories = Category::orderBy('id', 'asc')->get();

        $order = Order::where('id', $orderId)->first();
        if (!Auth::user()->orders->contains($order)) {
            return back();
        }
        return view('user.show', compact('order', 'quantity', 'messages', 'categories'));
    }
}
