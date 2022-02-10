<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the specified category.
     *
     * @param  string  $category_slug
     * @return \Illuminate\Http\Response
     */
    public function showCategory($category_slug)
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

        $main_category = Category::where('slug', $category_slug)->first();

        $main_subcategories = $main_category->subcategories;

        $categories = Category::orderBy('id', 'asc')->get();

        return view('category', compact('main_category', 'categories', 'main_subcategories', 'quantity'));

    }
}
