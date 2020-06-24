@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @foreach ($productimages as $productimage)
            @if ($product->id == $productimage->product_id)
            <img src="{{ $productimage->photo }}" alt="Not found">
            @endif
            @endforeach

        </div>
        <div class="col-md-6">
            <p>{{ $product->title }}</p>
            <p>BDT: {{ $product->price }}</p>
            <p>{{ $product->description }}</p>
            <p><a href="">Add To Cart</a></p>
        </div>
    </div>
</div>
@endsection
