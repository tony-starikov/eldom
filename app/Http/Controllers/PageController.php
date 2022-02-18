<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Page;
use App\Product;
use Illuminate\Http\Request;
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

        $recommended_products = Product::where('recommend', 1)->get();

        return view('main', compact('page_info', 'categories', 'quantity', 'recommended_products'));
    }

    public function delivery()
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

        $page_info = Page::where('name', 'delivery')->first();

        $categories = Category::orderBy('id', 'asc')->get();

        return view('delivery', compact('page_info', 'categories', 'quantity'));
    }

    public function contacts()
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

        $page_info = Page::where('name', 'contacts')->first();

        $categories = Category::orderBy('id', 'asc')->get();

        return view('contacts', compact('page_info', 'categories', 'quantity'));
    }

    public function search(Request $request)
    {
        $search_string = $request->search_string;

        $products = Product::where('name', 'LIKE', "%{$search_string}%")->orderBy('name')->get();

        $quantity = null;

        $orderId = session('orderId');

        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            $quantity = null;
            foreach ($order->products as $product) {
                $quantity += $product->pivot->count;
            }
        }

//        $page_info = Page::where('name', 'contacts')->first();

        $categories = Category::orderBy('id', 'asc')->get();



        return view('search', compact( 'categories', 'quantity', 'products'));
    }
}
