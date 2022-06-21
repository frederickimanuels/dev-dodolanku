<?php $data=[
    'title' => 'Daftar produk di '.$store->name,
    'description' => 'Daftar produk di '.$store->name .'@Dodolanku.id',
    'keywords' => 'cart, online shop, business, haul',
    'author' => 'Dodolanku.id',
]; ?>


@include('store.layouts.header')

@include('store.layouts.navbar-home')

<?php   
    $text_color = $store->templateconfigs()->where('type','store_text')->get();
    $bg_color = $store->templateconfigs()->where('type','store_bg')->get();
?>
@if(count($text_color)>0)
    <style>
        :root{
            --textColor1:{{ $text_color[0]->extra }};
            --textColor2:{{ $text_color[1]->extra }};
            --textColor3:{{ $text_color[2]->extra }};
            --textColor4:{{ $text_color[3]->extra }};
            --textColor5:{{ $text_color[2]->extra }};
        }
    </style>
@else
    <style>
        :root{
            --textColor1:#FFFFFF;
            --textColor2:#000000;
            --textColor3:#FC764E;
            --textColor4:#9A9A9A;
            --textColor5:#FC764E;
        }
    </style>
@endif
@if(count($bg_color)>0)
    <style>
        :root{
            --bgcolor:{{ $bg_color[0]->extra }};
            --bgcolor1:{{ $bg_color[1]->extra }};
            --bgcolor2:{{ $bg_color[2]->extra }};
            --bgcolor3:{{ $bg_color[3]->extra }};
            --bgcolorFooter:{{ $bg_color[0]->extra }};
            --bgcolorHeader:{{ $bg_color[0]->extra }};
        }
    </style>
@else
    <style>
        :root{
            --bgcolor:#AE8D84;
            --bgcolor1:#FFFFFF;
            --bgcolor2:#FFF8F6;
            --bgcolor3:#DFC3BB;
            --bgcolorFooter:#AE8D84;
            --bgcolorHeader:#AE8D84;
        }
    </style>
@endif
<style>
    :root{
        /* Popular Product Color */
        --popularProductName:#000000;
        --popularProductPrice:#FC764E;

        /* Button Color */
        --buttonbuynow:#FC764E;
        --buttontext:#FFFFFF;
        --buttontext2:#9A9A9A;
    }
