<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap User -->
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome/all.min.css')}}">
    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
<!-- // Add the new slick-theme.css if you want the default styling -->
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

    <title>Hello, world!</title>
  </head>
  <body>
<section id="homepage-navbar">
    <!-- Navbar -->
    <nav class="navbar navbar-light justify-content-between fixed-top navbar-homepage">
        <a class="navbar-brand">Navbar</a>
        <form class="form-inline mr-auto">
            <input class="form-control mr-sm-2 form-homepage" type="search" placeholder="Search" aria-label="Search">
        </form>
        <img src="{{asset('images/homepage/profile1.jpg')}}" alt="Avatar" class="img-profile">
    </nav>
</section>

<section id="homepage-slider">>
    <div class="single-item">
        <div><img src="{{asset('images/homepage/hyundai.jpg')}}" alt="" class="homepage-slick"></div>
        <div><img src="{{asset('images/homepage/hyundai.jpg')}}" alt="" class="homepage-slick"></div>
        <div><img src="{{asset('images/homepage/hyundai.jpg')}}" alt="" class="homepage-slick"></div> 
    </div>
    <i class="fa-solid fa-chevron-left prev-arrow fa-2xl"></i>
    <i class="fa-solid fa-chevron-right next-arrow fa-2xl"></i>
</section>

<section id="section-home-contents">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-sm-12">
                <img src="{{asset('images/homepage/onestophyundai.jpg')}}" alt="" class="homepage-img">
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
                <img src="{{asset('images/homepage/onestophyundai.jpg')}}" alt="" class="homepage-img">
                <h2>Result Oriented</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quo aspernatur vel, saepe animi necessitatibus. Qui voluptate veritatis ullam aut deleniti doloribus</p>
            </div>
            <div class="col-xl-3 col-sm-6 section-contents-img">
                <img src="{{asset('images/homepage/onestophyundai.jpg')}}" alt="" class="homepage-img">
                <h2>Result Oriented</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quo aspernatur vel, saepe animi necessitatibus. Qui voluptate veritatis ullam aut deleniti doloribus</p>
            </div>
            <div class="col-xl-3 col-sm-6 section-contents-img">
                <img src="{{asset('images/homepage/onestophyundai.jpg')}}" alt="" class="homepage-img">
                <h2>Result Oriented</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quo aspernatur vel, saepe animi necessitatibus. Qui voluptate veritatis ullam aut deleniti doloribus</p>
            </div>
            <div class="col-xl-3 col-sm-6 section-contents-img">
                <img src="{{asset('images/homepage/onestophyundai.jpg')}}" alt="" class="homepage-img">
                <h2>Result Oriented</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quo aspernatur vel, saepe animi necessitatibus. Qui voluptate veritatis ullam aut deleniti doloribus</p>
            </div>
        </div>
    </div>
</section>
<section id="section-home-email">
    <div class="newsletter">
        <div class="container">
            <div class="row justify-content-center">
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
            </div>
        </div>
    </div>
</section>

<section id="homepage-footer">
<div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>About Us</h3>
                        <ul>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse explicabo reiciendis veritatis velit rerum tempora, obcaecati quo in! Excepturi sint saepe perferendis dolor rerum fuga voluptate modi incidunt tenetur at.
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Legacy</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Careers</h3>
                        <ul>
                            <li><a href="#">Job openings</a></li>
                            <li><a href="#">Employee success</a></li>
                            <li><a href="#">Benefits</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social">
                    <h3>Follow Us</h3>

                        <a href="#"><img src="{{asset('images/homepage/icon-instagram.png')}}" alt="" class="social-icon"></a>
                        <a href="#"><img src="{{asset('images/homepage/icon-facebook.png')}}" alt="" class="social-icon"></a>
                        <a href="#"><img src="{{asset('images/homepage/icon-twitter.png')}}" alt="" class="social-icon"></a>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <p class="copyright">
        <a href="">Terms&Conditions</a>|<a href="">Privacy Policy</a>|<a href="">Disclaimer</a>

    </p>

</section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- <script type="text/javascript" src="slick/slick.min.js"></script> -->


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script>
        $(document).ready(function(){
            $('.single-item').slick({
                nextArrow:$('.next-arrow'),
                prevArrow:$('.prev-arrow'),
    
                // prevArrow: '<button class="slide-arrow prev-arrow"></button>',

            });
        });
    </script>
  </body>
</html>