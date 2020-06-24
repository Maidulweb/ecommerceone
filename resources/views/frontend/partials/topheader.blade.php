<div class="top-header">
    <div class="container">
    <div class="row">
        <div class="col-md-4 line-60">
            <p>123456789</p>
        </div>
        <div class="col-md-4 text-center">
            <form class="search-input form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
        </div>
        <div class="col-md-4 text-right line-60">
            @guest
            <a href="">Login</a>
            <a href="">Register</a>
            @endguest
            @auth
            <a href="">Profile</a>
            <a href="">Logout</a>
            @endauth
        </div>
    </div>
 </div>
</div>
