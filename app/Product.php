<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'subcategory_id',
        'manufacturer_id',
        'name',
        'code',
        'slug',
        'title',
        'description',
        'small_description',
        'image',
        'price',
        'old_price',
        'status',
        'new',
        'sale',
        'hit',
        'recommend',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function getPriceForCount()
    {
        if (is_null($this->pivot)) {
            return $this->price;
        }
        return $this->pivot->count * $this->price;
    }
}
