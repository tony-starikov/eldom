<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status',
        'name',
        'phone',
        'email',
        'address',
        'delivery',
        'payment',
        'sum',
        'user_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public function saveOrder($name, $phone, $email, $address, $delivery, $payment)
    {
        if ($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->email = $email;
            $this->address = $address;
            $this->delivery = $delivery;
            $this->payment = $payment;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        }

        return false;

    }
}
