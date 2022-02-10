<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Page;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function changeLocale($locale = 'en')
    {
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }

    public function main()
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

        $page_info = Page::where('name', 'main')->first();

        $categories = Category::orderBy('id', 'asc')->get();

        return view('main', compact('page_info', 'categories', 'quantity'));
    }
}
