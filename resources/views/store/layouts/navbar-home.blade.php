<style>
  .navbar-brand{
    display: flex;
    padding-top: 0px !important;
  }
  a:hover{
    color: green;
    text-decoration: none;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-homepage">
    <div class="container-fluid navbar-container">
      <button class="navbar-toggler navbar-burger-btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="{{ route('store.show',$store->slug) }}">
          <img src="{{ $store->templateconfigs()->where('type','store_logo')->first() ?  asset('images/stored/'. $store->templateconfigs()->where('type','store_logo')->first()->images()->first()->filepath) : asset('images/homepage/logo_dodolanku_white.png')  }}" height="25" alt=".." loading="lazy"/>
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('store.show',$store->slug) }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('store.product.list',$store->slug) }}">Products</a>
          </li>
           <li>
            <form method="GET" action="{{ route('store.product.list',$store->slug) }}">
              <input name="keywords" autocomplete="off" type="search" class="form-control rounded" placeholder="Cari Produk" style="min-width: 125px;"/>
            </form>
          </li>
        </ul>
      </div>
  
      
  
      <!-- Right elements -->
      <div class="d-flex align-items-center">
        {{-- <a class="text-reset me-3" href="#">
          <i class="fa-solid fa-magnifying-glass"></i>
        </a> --}}
        <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li>
          <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" style="min-width: 100px;"/>
          </li>
        </ul> -->
        <!-- Appear When Not Login -->
        @if(Auth::guest())
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
          </li>
  
        </ul>
        @endif
        <!-- End Appear When Not Login -->
  
  
  
        <!-- Appear when login -->
        @if(!Auth::guest())
          <a class="text-reset me-3" href="{{route('cart.show',$store->slug)}}">
              <i class="fa-solid fa-shopping-cart"></i>
          </a>
  
          <!-- Appear When don't have shop -->
          @if(!Auth::user()->hasStore())
            <div class="shop-outer">
              <a class="text-reset shop-icon" href="{{ route('store.create') }}">
                {{-- <i class="fa-solid fa-shop"></i> --}}
                <span class="navbar-shop-create">Create Your Site</span>
              </a>
            </div>
          @endif
  
          <!-- Appear When have shop -->
          @if(Auth::user()->hasStore())
            <div class="shop-outer">
              <a class="text-reset shop-icon" href="{{ route('store.dashboard') }}">
                <i class="fa-solid fa-shop"></i>
                <span class="navbar-shop-name">{{ Auth::user()->hasStore()->name }}</span>
              </a>
            </div>
          @endif
  
  
          <div class="dropdown">
            <a class="dropdown-toggle d-flex align-items-center hidden-arrow navbar-profile" href="#" id="navbarDropdownMenuAvatar" role="button" data-toggle="dropdown" aria-expanded="false">
              <strong class="d-none d-sm-block ms-1 me-2">Hi, {{Auth::check() ? explode(' ', Auth::user()->name, 2)[0] : 'User'}}</strong>
            
              <img src="{{ Auth::user()->images()->first() ? asset('images/stored/'. Auth::user()->images()->first()->filepath) :  asset('images/homepage/blank-profile-picture.png') }}" class="rounded-circle" height="25"alt="Black and White Portrait of a Man" loading="lazy"/>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
              <li>
                <a class="dropdown-item" href="{{ route('user.profile') }}">My profile</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Orders</a>
              </li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </div>
        @endif
        <!-- End Appear Login -->
  
      </div>
    </div>
  </nav>
  