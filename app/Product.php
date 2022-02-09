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
        'status',
        'new',
        'sale',
        'hit',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
