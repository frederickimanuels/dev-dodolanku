<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-homepage">
  <div class="container-fluid navbar-container">
    <button class="navbar-toggler navbar-burger-btn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img src="" height="15" alt=".." loading="lazy"/>
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Feature</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Faq</a>
        </li>
      </ul>
    </div>

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <a class="text-reset me-3" href="#">
      <i class="fa-solid fa-magnifying-glass"></i>
      </a>

      <!-- Appear When Not Login -->
      <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Sign In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sign Up</a>
        </li>
      </ul> -->



      <!-- Appear when login -->
      <a class="text-reset me-3" href="{{url('/cart')}}">
          <i class="fa-solid fa-shopping-cart"></i>
      </a>

      <!-- Appear When have shop -->
      <div class="shop-outer">
        <a class="text-reset shop-icon" href="{{url('')}}">
          <i class="fa-solid fa-shop"></i>
          <span class="navbar-shop-name" >Nama Toko</span>
        </a>
      </div>


      <div class="dropdown">
        <a class="dropdown-toggle d-flex align-items-center hidden-arrow navbar-profile" href="#" id="navbarDropdownMenuAvatar" role="button" data-toggle="dropdown" aria-expanded="false">
          <strong class="d-none d-sm-block ms-1 me-2">Hi, {{Auth::check() ? explode(' ', Auth::user()->name, 2)[0] : 'User'}}</strong>
        
          <img src="{{asset('images/homepage/profile1.jpg')}}" class="rounded-circle" height="25"alt="Black and White Portrait of a Man" loading="lazy"/>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
          <li>
            <a class="dropdown-item" href="#">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Settings</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Logout</a>
          </li>
        </ul>
      </div>
      <!-- End Appear Login -->

    </div>
  </div>
</nav>
