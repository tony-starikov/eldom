<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'id',
        'product_id',
        'feature',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
