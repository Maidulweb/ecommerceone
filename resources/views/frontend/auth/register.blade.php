@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <form action="{{ route('register.process') }}" method="post">
        @csrf
        <div class="form-group">
          <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter name">
        </div>
        <div class="form-group">
          <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter email">
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Enter password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
