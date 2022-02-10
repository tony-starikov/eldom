<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the subcategories.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSubcategory($category_slug, $subcategory_slug)
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

        $categories = Category::orderBy('id', 'asc')->get();

        return view('subcategory', compact('main_subcategory', 'categories', 'main_category', 'quantity'));
    }
}