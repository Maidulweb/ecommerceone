<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;

class Category extends Model
{
    protected $guarded = [];

    public function parent_category()
    {
        return $this->belongsTo(Category::class);
    }

    public function child_category()
    {
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }


    protected static function booted()
    {
        static::creating(function($category) {
         $category->slug = Str::slug($category->title);
        });
    }
}
