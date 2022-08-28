<?php

namespace App;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory, Translatable;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
