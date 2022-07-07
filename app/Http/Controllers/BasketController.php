<?php

namespace App\Http\Controllers;

use App\Category;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            session()->flash('message', 'Корзина пуста, добавьте товары!');
            return redirect()->back();
        } else {
            $order = Order::findOrFail($orderId);

            $quantity = null;

            foreach ($order->products as $product) {
                $quantity += $product->pivot->count;
            }

            if ($quantity == 0) {
                session()->flash('message', 'Корзина пуста, добавьте товары!');
                return redirect()->back();
            }
        }

        $categories = Category::get();

        $orderId = session('orderId');

        $order = Order::find($orderId);

        if (is_null($order)) {
            $orderId = Order::create()->id;
            session(['orderId' => $orderId]);
            return redirect()->route('main');
        }

        return view('basket', compact('categories', 'order', 'quantity'));
    }

    public function orderCheck()
    {
        $categories = Category::get();

        $orderId = session('orderId');

        $order = Order::find($orderId);

        if (is_null($order)) {
            return redirect()->route('main');
        }

        if (Auth::check()) {
            $user_name = Auth::user()->name;
            $user_email = Auth::user()->email;
            $user_phone = Auth::user()->phone;
        } else {
            $user_name = null;
            $user_email = null;
            $user_phone = null;
        }

        $quantity = null;
        foreach ($order->products as $product) {
            $quantity += $product->pivot->count;
        }

        return view('order', compact('categories', 'quantity', 'order', 'user_name', 'user_email', 'user_phone'));
    }

    public function orderConfirm(Request $request)
    {
        if (!$request->name or !$request->phone or !$request->email or !$request->delivery or !$request->payment) {
            session()->flash('message', 'Заполните все поля');
            return back()->withInput();
        }

        if (!$request->address and $request->delivery == 2) {
            session()->flash('message', 'Заполните поле адрес при доставке новой почтой');
            return back()->withInput();
        }

        if ($request->delivery == 2 and $request->payment == 1) {
            session()->flash('message', 'При доставке новой почтой невозможно оплатить заказ наличными в магазине');
            return back()->withInput();
        }

        if ($request->delivery == 1 and $request->payment == 3) {
            session()->flash('message', 'При самовывозе невозможно оплатить заказ наложеным платежом');
            return back()->withInput();
        }

        $orderId = session('orderId');

        $order = Order::find($orderId);

        if (is_null($order)) {
            return redirect()->route('main');
        }

        $orderResult = $order->saveOrder(
            $request->name,
            $request->phone,
            $request->email,
            $request->address,
            $request->delivery,
            $request->payment
        );

        if ($orderResult) {
            session()->flash('message', 'Заказ оформлен успешно!');
        } else {
            session()->flash('message', 'Ошибка при заказе!');
        }

        return redirect()->route('main');
    }

    public function basketAdd($productId)
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if (is_null($order)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        }

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
//            dd($pivotRow);
        } else {
            $order->products()->attach($productId);
        }

        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        $product = Product::find($productId);

        session()->flash('message', $product->name . ' добавлен в корзину!');

        return redirect()->back();
    }

    public function basketRemove($productId)
    {
        $orderId = session('orderId');

        $order = Order::find($orderId);

        if (is_null($order->products)) {
            return redirect()->route('main');
        }

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count == 1) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        $quantity = null;
        foreach ($order->products as $product) {
            $quantity += $product->pivot->count;
        }

        if ($quantity == 1) {
            session()->flash('message', 'Корзина пуста, добавьте товары!');
            return redirect()->route('main');
        }

        $product = Product::find($productId);

        session()->flash('message', $product->name . ' удалён из корзины!');

        return redirect()->route('basket');
    }
}
