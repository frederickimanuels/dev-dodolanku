@extends('homepage.layouts.headerHome')

@section('content')
    <!-- Navbar -->
    <!-- <nav class="navbar navbar-light justify-content-between fixed-top navbar-homepage">
        <a class="navbar-brand">Dodolanku.id</a>
        <form class="form-inline mr-auto">
            <input class="form-control mr-sm-2 form-homepage" type="search" placeholder="Search" aria-label="Search">
        </form>
        <img src="{{asset('images/homepage/profile1.jpg')}}" alt="Avatar" class="img-profile">
    </nav> -->
    @include('frontend.layouts.navbar-home')

<section id="homepage-slider">
    <div class="single-item">
        <div><img src="{{asset('images/homepage/bg-1.png')}}" alt="" class="homepage-slick"></div>
        <div><img src="{{asset('images/homepage/bg-1.png')}}" alt="" class="homepage-slick"></div>
        <div><img src="{{asset('images/homepage/bg-1.png')}}" alt="" class="homepage-slick"></div> 
    </div>
    <div class="slick-arrow" >
        <i class="fa-solid fa-chevron-left prev-arrow fa-2xl"></i>
        <i class="fa-solid fa-chevron-right next-arrow fa-2xl"></i>
    </div>
    <div class="container">
        <div class="slick-container-text">
            <div class="slick-text-inner">
                <div class="slick-text">
                    <h1>Solusi End-to-End Terlengkap untuk Bisnis Online di Indonesia</h1>
                    <a href="/">
                        <span>Create Your Site</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section-home-contents">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-sm-12">
                <img src="{{asset('images/homepage/computer-1.png')}}" alt="" class="homepage-img">
            </div>
            <div class="col-xl-6 col-sm-12">
                <div class="section-home-inner">
                <div class="yellow-line"></div>
                    <h2>Platform All-in-one untuk semua Kebutuhan Bisnis Online</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita officia, velit odio ea animi laborum, ex enim facere optio, fugiat magnam consectetur esse tempora voluptatum ipsum provident praesentium magni maiores?</p>
                </div>
            </div>
        </div>
        <div class="container section-home-inner-1" style="margin-top:100px">
            <div class="yellow-line" style="padding:10px;margin:auto"></div>
            <h1 style="margin-top:10px;">Mengapa Para Top Seller Memilih Kami ?</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi architecto repudiandae ipsam repellendus doloremque mollitia placeat impedit</p>
        </div>
    </div>
    <div class="container" style="margin-top:50px">
        <div class="row">
            <div class="col-xl-3 col-sm-6 section-contents-img">
                <img src="{{asset('images/homepage/result.png')}}" alt="" class="homepage-img">
                <h2>Result Oriented</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quo aspernatur vel, saepe animi necessitatibus. Qui voluptate veritatis ullam aut deleniti doloribus</p>
            </div>
            <div class="col-xl-3 col-sm-6 section-contents-img">
                <img src="{{asset('images/homepage/ideas.png')}}" alt="" class="homepage-img">
                <h2>Result Oriented</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quo aspernatur vel, saepe animi necessitatibus. Qui voluptate veritatis ullam aut deleniti doloribus</p>
            </div>
            <div class="col-xl-3 col-sm-6 section-contents-img">
                <img src="{{asset('images/homepage/excellent.png')}}" alt="" class="homepage-img">
                <h2>Result Oriented</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quo aspernatur vel, saepe animi necessitatibus. Qui voluptate veritatis ullam aut deleniti doloribus</p>
            </div>
            <div class="col-xl-3 col-sm-6 section-contents-img">
                <img src="{{asset('images/homepage/onestop.png')}}" alt="" class="homepage-img">
                <h2>Result Oriented</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quo aspernatur vel, saepe animi necessitatibus. Qui voluptate veritatis ullam aut deleniti doloribus</p>
            </div>
        </div>
    </div>
</section>
<section id="section-home-email">
    <div class="newsletter">
        <div class="container">
            <!-- <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-7">
                    <div class="section-title text-center">
                        <h2>Ingin Tahu Lebih Lanjut Tentang Kami?</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-7">
                    <form class="newsletter-form">
                        <input type="email" placeholder="Enter your email..." required>
                        <button type="submit">Subscribe Now</button>
                    </form>
                </div>
            </div> -->
            <div class="row">
                <div class="col-6 text-right" >
                    <h2>Power up your commerce website</h2>
                </div>
                <div class="col-6 text-left">
                    <!-- <a href="/" class="start-button">
                        <span>Start Now its Free</span>
                    </a> -->
                    <form>
                        <button class="start-button" formaction="/link">Start now its Free</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@include('frontend.layouts.footer-home')
@endsection 