<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use App\Message;
use App\Order;
use App\Page;
use App\Phone;
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

        $phones = Phone::all();

        $main_phone_item = $phones->where('main', 1)->first();

        $main_phone = $main_phone_item->phone;

        $page_info = Page::where('name', 'cabinet')->first();

        $categories = Category::orderBy('id', 'asc')->get();

        $orders = Auth::user()->orders()->where('status', 1)->paginate(20);

        return view('user.main', compact('orders', 'quantity', 'messages', 'categories', 'page_info', 'phones', 'main_phone'));
    }

    public function show($order_id)
    {
        $quantity = null;
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            $quantity = null;
            foreach ($order->products as $product) {
                $quantity += $product->pivot->count;
            }
            $order = null;
        }

        $messages = Message::all();

        $phones = Phone::all();

        $main_phone_item = $phones->where('main', 1)->first();

        $main_phone = $main_phone_item->phone;

        $page_info = Page::where('name', 'cabinet')->first();

        $categories = Category::orderBy('id', 'asc')->get();

        $order = Order::where('id', $order_id)->first();

        return view('user.show', compact('order', 'quantity', 'messages', 'categories', 'page_info', 'phones', 'main_phone'));
    }
}
