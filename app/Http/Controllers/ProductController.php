<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the subcategories.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProduct($category_slug, $subcategory_slug, $product_slug)
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

        $main_subcategory = Subcategory::where('slug', $subcategory_slug)->first();

        $main_product = Product::where('slug', $product_slug)->first();

        $categories = Category::orderBy('id', 'asc')->get();

        return view('product', compact('main_subcategory', 'categories', 'main_category', 'main_product', 'quantity'));
    }
}