</style>
<style>
        #homepage-footer .footer-clean{
            background-color:var(--bgcolorFooter);
        }
        .navbar-homepage{
            background-color:var(--bgcolorHeader) !important;
        }
        #aboutus-banner{
            background-color: var(--bgcolor2);
        }
        .search-filter{
            margin-left: auto;
            order: 2;
        }
        .search-filter-wrapper{
            margin-bottom: 30px;
            margin-top: 30px;
        }
        .search-filter select{
            border-radius: 15px;
            background-color: #FFFFFF;
            color: #9a9a9a;
            font-size: 14px;
            font-family: PlusJakarta-Regular;
            line-height: 24px;
            padding: 10px 30px 10px 10px;
        }
        .card{
            border-radius: 5%;
            /* margin: 0 20px; */
        }
        .card-img-top{
            border-top-left-radius: 5%;
            border-top-right-radius: 5%;
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
        .banner-text{
            position: relative;
        }
        .banner-text h1{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family: PlusJakarta-Bold;
            font-size: 48px;
            line-height: 54px;
            color: var(--textColor1);
            text-transform: uppercase;
        }
        .panel-color{
            background-color: #FFFFFF;
            padding: 0px;
        }
        .panel-heading{
            background-color: var(--bgcolor);
            padding: 20px;
        }
        .panel-body{
            background-color: var(--bgcolor3);
            padding: 20px;
        }
        .prod-cat input[type="checkbox"]{
            /* width: 20%; */
            width: 20px;
            height: 20px;
            text-align: left;
        }
        .prod-cat label{
            /* width: 20%; */
            text-align: left;
            font-family: Montserrat-Regular;
            font-size: 14px;
            line-height: 23px;
            color: var(--textColor2);
            vertical-align: baseline;
            margin-left: 10px;
        }
        .category-filter{
            display: flex;
        }
        .prod-price li{
            margin:10px 0;
        }
        .prod-price input[type="number"]{
            background-color: var(--bgcolor1);
            border-radius: 5px;
            font-family: Montserrat-Regular;
            font-size: 14px;
            line-height: 23px;
            color: var(--textColor2);
        }
        .pagination{
            justify-content: end;
        }
        .page-item.active .page-link{
            background-color: var(--bgcolor3);
            color: var(--textColor2);
        }
        .btn-terapkan{
            background-color: var(--bgcolor);
            width: 100%;
            height: 40px;
        }

        .btn-reset{
            margin-top: 0.75rem;
            background-color: var(--bgcolor2);
            color: var(--textColor2);
            width: 100%;
            height: 40px;
        }
       
</style>
<section id="aboutus-banner">
    <div class="container banner-text">
        <img src="{{ asset('images/template/'. $store->hasTemplate()->code.'/search_banner.png') }}" alt=".." class="aboutus-img">
        <h1>Produk</h1>
    </div>
    <div class="container bootdey">
        <form method="GET" id="search-form">
        <div class="row search-filter-wrapper">
            <input name="keywords" type="hidden" id="keywords-hidden" value="{{ request()->keywords }}">
            <div class="col-3 search-filter">
                <select class="form-select"  type="text" name="order" onchange="submitAfterSelect(this)">
                    <option value="">Terbaru</option>
                    <option value="lowtohigh" @if(request()->order == 'lowtohigh') selected @endif>Harga: Terendah Ke Tertinggi</option>
                    <option value="hightolow" @if(request()->order == 'hightolow') selected @endif>Harga: Tertinggi Ke Terendah</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                    <!-- <section class="panel">
                        <div class="panel-body">
                            <input type="text" placeholder="Keyword Search" class="form-control" />
                        </div>
                    </section> -->
                    <section class="panel panel-color">
                        <header class="panel-heading">
                            <h1 style="color: var(--textColor1);">Kategori</h1>
                        </header>
                        <div class="panel-body">
                            <ul class="prod-cat">
                                <li>
                                    @foreach($categories as $cat)
                                    <div class="category-filter">
                                        <input type="checkbox" aria-label="Checkbox for following text input" name="cat[]" value="{{ $cat->id }}" @if(request()->cat) @foreach(request()->cat as $c) {{ $c == $cat->id ? 'checked' : ''}} @endforeach @endif>
                                        <label for="checkbox">{{ $cat->name }}</label>
                                    </div>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="break-line"></div> -->
                        {{-- <header class="panel-heading panel-filter">
                            <h1>Material</h1>
                        </header>
                        <div class="panel-body ">
                            <ul class="prod-cat">
                                <li>
                                    <div class="category-filter">
                                        <input type="checkbox" aria-label="Checkbox for following text input">
                                        <label for="checkbox">Test</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="category-filter">
                                        <input type="checkbox" aria-label="Checkbox for following text input">
                                        <label for="checkbox">Test</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="category-filter">
                                        <input type="checkbox" aria-label="Checkbox for following text input">
                                        <label for="checkbox">Test</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="category-filter">
                                        <input type="checkbox" aria-label="Checkbox for following text input">
                                        <label for="checkbox">Test</label>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                        <header class="panel-heading panel-filter">
                            <h1 style="color: var(--textColor1);">Harga</h1>
                        </header>
                        <div class="panel-body ">
                            <ul class="prod-cat prod-price">
                                <li>
                                    <input type="text" value="{{ request()->harga_min }}" name="harga_min" class="form-control input-number" placeholder="Harga Minimum" aria-label="Username" aria-describedby="basic-addon1">
                                </li>
                                <li>
                                    <input type="text" value="{{ request()->harga_max }}" name="harga_max"  class="form-control input-number" placeholder="Harga Maksimum" aria-label="Username" aria-describedby="basic-addon1">
                                </li>
                                
                                <li>
                                    <div class="category-filter">
                                        <input name="price_range" type="radio" aria-label="radio for following text input" value="below-300">
                                        <label for="radio">&#10094; Rp 300.000</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="category-filter">
                                        <input name="price_range" type="radio" aria-label="radio for following text input" value="between-300-1000">
                                        <label for="radio">Rp 300.000 - Rp 1.000.000</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="category-filter">
                                        <input name="price_range" type="radio" aria-label="radio for following text input" value="above-1000">
                                        <label for="radio">&#10095; Rp 1.000.000</label>
                                    </div>
                                </li>
                                
                            </ul>
                            <button type="submit" class="btn-terapkan">Terapkan</button>
                            <button type="reset" class="btn-reset">Reset</button>
                        </div>
                    </section>
                
            </div>
            <div class="col-md-9">
                <div class="row product-list">
                    @foreach($products as $product)
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('store.product.show',[$store->slug,$product->slug]) }}" class="card" style="text-decoration: none;color:inherit;">
                                <img class="card-img-top" src="{{$product->images()->first() ? asset('images/stored/'. $product->images()->first()->filepath) : asset('images/homepage/default-product-image.png')}}" alt="Card image cap">
                                <div class="card-body popular-card-text">
                                    <h5 class="card-text"><strong>{{ $product->name }}</strong></h5>
                                    <h6>Rp {{number_format($product->price,0,',','.')}}</h6>
                                    {{-- <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="rating-text">(127)</span> --}}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            
                
        </div>
        <div class="row mt-3">
        {!! $products->links() !!}

        </div>
    </form>
    </div>
</section>

@include('store.layouts.js')
<!-- JS -->
<script >
    function submitAfterSelect(selectedForm) {
        selectedForm.form.submit();
    }
    $('.btn-reset').on('click',function(){
        $('#search-form')[0].reset();
        // $('.input-number').val(null);
    });
</script>
<!-- END JS -->
@include('store.layouts.footer')
@include('store.layouts.footer-copyright')
</body>
</html>
