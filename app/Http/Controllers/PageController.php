<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;

class PageController extends Controller
{
    public function index ()
    {
        $data = [];
        $data['products'] = Product::select(['id','title', 'description', 'slug', 'price', 'sale_price'])->get();
        $data['product_image'] = ProductImage::select(['id', 'photo', 'product_id'])->get();
        return view('frontend.index', $data);
    }


}
