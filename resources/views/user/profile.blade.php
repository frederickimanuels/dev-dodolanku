@include('user.layouts.header')

@include('layouts.navbar-home')

<section id="personal-information">
    <div class="container">
        <div class="container">
            <div class="row">
                @include('user.layouts.sidebarmenu')
                <div class="col-lg-9 col-12 personal-info-detail">
                    <h1 class="personal-info-h1">Profile</h1>
                    <form action="">
                        <div class="row form-list">
                            <div class="col">
                                <label for="name" class="profile-label" >Nama</label>
                                <input type="text" name="name" class="form-control profile-form" placeholder="Full name" value="{{ Auth::user()->name }}">
                            </div>
                            {{-- <div class="col">
                                <input type="text" class="form-control profile-form" placeholder="Last name">
                            </div> --}}
                        </div>
                        <div class="row form-list">
                            <div class="col">
                                <label for="email" class="profile-label" >Email</label>
                                <input type="email" name="email"  class="form-control profile-form" placeholder="Email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="row form-list">
                            <div class="col-xl-6 col-12">
                                <label for="password" class="profile-label" >Password</label>
                                <div class="form-control profile-form" style="display: flex; justify-content:space-between; padding-top:12px;">
                                    <input type="password" value="******" style="background:none;" disabled="disabled">
                                    <a href="#" style="text-decoration:none;">Ubah Password</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12 pt-3 pt-xl-0">
                                <label for="birth-date" class="profile-label">Birth Date</label>
                                <input type="date" class="form-control profile-form" placeholder="Birth Date">
                            </div>
                        </div>
                        {{-- <div class="row form-list">
                            <div class="col-xl-6 col-12">
                                <label for="phone-number" class="profile-label">Phone Number</label>
                                <input type="number" class="form-control profile-form" placeholder="Phone Number">
                            </div>
                            <div class="col-xl-6 col-12 pt-3 pt-xl-0">
                                <label for="birth-date" class="profile-label">Birth Date</label>
                                <input type="date" class="form-control profile-form" placeholder="Birth Date">
                            </div>
                        </div> --}}
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
    </div>
</section>


@include('layouts.js')
<!-- Add JS Here -->

<!-- End JS -->
@include('layouts.footer')