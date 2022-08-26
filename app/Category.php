<?php

namespace App;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Translatable;

    protected $guarded = [];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
