@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4">
            <div class="card" style="">
                  @foreach ($product_image as $item)
                  @if($product->id == $item->product_id)
                  <a href="{{ route('product.show', $product->slug) }}"><img src="{{ $item->photo }}" alt="No found"></a>

                  @endif
                  @endforeach
                <div class="card-body">
                    <a href="{{ route('product.show', $product->slug) }}"><h5 class="card-title">{{ $product->title }}</h5></a>

                  <p class="card-text">{{ $product->description }}</p>
                  <p class="card-text">
                   @if($product->sale_price !== null && $product->sale_price > 0)
                    <strike>BDT: {{ $product->price }}</strike><br> <strong>BDT:  {{ $product->sale_price }}</strong>
                   @else
                  <strong>BDT: {{ $product->price }}</strong>
                   @endif
                  </p>

                  <form action="{{ route('cart.add') }}" method="post">
                      @csrf
                      <input type="hidden" name="addtocart" value="{{ $product->id }}">
                      <button type="submit" class="btn btn-success">Add To Cart</button>
                  </form>


                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
