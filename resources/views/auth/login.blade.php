@include('auth.layouts.header')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <!-- <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('images/homepage/profile1.jpg')}}" alt="IMG">
            </div> -->
            <div class="login100-pic js-tilt">
                <img src="{{asset('images/homepage/profile1.jpg')}}" alt="IMG">
            </div>

            <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                @csrf
                <span class="login100-form-title">
                    Login To Your Account
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <!-- <i class="fa fa-envelope" aria-hidden="true"></i> -->
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <!-- <i class="fa fa-lock" aria-hidden="true"></i> -->
                    </span>

                    <div class="p-t-12 forgot-password-btn">
                    <a class="txt2" href="#">
                        Forgot Password?
                    </a>
                    </div>
                </div>
                
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Don't Have Account?
                    </span>
                    <a class="txt2" href="{{route('register')}}">
                        Register
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