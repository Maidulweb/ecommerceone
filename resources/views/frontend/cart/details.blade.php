@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <div class="">
     <h4>Order Details</h4>
    </div>
    <ul class="list-group">
        <li class="list-group-item">Order ID: <strong>{{ $order->id }}</strong></li>
        <li class="list-group-item">Customer Name: <strong>{{ $order->customer_name }}</strong></li>
        <li class="list-group-item">Customer Email: <strong>{{ $order->customer_email }}</strong></li>
        <li class="list-group-item">Address: <strong>{{ $order->address }}</strong></li>
        <li class="list-group-item">City: <strong>{{ $order->city }}</strong></li>
        <li class="list-group-item">Postal Code: <strong>{{ $order->postal_code }}</strong></li>
        <li class="list-group-item">Total Amount: <strong>{{ $order->total_amount }}</strong></li>
        <li class="list-group-item">Paid Amount: <strong>{{ $order->paid_amount }}</strong></li>
      </ul>
</div>
@endsection

