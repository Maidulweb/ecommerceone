<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

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

    public function clearcart ()
    {
        session(['cart' => []]);
        return redirect()->back();
    }

    public function checkout ()
    {
        $data = [];
        $data['cartindex'] = session()->has('cart') ? session()->get('cart') : [];
        $data['total'] = array_sum(array_column($data['cartindex'],'total_price'));

        return view('frontend.cart.checkout', $data);
    }

    public function checkoutprocess (Request $request)
    {

         $this->validate($request, [
            'customer_name' => 'required',
            'customer_email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
          ]);

          $cart = session()->has('cart') ? session()->get('cart') : [];
          $total = array_sum(array_column($cart,'total_price'));

          $order = Order::create([
            'user_id' => auth()->user()->id,
            'customer_name' => $request->input('customer_name'),
            'customer_email' => $request->input('customer_email'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
            'total_amount' => $total,
            'paid_amount' => $total,
          ]);
         
          foreach($cart as $id=>$product){
              $order->products()->create([
                  'product_id' => $id,
                  'quantity' => $product['quantity'],
                  'price' => $product['total_price'],
              ]);
          }

          session()->forget(['total', 'cart']);
          $this->setSuccess('Checkout processed successfully.');
          return redirect()->route('dashboard');
    }

    public function checkoutdetails($id)
    {
        $data = [];
        $data['order'] = Order::findOrFail($id);
        return view('frontend.cart.details', $data);
    }


}
