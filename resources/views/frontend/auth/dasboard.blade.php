@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Email</th>
            <th scope="col">Total Amount</th>
            <th scope="col">Paid Amount</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($order as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->customer_name }}</td>
            <td>{{ $item->customer_email }}</td>
            <td>{{ $item->total_amount }}</td>
            <td>{{ $item->paid_amount }}</td>
            <td><a class="btn btn-success" href="{{ route('checkout.details', $item->id) }}">Details</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection
