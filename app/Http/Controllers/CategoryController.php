<?php

namespace App\Http\Controllers;

use App\Category;
use App\Message;
use App\Order;
use App\Phone;
use App\Product;
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

        $messages = Message::all();

        $phones = Phone::all();

        $main_phone_item = $phones->where('main', 1)->first();

        $main_phone = $main_phone_item->phone;

        $main_category = Category::where('slug', $category_slug)->first();

        $main_subcategories = $main_category->subcategories;

        $categories = Category::orderBy('id', 'asc')->get();

        $subcategories_ides = [];

        foreach ($main_subcategories as $main_subcategory){
            $subcategories_ides[] = $main_subcategory['id'];
        }

        $category_products = Product::query()->whereIn('subcategory_id', $subcategories_ides)->paginate(9);

        return view('category', compact('main_category', 'categories', 'main_subcategories', 'quantity', 'category_products', 'messages', 'phones', 'main_phone'));

    }

    public function showCategoryByPriceUp($category_slug)
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

        $main_category = Category::where('slug', $category_slug)->first();

        $main_subcategories = $main_category->subcategories;

        $categories = Category::orderBy('id', 'asc')->get();

        $subcategories_ides = [];

        foreach ($main_subcategories as $main_subcategory){
            $subcategories_ides[] = $main_subcategory['id'];
        }

        $category_products = Product::query()->whereIn('subcategory_id', $subcategories_ides)->orderBy('price', 'asc')->paginate(9);

        return view('category', compact('main_category', 'categories', 'main_subcategories', 'quantity', 'category_products', 'messages', 'phones', 'main_phone'));

    }

    public function showCategoryByPriceDown($category_slug)
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

        $main_category = Category::where('slug', $category_slug)->first();

        $main_subcategories = $main_category->subcategories;

        $categories = Category::orderBy('id', 'asc')->get();

        $subcategories_ides = [];

        foreach ($main_subcategories as $main_subcategory){
            $subcategories_ides[] = $main_subcategory['id'];
        }

        $category_products = Product::query()->whereIn('subcategory_id', $subcategories_ides)->orderBy('price', 'desc')->paginate(9);

        return view('category', compact('main_category', 'categories', 'main_subcategories', 'quantity', 'category_products', 'messages', 'phones', 'main_phone'));

    }

    public function showCategoryByNameA($category_slug)
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

        $main_category = Category::where('slug', $category_slug)->first();

        $main_subcategories = $main_category->subcategories;

        $categories = Category::orderBy('id', 'asc')->get();

        $subcategories_ides = [];

        foreach ($main_subcategories as $main_subcategory){
            $subcategories_ides[] = $main_subcategory['id'];
        }

        $category_products = Product::query()->whereIn('subcategory_id', $subcategories_ides)->orderBy('name', 'desc')->paginate(9);

        return view('category', compact('main_category', 'categories', 'main_subcategories', 'quantity', 'category_products', 'messages', 'phones', 'main_phone'));

    }

    public function showCategoryByNameZ($category_slug)
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

        $main_category = Category::where('slug', $category_slug)->first();

        $main_subcategories = $main_category->subcategories;

        $categories = Category::orderBy('id', 'asc')->get();

        $subcategories_ides = [];

        foreach ($main_subcategories as $main_subcategory){
            $subcategories_ides[] = $main_subcategory['id'];
        }

        $category_products = Product::query()->whereIn('subcategory_id', $subcategories_ides)->orderBy('name', 'asc')->paginate(9);

        return view('category', compact('main_category', 'categories', 'main_subcategories', 'quantity', 'category_products', 'messages', 'phones', 'main_phone'));

    }
}
