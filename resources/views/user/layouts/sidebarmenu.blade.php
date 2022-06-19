<div class="col-lg-3 col-12 left-profile">
    <div class="img-container">
        <div class="img-inner">
            <img src="{{ Auth::user()->images()->first() ? asset('images/stored/'. Auth::user()->images()->first()->filepath) :  asset('images/homepage/blank-profile-picture.png') }}" alt="Avatar" class="img-profile-big">
        </div>
    </div>
        <h2 class="profile-name" >{{ Auth::user()->name }}</h2>
        <style>
            .profile-menu-list a{
                text-decoration: none;
                color: inherit;
            }
        </style>
        <ul class="profile-menu-list">
            {{-- <li>Wallet</li> --}}
            <li><a href="{{ route('user.profile') }}">Profile</a></li>
            <li><a href="{{ route('user.order') }}">Orders</a></li>
            <li><a href="{{ route('user.address') }}">Address</a></li>
            {{-- <li>Payment Methods</li> --}}
        </ul>
</div>

<script></script>