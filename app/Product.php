<?php

namespace App;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Translatable;

    protected $guarded = [];

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
