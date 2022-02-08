<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'id',
        'category_id',
        'name',
        'slug',
        'title',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
