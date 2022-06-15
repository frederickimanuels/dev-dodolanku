@include('user.layouts.header')

@include('layouts.navbar-home')

<section id="personal-information">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 left-profile">
                <div class="img-container">
                    <div class="img-inner">
                        <img src="{{asset('images/homepage/profile1.jpg')}}" alt="Avatar" class="img-profile-big">
                    </div>
                </div>
                  <h2 class="profile-name" >Billie H</h2>
                  <ul class="profile-menu-list">
                        {{-- <li>Wallet</li> --}}
                        <li>
                            <a href="{{ route('user.profile') }}">Profile</a>
                        </li>
                        <li>Orders</li>
                        <li>Address</li>
                        {{-- <li>Payment Methods</li> --}}
                  </ul>
            </div>
            <div class="col-lg-9 personal-info-detail">
                <h1 class="personal-info-h1">Profile</h1>
                <form action="">
                    <div class="row form-list">
                        <div class="col">
                            <input type="text" name="name" class="form-control profile-form" placeholder="Full name" value="{{ Auth::user()->name }}">
                        </div>
                        {{-- <div class="col">
                            <input type="text" class="form-control profile-form" placeholder="Last name">
                        </div> --}}
                    </div>
                    <div class="row form-list">
                        <div class="col">
                            <input type="email" name="email"  class="form-control profile-form" placeholder="Email" value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                    <div class="row form-list">
                        <div class="col">
                            <input type="password" name="password" class="form-control profile-form" placeholder="Password">
                        </div>
                    </div>
                    <div class="row form-list">
                        <div class="col">
                            <input type="text" class="form-control profile-form" placeholder="Phone Number">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control profile-form" placeholder="Birth Date">
                        </div>
                    </div>
                    {{-- <div class="row form-list">
                        <div class="col-6">
                            <input type="text" class="form-control profile-form" placeholder="Password">
                        </div>
                        <div class="col-6">
                            <!-- <input type="text" class="form-control profile-form" placeholder="Password"> -->
                        </div>
                    </div> --}}
                    <button type="submit" class="btn btn-primary btn-profile">Save</button>
                </form>
            </div>
        </div>
    </div>
</section>


@include('layouts.js')
<!-- Add JS Here -->

<!-- End JS -->
@include('layouts.footer')