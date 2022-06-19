@include('homepage.layouts.header')

@include('layouts.navbar-home')
<style>
    .slick-slider {
  width: 100%;
  background-color: transparent;
}
.slick-track {
  display: flex;
  align-items: center;
  flex-wrap: nowrap;
  /* height: 100px; */
  justify-content: center;
}
.slick-list { 
  padding:45px 60px !important;
  margin-left:30px !important;
  min-height: 50vw;
}
.slick-slide{
  float: none;
  display: inline-block;
  vertical-align: middle;
  padding: 10px 0px;
  margin: 0 60px;
  /* background-color: green; */
  transition: all 0.3s ease;
  /* height: auto; */
  text-align: center;
}
.slick-current {
  /* background:linear-gradient(45deg, rgb(246, 146, 89), rgb(241, 105, 117)); */
  /* padding: 30px 0px; */
}
.slick-center{
    /* background:linear-gradient(45deg, rgb(246, 146, 89), rgb(241, 105, 117)); */
    /* padding: 30px 0px; */
    -webkit-transform: scale(2) !important;
    -moz-transform: scale(2) !important;
    transform: scale(2.5) !important;
}
@media screen and (max-width:767px){
    .slick-slide{
        padding: 0;
        margin: 0;
    }
  .slick-list { 
        padding:10px 10px !important;
        margin-left:10px !important;
        min-height: 50vw;
    }
    .slick-center{
        -webkit-transform: scale(1) !important;
        -moz-transform: scale(1) !important;
        transform: scale(1) !important;
    }
}
</style>
<section id="homepage-header">
    <div class="container">
        <div class="homepage-header-outer text-center">
            <div class="container">
                <h1>Customizable and Truly Unique</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse ipsum nemo, similique minus deserunt soluta. Corporis quod numquam ducimus voluptatem amet commodi consequatur! Est voluptatum quis vel accusantium inventore beatae!</p>
                <div class="homepage-button">
                    <a href="{{ route('store.create') }}">
                        <span>Start Selling</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="homepage-row-1">
    <div class="slick-slider">
        <div><img src="{{asset('images/homepage/bg-1.png')}}" alt=""></div>
        <div><img src="{{asset('images/homepage/bg-1.png')}}" alt=""></div>
        <div><img src="{{asset('images/homepage/bg-1.png')}}" alt=""></div> 
        <div><img src="{{asset('images/homepage/bg-1.png')}}" alt=""></div>
    </div>

</section>

<section id="homepage-row-2" >
<div class="container">
    <div class="row">
        <div class="col-12 col-xl-6 homepage-row-2-inner">
            <h1>Intutitive Gallery Functionally</h1>
            <h2>Easily Design Engaging Exhibit</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex veritatis impedit molestias itaque fuga incidunt sint cumque saepe dicta optio nam, debitis, exercitationem cupiditate officiis omnis aspernatur. Dolorum, repudiandae delectus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi esse corrupti, quos incidunt nobis totam officia quibusdam deserunt odit voluptatibus minus labore eaque, quasi aperiam, dolor quo explicabo officiis illum?</p>
            <div class="homepage-button" >
                <a href="{{ route('store.create') }}">
                    <span>Create your site</span>
                </a>
            </div>
        </div>
        <div class="col-12 d-none d-xl-block col-xl-6">
            <div class="homepage-row-2-img">
                <img src="{{asset('images/homepage/laptop-1.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
</section>

<section id="homepage-row-3">
<div class="container">
    <div class="homepage-row-3-inner">
        <h1>A Superior E-Commerce Solution</h1>
        <h2>Power up your online commerce website</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates, at. Dolore quam placeat esse debitis iusto dolorum consequatur culpa doloribus, commodi dignissimos maxime similique maiores saepe labore eum possimus voluptas. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos error odit suscipit dicta minima modi, ratione voluptas non similique! Aut totam praesentium vel odio ea! Repellendus quis numquam hic dolorum.</p>
        <div class="homepage-button" >
            <a href="{{ route('store.create') }}">
                <span>Start Selling</span>
            </a>
        </div>
    </div>
</div>
</section>
@include('layouts.js')
<!-- Add Javascript Here ... -->
<script>
    $('.center').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        responsive: [
        {
            breakpoint: 768,
            settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 3
            }
        },
        {
            breakpoint: 480,
            settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
            }
        }
        ]
    });

    $('.slick-slider').slick({
        centerMode: true,
        slidesToShow: 3,
        // dots: true,
        arrows: true,
        swipe: true,
        focusOnSelect:true,
    //  infinite: true,
        swipeToSlide: true,
        prevArrow:false,
        nextArrow:false,
        responsive: [
                {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
                },
                {
                breakpoint: 599,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
                },
            ]
    });
</script>
<!-- End JavaScript -->
@include('layouts.footer')