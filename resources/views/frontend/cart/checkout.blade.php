@extends('frontend.layouts.master')
@section('content')
@guest
    <p>Please <a href="{{ route('login') }}">Login</a> first for continue checkout process.</p>
@endguest
 @auth
 <div class="container">
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge badge-secondary badge-pill">{{ count($cartindex) }}</span>
        </h4>
        <ul class="list-group mb-3">
            @foreach ($cartindex as $key=>$item)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">{{ $item['title'] }}</h6>
                  <small class="text-muted">Quantity: {{ $item['quantity'] }}</small>
                </div>
                <span class="text-muted">{{ $item['total_price'] }}</span>
              </li>
            @endforeach

          <li class="list-group-item d-flex justify-content-between">
            <span>Total (BDT)</span>
            <strong>{{ $total }}</strong>
          </li>
        </ul>


      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Checkout</h4>
        <form action="{{ route('checkout.process') }}" method="post">
          @csrf
          <div class="mb-3">
            <label for="username">Customer name</label>
            <div class="input-group">
              <input type="text" name="customer_name" value="{{ auth()->user()->name }}" class="form-control">
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Customer Email</label>
            <input type="email" name="customer_email" value="{{ auth()->user()->email }}" class="form-control">
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control">
          </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="address2">City</label>
                        <input type="text" class="form-control" name="city">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="address2">Postal Code</label>
                        <input type="text" name="postal_code" class="form-control">
                    </div>
                </div>
            </div>
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
 @endauth

@endsection
