@extends('frontend.layouts.headerHome')

@section('content')
@include('frontend.layouts.navbar-home')

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
                      <li>Wallet</li>
                      <li>Rewards</li>
                      <li>Orders</li>
                      <li>Personal Information</li>
                      <li>Payment Methods</li>
                  </ul>
            </div>
            <div class="col-lg-9 personal-info-detail">
                <h1 class="personal-info-h1">Personal Information</h1>
                <form action="">
                    <div class="row form-list">
                        <div class="col">
                            <input type="text" class="form-control profile-form" placeholder="First name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control profile-form" placeholder="Last name">
                        </div>
                    </div>
                    <div class="row form-list">
                        <div class="col">
                            <input type="text" class="form-control profile-form" placeholder="Email">
                        </div>
                    </div>
                    <div class="row form-list">
                        <div class="col">
                            <input type="text" class="form-control profile-form" placeholder="Password">
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
                    <div class="row form-list">
                        <div class="col-6">
                            <input type="text" class="form-control profile-form" placeholder="Password">
                        </div>
                        <div class="col-6">
                            <!-- <input type="text" class="form-control profile-form" placeholder="Password"> -->
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-profile">Save</button>
                </form>
            </div>
        </div>
    </div>
</section>


@include('frontend.layouts.footer-home')
@endsection 