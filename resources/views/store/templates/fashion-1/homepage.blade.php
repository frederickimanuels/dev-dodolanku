<?php $data=[
    'title' => {{ $store->name }},
    'description' => {{ $store->name }}. ' Homepage @Dodolanku.id',
    'keywords' => 'cart, online shop, business, haul',
    'author' => 'Dodolanku.id',
]; ?>

@include('store.layouts.header')

@include('store.layouts.navbar-home')

<style>
    :root{

        /* Header Disini */
        /* BG Color Dsini */
        --bgcolor:#AE8D84;
        --bgcolor1:#FFFFFF;
        --bgcolor2:#FFF8F6;
        --bgcolor3:#DFC3BB;
        --bgcolorFooter:#AE8D84;
        --bgcolorHeader:#AE8D84;
       

        /* Text Gede Color Disini */
        --textColor1:#FFFFFF;
        --textColor2:#000000;
        --textColor3:#FC764E;

        /* Popular Product Color */
    
        /* FooterColor */
    }
    a{
        text-decoration: none !important;
    }
    a:hover{
        /* border: 1px solid green; */
    }
    .navbar-homepage{
        background-color:var(--bgcolorHeader) !important;
    }
    #store-homepage{
        color:#E5E5E5;
    }
    .store-home-wrapper{
        background-color: var(--bgcolor1);
    }
    .homepage-slick{
        height: 100%;
    }
    .next-arrow{
        top: calc(50% - 420px);
        cursor: pointer;
    }
    .prev-arrow{
        top: calc(50% - 420px);
        cursor: pointer;
    }
    .next-arrow-2{
        top: calc(50% - 420px);
        right:20px;
        cursor: pointer;
        position: absolute;
    }
    .prev-arrow-2{
        top: calc(50% - 420px);
        left: 20px;
        cursor: pointer;
        position: absolute;
    }
    .store-home{
        /* padding-top: 40px; */
        max-width: 100%;
        padding: 0;
        /* padding-bottom: 50px; */
    }
    .store-home img{
        max-height: 900px;
    }
    .store-content{
        max-width: 80%;
        padding-bottom: 50px;
        padding-top: 40px;
    }
    .store-content h1{
        color: var(--textColor2);
        font-family: PlusJakarta-Bold;
        font-size: 48px;
        line-height: 64px;
        text-align: center;
        margin-bottom: 30px;
    }
    .text-over-img{
        position: relative;
    }
    .card{
        border-radius: 5%;
        margin: 0 20px;
    }
    .card:hover{
        border: none;
    }
    .card-img-top{
        border-top-left-radius: 5%;
        border-top-right-radius: 5%;
    }
    .text-over-img h4{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 36px;
        font-family: PlusJakarta-Bold;
        line-height: 56px;
        color: var(--textColor1);
    }
    .text-over-img h5{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 24px;
        font-family: PlusJakarta-Bold;
        line-height: 32px;
        color: var(--textColor1);
    }
    .popular-product{
        background-color: var(--bgcolor2);
        /* margin-top: 80px; */
        padding-top: 50px;
    }
    .popular-product-wrapper{
        padding-top: 30px;
        padding-bottom: 50px;
        background-color:var(--bgcolor3);
        max-width: 80%;
    }
    .popular-product-wrapper h1{
        color: var(--textColor1);
        font-family: PlusJakarta-Bold;
        font-size: 40px;
        line-height: 54px;
        text-align: center;
    }
    .popular-card-text h5{
        font-family: Montserrat-Regular;
        font-size: 14px;
        line-height: 23px;
        color: var(--textColor2);
    }
    .popular-card-text h6{
        font-family: Montserrat-Bold;
        font-size: 16px;
        line-height: 24px;
        color: var(--textColor3);
    }
    .checked {
        color: orange;
    }
    .rating-text{
        color: #9A9A9A;
        font-size: 14px;
        line-height: 23px;
        font-family: Montserrat-Regular;
    }
    .prev-arrow-1{
        left: -30px;
        color: #FFFFFF;
        top: calc(50% - 230px);
        cursor: pointer;
    }
    .next-arrow-1{
        right: -30px;
        color: #FFFFFF;
        top: calc(50% - 230px);
        cursor: pointer;
    }
    .store-video{
        padding-top: 50px;
        background-color: var(--bgcolor2);
        padding-bottom: 70px;
    }
    .store-video-container{
        max-width: 80%;
    }
    #homepage-footer .footer-clean{
        background-color:var(--bgcolorFooter);
    }
    .copyright-wrapper{
        background-color:var(--bgcolor);
    }
    @media screen and (max-width:1199px){
        .text-over-img{
            margin-bottom: 20px;
        }
        .popular-product{
            margin-top: 30px;
            padding-top: 30px;
        }
        .text-over-img h4{
            font-size: 20px;
            line-height: 34px;
        }
        .store-content h1{
            font-size: 36px;
            line-height: 42px;
        }
        .text-over-img h5{
            font-size: 16px;
            line-height: 23px;
        }
        .popular-product-wrapper h1{
            font-size: 32px;
            line-height: 42px;
        }
        .store-home{
            padding-top: 20px;
        }
        .store-video{
            padding-top: 30px;
            padding-bottom: 40px;
        }
        .store-content{
            max-width: 95%;
        }
    }
