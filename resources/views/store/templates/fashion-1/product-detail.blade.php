@include('store.layouts.header')

@include('store.layouts.navbar-home')

<style>
    :root{

        /* BG */
        --bgcolor:#AE8D84;
        --bgcolor1:#FFFFFF;
        --bgcolor2:#FFF8F6;
        --bgcolor3:#DFC3BB;
        --bgcolorFooter:#AE8D84;
        --bgcolorHeader:#AE8D84;
       

        /* Text */
        --textColor1:#FFFFFF;
        --textColor2:#000000;
        --textColor3:#8A3624;
        --textColor4:#9A9A9A;
        --textColor5:#FC764E;

        /* Popular Product Color */
        --popularProductName:#000000;
        --popularProductPrice:#FC764E;

        /* Button Color */
        --buttonbuynow:#FC764E;
        --buttontext:#FFFFFF;
        --buttontext2:#9A9A9A;

        /* FooterColor */
    }
    #homepage-footer .footer-clean{
        background-color:var(--bgcolorFooter);
    }
    #detail-product{
        /* padding-bottom: 80px; */
    }
    .copyright-wrapper{
        background-color:var(--bgcolor);
    }
    .navbar-homepage{
        background-color:var(--bgcolorHeader) !important;
    }
    
    .js .slider-single > div:nth-child(1n+2) { display: none }

    .js .slider-single.slick-initialized > div:nth-child(1n+2) { display: block }

    h3 {
        /* background: #f0f0f0; */
        /* color: #3498db; */
        /* font-size: 2.25rem; */
        /* margin: .5rem; */
        /* padding: 2%; */
        /* position: relative; */
        /* text-align: center; */
    }

    .slider-single h3 {
        line-height: 10rem;
    }

    .slider-nav h3::before {
        content: "";
        display: block;
        padding-top: 75%;
    }

    .slider-nav h3 span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .slider-nav .slick-slide { cursor: pointer; }

    .slick-slide.is-active h3 {
        color: #c00;
        background-color: #fff
    }
    .slider-single img{
        height: 500px;
        width: 500;
       
    }
    .slider-nav img{
        height: 200px;
        /* width: 200px; */
        border: 10px solid #FFFFFF;
    }
    .slick-track{
        /* width: 100% !important; */
    }
    .checked {
        color: orange;
    }
    .detail-product-name{
        /* display: flex; */
    }
    .product-rating{
        order: 2;
        margin-left: auto;
        line-height: 64px;
    }
    .rating-text{
        color: #9A9A9A;
        font-size: 14px;
        line-height: 23px;
        font-family: Montserrat-Regular;
    }
    .detail-product h3{
        color:var(--textColor3);
        font-size: 48px;
        line-height: 64px;
        font-family: PlusJakarta-Bold;
    }
    .detail-product-name h2{
        font-family: PlusJakarta-Bold;
        font-size: 48px;
        line-height: 64px;
        color: var(--textColor2);
    }
    .form-select{
        width: 40%;
        border-radius: 15px;
        background-color: var(--textColor1);
        color: var(--textColor4);
    }
    .detail-product-variant label{
        color: var(--textColor2);
        font-family: Montserrat-Bold;
        font-size: 18px;
        line-height: 26px;
        margin-top: 15px;
        margin-bottom: 15px;
    }
    /* -- quantity box -- */

    .quantity {
        display: inline-block; 
        border: 1px solid #9A9A9A;
        border-radius: 15px;
    }

    .quantity .input-text.qty {
        width: 35px;
        height: 45px;
        padding: 0 5px;
        text-align: center;
        background-color: transparent;
        font-size: 24px;
        line-height: 60px;
        /* font-family: Montserrat-Regular; */
        /* border: 1px solid #efefef; */
    }

    .quantity.buttons_added {
        text-align: center;
        position: relative;
        white-space: nowrap;
        vertical-align: top; 
        background-color: var(--bgcolor1);
    }

    .quantity.buttons_added input {
        display: inline-block;
        margin: 0;
        vertical-align: top;
        box-shadow: none;
        /* width: 10px; */
    }

    .quantity.buttons_added .minus,
    .quantity.buttons_added .plus {
        /* padding: 7px 10px 8px;
        height: 41px; */
        background-color: var(--popularproduct);
        /* border: 1px solid #efefef; */
        cursor:pointer;
        width: 30px;
        font-size: 30px;
    }

    .quantity.buttons_added .minus {
        border-right: 0;
    }

    .quantity.buttons_added .plus {
       border-left: 0; 
    }

    .quantity.buttons_added .minus:hover,
    .quantity.buttons_added .plus:hover {
        background: #eeeeee; 
    }

    .quantity input::-webkit-outer-spin-button,
    .quantity input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        margin: 0; 
    }
    
    .quantity.buttons_added .minus:focus,
    .quantity.buttons_added .plus:focus {
        outline: none; 
    }
    .btn-buy-now{
        background-color:var(--buttonbuynow) ;
    }
    .detail-product-navigation{
        margin-top: 150px;
    }
    .btn-buy-now{
        /* width: 100%; */
        padding: 18px 170px;
        font-family: PlusJakarta-Bold;
        font-size: 16px;
        line-height: 20px;
        color:var(--buttontext);
        border-radius: 15px;
        margin-bottom: 15px;
    }
    .btn-add-cart{
        padding: 18px 10px;
        font-family: PlusJakarta-Bold;
        font-size: 16px;
        line-height: 20px;
        color:var(--buttontext2);
        border-radius: 15px;
        border: 1px solid #9A9A9A;
        /* width: 30%; */
        width: 210px;
        margin-right: 10px;
    }
    .btn-share{
        padding: 18px 10px;
        font-family: PlusJakarta-Bold;
        font-size: 16px;
        line-height: 20px;
        color:var(--buttontext2);
        border-radius: 15px;
        border: 1px solid #9A9A9A;
        /* width: 30%; */
        width: 210px;
    }
    .product-desc{
        margin-top: 60px;
    }
    .product-desc-text{
        margin-bottom: 50px;
    }
    .product-desc-text p{
        font-family: Montserrat-Regular;
        font-size: 18px;
        line-height: 28px;
        text-align: center;
        color: var(--textColor2);
    }
    .product-desc-row1 p{
        font-family: Montserrat-Regular;
        font-size: 18px;
        line-height: 28px;
        text-align: left;
        color: var(--textColor2);
    }
    .product-desc-row1-text{
        display: flex;
        width: 50%;
        height: 200px;
        margin: auto;
        border-radius: 10px;
        /* border: 3px dashed #1c87c9; */
        align-items:center;
        justify-content:center;
    }
    .checked {
        color: orange;
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
        color: var(--textColor5);
    }
    .card{
        border-radius: 5%;
        margin: 0 20px;
    }
    .prev-arrow-1{
        left: -50px;
        color: #FFFFFF;
        top: calc(50% - 230px);
        cursor: pointer;
    }
    .next-arrow-1{
        right: -50px;
        color: #FFFFFF;
        top: calc(50% - 230px);
        cursor: pointer;
    }
    .detail-product-wrapper{
        background-color: var(--bgcolor2);
        padding-top: 50px;
        padding-bottom: 50px;
    }
    .popular-product{
        background-color: var(--bgcolor3);
        padding-top: 40px;
        padding-bottom: 80px;
    }
    .popular-product-wrapper h1{
        color: var(--textColor2);
        font-family: PlusJakarta-Bold;
        font-size: 40px;
        line-height: 54px;
        text-align: center;
        margin-bottom: 20px;
    }
    .product-not-avaliable{
        background-color: #FFDD7F;
        border-radius: 8px;
        padding: 10px 20px;
    }
    .product-not-avaliable h3{
        font-size: 18px;
        font-family: Montserrat-Bold;
       
    }
    .product-not-avaliable h4{
        font-size: 14px;
        font-family: Montserrat-Medium;
        color: green;       
    }
    .product-not-avaliable a{
        text-decoration: none;
        color: green;
    }
