<?php $data=[
    'title' => 'Register to Dodolanku.id',
    'description' => 'Register Page Dodolanku',
    'keywords' => 'Dodolanku.id',
    'author' => 'Dodolanku.id',
]; ?>
@include('auth.layouts.header')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt">
                <img src="{{ asset('images/homepage/logo_dodolanku_favicon.png') }}" alt="IMG" style="width:auto;height:80%">
            </div>
            <form method="POST" class="login100-form validate-form" action="{{ route('register') }}">
                @csrf
                <a href="{{ route('base') }}" class="login100-logo-title">
                    <img src="{{ asset('images/homepage/logo_dodolanku_name.png') }}" alt="IMG" style="max-width:70%;max-height:100%;">
                </a>
                <span class="login100-form-title">
                    Register
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Valid name is required">
                    <input class="input100" type="text" name="name" placeholder="Full Name" value="{{ old('name') }}">
                    <span class="focus-input100"></span>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                    <span class="focus-input100"></span>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                    <span class="focus-input100"></span>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="" type="checkbox" name="terms">

                    <label class="form-check-label txt1" for="flexCheckDefault">
                        Agree to our Terms & Conditions
                    </label>
                    @if ($errors->has('terms'))
                        <span class="text-danger">{{ $errors->first('terms') }}</span>
                    @endif
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Register
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Already Have Account?
                    </span>
                    <a class="txt2" href="{{route('login')}}">
                        Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@include('auth.layouts.footer')