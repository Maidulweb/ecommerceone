<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;

class ProductController extends Controller
{
    public function show($slug) {
       $data = [];
       $data['product'] = Product::where('slug', $slug)->first();
       $data['productimages'] = ProductImage::select('product_id', 'photo')->get();
       return view('frontend.product.show', $data);
    }
}
