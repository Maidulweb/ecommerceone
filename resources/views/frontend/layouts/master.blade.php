@include('frontend.partials.header')


    @include('frontend.partials.topheader')

    @include('frontend.partials.nav')
<div class="content-body">
    <div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('frontend.partials.sidebar')
        </div>
        <div class="col-md-9">
            @include('frontend.partials.errormessage')
            @yield('content')
        </div>
    </div>
    </div>
</div>


@include('frontend.partials.footer')