</style>

<section id="detail-product">
    <div class="detail-product-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-12">
                    <div id="page">
                        <div class="row">
                            <div class="column small-11 small-centered">
                                <div class="slider slider-single">
                                    <?php $images = $product->images()->get(); ?>
                                    @foreach($images as $image) 
                                        <div><img src="{{asset('images/stored/'. $image->filepath)}}" alt="" class="homepage-slick"></div>
                                    @endforeach
                                </div>
                                <div class="slider slider-nav">
                                    @foreach($images as $image) 
                                        <div><img src="{{asset('images/stored/'. $image->filepath)}}" alt="" class="homepage-slick"></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-12">
                    @if($product->is_active == '0')
                    <div class="product-not-avaliable">
                        <div>
                            <h3>Produk Tidak Tersedia</h3>
                            <a href="{{ route('store.product.list',$store->slug) }}">
                                <h4>Lihat Produk Lainnya</h4>
                            </a>
                        </div>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('cart.buynow') }}">
                        @csrf
                        <div class="detail-product">
                            <div class="detail-product-name">
                                <h2>{{ $product->name }}</h2>
                                {{-- <div class="product-rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="rating-text">(127)</span>
                                </div> --}}
                            </div>
                            <h3 id="product-price">Rp {{number_format($product->price,0,',','.')}}</h3>
                            <p>{{ $product->description }}</p>
                            <div class="detail-product">
                                <input type="hidden" name="store_id" value="{{ $store->id }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <label for="form-select">Jumlah</label>
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus" {{ $product->stock == 0 ? "disabled='disabled'" : '' }}>
                                    <input type="number" step="1" min="1" max="{{ $product->stock }}" name="product_quantity" {{ $product->stock == 0 ? "disabled='disabled'" : '' }} value="{{ $product->stock == 0 ? '0' : '1' }}" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                                    <input type="button" value="+" class="plus" {{ $product->stock == 0 ? "disabled='disabled'" : '' }}>
                                </div>
                            </div>
                            <div class="detail-product-navigation">
                                <button type="submit" class="btn btn-buy-now" {{ $product->stock == 0 ? 'disabled="disabled"' : '' }}>Beli Sekarang</button>
                                <button type="button" class="btn btn-add-cart">Masukkan Keranjang</button>
                                <button type="button" class="btn btn-share">Bagikan Produk</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="product-desc">
                <div class="product-desc-text" >
                    <p>{!! nl2br(e($product->about)) !!}</p>
                </div>
                <div class="row product-desc-row1">
                    <div class="col-xl-6 col-12 product-desc-row1-text">
                        <h2>{{ $product->name }}</h2>
                    </div>
                    <div class="col-xl-6 col-12">
                        <img src="{{asset('images/stored/'. $product->images()->first()->filepath)}}" alt="" class="desc-image">
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
                                        <h6>Rp {{number_format($popular_product->orderBy('price','ASC')->first()->price,0,',','.')}}</h6>
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
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@include('store.layouts.js')
<!-- Add Js Here -->
<script> 

