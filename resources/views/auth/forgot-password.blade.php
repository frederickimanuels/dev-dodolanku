<?php $data=[
    'title' => 'Forgot Password',
    'description' => 'Forgot Password account Dodolanku',
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

            <form method="POST" action="{{ route('forgot.password') }}" class="login100-form validate-form">
                @csrf
                <a href="{{ route('base') }}" class="login100-logo-title">
                    <img src="{{ asset('images/homepage/logo_dodolanku_name.png') }}" alt="IMG" style="max-width:70%;max-height:100%;">
                </a>
                <span class="login100-form-title">
                    Forgot Password
                </span>
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span>{{ session('status') }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span>{{ session('error') }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Tuliskan email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <!-- <i class="fa fa-envelope" aria-hidden="true"></i> -->
                    </span>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <!-- <i class="fa fa-lock" aria-hidden="true"></i> -->
                    </span>
                </div>
                
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Send Reset Link
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