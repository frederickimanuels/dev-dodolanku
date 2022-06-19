@include('user.layouts.header')

@include('layouts.navbar-home')

<section id="personal-information">
    <div class="container">
        <div class="container">
            <div class="row">
                @include('user.layouts.sidebarmenu')
                <div class="col-lg-9 col-12 personal-info-detail">
                    <h1 class="personal-info-h1">Ubah Password</h1>
                    <form action="{{ route('change.password.store') }}" method="POST">
                        @csrf
                        <div class="row form-list">
                            <div class="col">
                                <label for="name" class="profile-label" >Password Lama</label>
                                <input class="form-control profile-form" type="password" name="current_password" autocomplete="current-password"  placeholder="Masukkan password lama..">
                            </div>
                        </div>
                        @error('current_password')
                            <p class="help-block text-danger">Password lama salah</p>
                        @enderror
                        <div class="row form-list">
                            <div class="col">
                                <label for="name" class="profile-label" >Password Baru</label>
                                <input class="form-control profile-form" type="password" name="new_password" placeholder="Masukkan password baru..">
                            </div>
                        </div>
                        @error('new_password')
                            <p class="help-block text-danger">Password minimal 8 karakter</p>
                        @enderror
                        <div class="row form-list">
                            <div class="col">
                                <label for="name" class="profile-label" >Konfirmasi Password Baru</label>
                                <input class="form-control profile-form" type="password" name="new_confirm_password"  placeholder="Ulangi password baru..">
                            </div>
                        </div>
                        @error('new_confirm_password')
                            <p class="help-block text-danger">Konfirmasi password tidak sama</p>
                        @enderror
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