</style>

<section id="store-homepage">
    <div class="store-home-wrapper">
        <div class="container store-home">
            <div class="single-item">
                <?php $store_banners = $store->templateconfigs()->where('type','store_banner')->get() ?>
                @if(count($store_banners) > 0)
                @foreach($store_banners as $store_banner)
                    <div><img src="{{ asset('images/stored/'. $store_banner->images()->first()->filepath) }}" alt="" class="homepage-slick"></div>
                @endforeach
                @endif
            </div>
            <div class="slick-arrow d-none d-xl-block">
                <i class="fa-solid fa-chevron-left prev-arrow-2 fa-2xl"></i>
                <i class="fa-solid fa-chevron-right next-arrow-2 fa-2xl"></i>
            </div>
        </div>
    </div>
    <div class="store-home-wrapper">
        <div class="container store-content">
            <h1>Shop By Categories</h1>
            <div class="row">
                <div class="col-12 col-xl-3">
                    <div class="row">
                        <div class="col-xl-12 col-6 text-over-img" style="margin-bottom:20px">
                            <img src="{{asset('images/homepage/bg-1.png')}}" alt="" class="homepage-slick">
                            <h5>Sepatu</h5>
                        </div>
                        <div class="col-xl-12 col-6 text-over-img">
                            <img src="{{asset('images/homepage/bg-1.png')}}" alt="" class="homepage-slick">
                            <h5>Jaket</h5>
                        </div>
                    </div>
                </div> 
                <div class="col-12 col-xl-6 text-over-img">
                    <img src="{{asset('images/homepage/bg-1.png')}}" alt="" class="homepage-slick">
                    <h4>Dress Wanita</h4>
                </div>
                <div class="col-12 col-xl-3">
                    <div class="row">
                        <div class="col-xl-12 col-6 text-over-img" style="margin-bottom:20px">
                            <img src="{{asset('images/homepage/bg-1.png')}}" alt="" class="homepage-slick">
                            <h5>Celana</h5>
                        </div>
                        <div class="col-xl-12 col-6 text-over-img">
                            <img src="{{asset('images/homepage/bg-1.png')}}" alt="" class="homepage-slick"> 
                            <h5>Kemeja</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popular-product">
        <div class="container popular-product-wrapper">
            <h1>Produk Terpopuler</h1>
            <div class="container store-home">
                <div class="multiple-items">
                    @foreach($popular_products as $popular_product)
                        <div>
                            <div class="card">
                                <a href="{{ route('store.product.show',[$store->slug,$popular_product->slug]) }}">
                                    <img class="card-img-top" src="{{asset('images/homepage/bag-1.png')}}" alt="Card image cap">
                                    <div class="card-body popular-card-text">
                                        <h5 class="card-text">{{ $popular_product->name }}</h5>
                                        <h6>Rp {{number_format($popular_product->price,0,',','.')}}</h6>
                                        {{-- <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span> --}}
                                        {{-- <span class="rating-text">(127)</span> --}}
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
                <div class="slick-arrow d-none d-xl-block">
                    <i class="fa-solid fa-chevron-left prev-arrow prev-arrow-1 fa-2xl"></i>
                    <i class="fa-solid fa-chevron-right next-arrow next-arrow-1 fa-2xl"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="store-video">
        <div class="container store-video-container">
            <!-- <div class="responsive">
                <div>
                    <video style="padding:10px" width="100%" height="390" controls>
                        <source src="movie.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div>
                    <video style="padding:10px" width="100%" height="390" controls>
                        <source src="movie.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div> -->
            <div class="row">
                <div class="col-xl-6 col-12">
                    <video style="padding:10px" width="100%" height="390" controls>
                        <source src="movie.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="col-xl-6 col-12">
                    <video style="padding:10px" width="100%" height="390" controls>
                        <source src="movie.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>


@include('store.layouts.js')
<!-- Add Js Here -->
<script>
    $(document).ready(function(){
        $('.single-item').slick({
            nextArrow:$('.next-arrow-2'),
            prevArrow:$('.prev-arrow-2'),
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
                    slidesToScroll: 1
                }
                },
            ]
        });
        // $('.responsive').slick({
        //         dots: false,
        //         infinite: false,
        //         speed: 300,
        //         slidesToShow: 2,
        //         slidesToScroll: 2,
        //         prevArrow: null,
        //         nextArrow: null,
        //         responsive: [
        //             {
        //             breakpoint: 1199,
        //             settings: {
        //                 slidesToShow: 1,
        //                 slidesToScroll: 1,
        //             }
        //             },
        //         ]
        //     });
    });
</script>

<!-- End JS -->
@include('store.layouts.footer')
@include('store.layouts.footer-copyright')
</body>
</html>

