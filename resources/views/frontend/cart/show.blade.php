@extends('frontend.layouts.master')
@section('content')
<div class="container">
 <div class="cart-table">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Unit Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @php $i = 1;  @endphp
            @foreach ($cartindex as $key=>$item)
            <tr>
                <th scope="row">{{ $i++ }}</th>

                <td>{{ $item['title'] }}</td>

                <td>BDT: {{ $item['unit_price'] }}</td>

                <td> <input style="width: 70px" class="form-control" type="text" value="{{ $item['quantity'] }}"></td>

                <td>BDT: {{ $item['total_price'] }}</td>

                <td>
                    <form action="{{ route('cart.remove') }}" method="post">
                        @csrf
                        <input type="hidden" name="addtoremove" value="{{ $key }}">
                        <button type="submit" class="btn btn-info">Remove</button>
                    </form>
                </td>

              </tr>
            @endforeach
               <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td>Total</td>
                   <td>BDT: {{ number_format($total, 2)  }}</td>
                   <td></td>
               </tr>
        </tbody>
      </table>
 </div>
</div>

@endsection
