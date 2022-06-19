@include('homepage.layouts.header')

@include('layouts.navbar-home')

<style>
 .card{
    border: none;
 }
 .card h2{
    font-family: Montserrat-Bold;
    text-align: left;
    color: #000000;
    font-size: 24px;
    margin-bottom: 20px;
 }
 .card p{
    font-family: Montserrat-Medium;
    text-align: justify;
    color: #000000;
    font-size: 16px;
 }
 .card img{
    width: 250px;
    height: 250px;
 }
.card:hover{
  border: none;
  cursor:unset;
}
@media screen and (max-width:599px)
{
    .card img{
        width: 100%;
        height: 100%;
    }
}
 
   
</style>

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
                    <a href="{{route('store.create')}}">
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
        <div class="container section-home-inner-1">
            <div class="yellow-line" style="padding:10px;margin:auto"></div>
            <h1 style="margin-top:10px;">Mengapa Para Top Seller Memilih Kami ?</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi architecto repudiandae ipsam repellendus doloremque mollitia placeat impedit</p>
        </div>
    </div>
    <div class="container container-homepage-content">
        <div class="multiple-items">
            <div>
                <div class="card">
                    <img src="{{asset('images/homepage/result.png')}}" alt="" class="homepage-img">
                    <div class="card-body">
                        <h2>Result Oriented</h2>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="card">
                    <img src="{{asset('images/homepage/ideas.png')}}" alt="" class="homepage-img">
                    <div class="card-body">
                        <h2>Result Oriented</h2>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="card">
                    <img src="{{asset('images/homepage/excellent.png')}}" alt="" class="homepage-img">
                    <div class="card-body">
                        <h2>Result Oriented</h2>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="card">
                    <img src="{{asset('images/homepage/onestop.png')}}" alt="" class="homepage-img">
                    <div class="card-body">
                        <h2>Result Oriented</h2>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
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
                <div class="col-xl-6 col-md-6 col-12  text-right start-now">
                    <h2>Power up your commerce website</h2>
                </div>
                <div class="col-xl-6 col-md-6 col-12 text-left start-now">
                    <!-- <a href="/" class="start-button">
                        <span>Start Now its Free</span>
                    </a> -->
                    <form>
                        <a href="{{ route('store.create') }}">
                            <button class="start-button">Start now its Free</button>
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@include('layouts.js')
<!-- Add JS Here... -->
<script>
    $(document).ready(function(){
        $('.single-item').slick({
            nextArrow:$('.next-arrow'),
            prevArrow:$('.prev-arrow'),
            // prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        });
        $('.multiple-items').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            nextArrow:$('.next-arrow'),
            prevArrow:$('.prev-arrow'),
            responsive: [
                {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
                },
                {
                breakpoint: 599,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots:true,
                }
                },
            ]
        });
    });
</script>
<!-- End JS -->
@include('layouts.footer')