function openModal(){
    $('#exampleModalCenter').modal('toggle');
}
function closeModal(){
    $('#exampleModalCenter').modal('hide');
}
    
$(document).ready(function(){
    

    // $('#exampleModalCenter').modal('toggle');
   
    
    $('.slider-single').slick({
 	slidesToShow: 1,
 	slidesToScroll: 1,
 	arrows: false,
 	fade: false,
 	adaptiveHeight: true,
 	infinite: false,
	useTransform: true,
 	speed: 400,
 	cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
 });

 $('.slider-nav')
 	.on('init', function(event, slick) {
 		$('.slider-nav .slick-slide.slick-current').addClass('is-active');
 	})
 	.slick({
 		slidesToShow: 3,
 		slidesToScroll: 3,
 		dots: false,
        arrows:false,
 		focusOnSelect: false,
 		infinite: false,
 		responsive: [{
 			breakpoint: 1024,
 			settings: {
 				slidesToShow: 5,
 				slidesToScroll: 5,
 			}
 		}, {
 			breakpoint: 640,
 			settings: {
 				slidesToShow: 4,
 				slidesToScroll: 4,
			}
 		}, {
 			breakpoint: 420,
 			settings: {
 				slidesToShow: 3,
 				slidesToScroll: 3,
		}
 		}]
 	});

 $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
 	$('.slider-nav').slick('slickGoTo', currentSlide);
 	var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
 	$('.slider-nav .slick-slide.is-active').removeClass('is-active');
 	$(currrentNavSlideElem).addClass('is-active');
 });

 $('.slider-nav').on('click', '.slick-slide', function(event) {
 	event.preventDefault();
 	var goToSingleSlide = $(this).data('slick-index');

 	$('.slider-single').slick('slickGoTo', goToSingleSlide);
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
});

function wcqib_refresh_quantity_increments() {
    jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
        var c = jQuery(b);
        c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
    })
}
String.prototype.getDecimals || (String.prototype.getDecimals = function() {
    var a = this,
        b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
    return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
}), jQuery(document).ready(function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("updated_wc_div", function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("click", ".plus, .minus", function() {
    var a = jQuery(this).closest(".quantity").find(".qty"),
        b = parseFloat(a.val()),
        c = parseFloat(a.attr("max")),
        d = parseFloat(a.attr("min")),
        e = a.attr("step");
    b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
});
</script>

<!-- End JS -->
@include('store.layouts.footer')
@include('store.layouts.footer-copyright')
</body>
</html>

