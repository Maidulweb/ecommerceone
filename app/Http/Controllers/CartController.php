<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function showcart ()
    {
        $data = [];
        $data['cartindex'] = session()->has('cart') ? session()->get('cart') : [];
        $data['total'] = array_sum(array_column($data['cartindex'],'total_price'));

        return view('frontend.cart.show', $data);
    }

    public function addcart (Request $request)
    {
      $this->validate($request,[
         'addtocart' => 'required'
      ]);

      $cart_product = Product::findOrFail($request->input('addtocart'));

      $unit_price = ($cart_product->sale_price !== null && $cart_product->sale_price > 0) ? $cart_product->sale_price : $cart_product->price;

      $cart = session()->has('cart') ? session()->get('cart') : [];

      if (array_key_exists($cart_product->id, $cart)){

        $cart[$cart_product->id]['quantity']++;

        $cart[$cart_product->id]['total_price'] = $cart[$cart_product->id]['quantity'] * $cart[$cart_product->id]['unit_price'];


      }else {

        $cart[$cart_product->id] = [
            'title' => $cart_product->title,
            'quantity' => 1,
            'unit_price' => $unit_price,
            'total_price' => $unit_price,
        ];

      }

      session(['cart' => $cart]);


      return redirect()->route('cart.show');

    }

    public function removecart (Request $request)
    {
      $this->validate($request,[
         'addtoremove' => 'required'
      ]);

      $cart = session()->has('cart') ? session()->get('cart') : [];

      unset($cart[$request->input('addtoremove')]);

      session(['cart' => $cart]);


      return redirect()->route('cart.show');

    }



}
