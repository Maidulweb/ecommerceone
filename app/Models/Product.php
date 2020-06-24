<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = [];

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function product_image()
    {
        return $this->hasMany(ProductImage::class);
    }

    protected static function booted() {

        static::creating(function($product) {
         $product->slug = Str::slug($product->title);
        });
    }
}
