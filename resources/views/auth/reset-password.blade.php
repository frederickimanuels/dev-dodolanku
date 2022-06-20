<?php $data=[
    'title' => 'Reset Password',
    'description' => 'Reset Password account Dodolanku',
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

            <form method="POST" action="{{ route('reset.password') }}" class="login100-form validate-form">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <a href="{{ route('base') }}" class="login100-logo-title">
                    <img src="{{ asset('images/homepage/logo_dodolanku_name.png') }}" alt="IMG" style="max-width:70%;max-height:100%;">
                </a>
                <span class="login100-form-title">
                    Reset Password
                </span>
                
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span>{{ session('error') }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <!-- <i class="fa fa-envelope" aria-hidden="true"></i> -->
                    </span>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <!-- <i class="fa fa-lock" aria-hidden="true"></i> -->
                    </span>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Confirm Password is required">
                    <input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <!-- <i class="fa fa-lock" aria-hidden="true"></i> -->
                    </span>
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif

                </div>
                
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Reset Password
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Suddenly Remember?
                    </span>
                    <a class="txt2" href="{{route('login')}}">
                        Login Now
                    </a>
                </div>

                <!-- <div class="text-center p-t-80">
                    <a class="txt2" href="#">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div> -->

            </form>

        </div>
    </div>
</div>
@include('auth.layouts.footer')