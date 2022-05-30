@extends('frontend.layouts.headerHome')

@section('content')
@include('frontend.layouts.navbar-home')
<section id="homepage-header">
    <div class="container">
        <div class="homepage-header-outer text-center">
            <div class="container">
                <h1>Customizable and Truly Unique</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse ipsum nemo, similique minus deserunt soluta. Corporis quod numquam ducimus voluptatem amet commodi consequatur! Est voluptatum quis vel accusantium inventore beatae!</p>
                <div class="homepage-button">
                    <a href="">
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
                <a href="">
                    <span>Create your site</span>
                </a>
        </div>
        </div>
        <div class="col-12 col-xl-6">
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
            <a href="">
                <span>Start Selling</span>
            </a>
        </div>
    </div>
</div>
</section>


@include('frontend.layouts.footer-home')
@endsection 