@extends('frontend.layouts.master')
@section('content')
<div class="container">
 <div class="cart-table">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @php $i = 1;  @endphp
            @foreach ($cart as $item)
            <tr>
                <th scope="row">1</th>
                <td>{{ $item['title'] }}</td>
                <td> <input style="width: 70px" class="form-control" type="text" value="{{ $item['quantity'] }}"></td>
                <td>{{ $item['price'] }}</td>
                <td> <a href="" class="btn btn-info">Remove</a></td>
              </tr>
            @endforeach

        </tbody>
      </table>
 </div>
</div>

@endsection
