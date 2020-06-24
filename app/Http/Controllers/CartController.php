<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function showcart ()
    {
        $data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        return view('frontend.cart.show', $data);
    }

    public function addcart (Request $request)
    {
      $this->validate($request,[
         'addtocart' => 'required'
      ]);

      $cart_product = Product::findOrFail($request->input('addtocart'));

      $cart = session()->has('cart') ? session()->get('cart') : [];

      if (array_key_exists($cart_product->id, $cart)){

        $cart[$cart_product->id]['quantity']++;

      }else {

        $cart[$cart_product->id] = [
            'title' => $cart_product->title,
            'quantity' => 1,
            'price' => $cart_product->price,
        ];

      }

      session(['cart' => $cart]);

      return redirect()->route('cart.show');

    }


}
