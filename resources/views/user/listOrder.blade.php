@include('user.layouts.header')

@include('layouts.navbar-home')
<style>
    .user-order-wrapper{
        /* background-color: lightgray; */
        border-radius: 8px;
        padding: 10px 20px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
    .user-order-detail{
        border-bottom: 4px solid #FFFFFF;
        padding: 10px 20px;
    }
    .order-detail-wrapper-product{
        padding: 10px 20px;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    }
    .order-detail-wrapper-product img{
        width: 150px;
        height: 150px;
    }
    .order-detail-wrapper h5{
        font-family: Montserrat-Medium;
        font-size: 16px;
        line-height: 22px;
    }
    .order-detail-h6{
        font-family: Montserrat-Bold;
        font-size: 18px;
        line-height: 28px;
    }
    .order-detail-h4{
        font-family: Montserrat-Bold;
        font-size: 18px;
        line-height: 28px;
    }
    .order-shop-name{
        border-bottom: 3px solid rgba(0, 0, 0, 0.08);
    }
    .order-detail-wrapper-product p{
        font-family: Montserrat-Regular;
        font-size: 14px;
        line-height: 22px;
    }
    .btn-lacak{
        position: absolute;
        bottom:0;
        right: 0;
    }
    .btn-lacak button{
        font-family: Montserrat-Bold;
        font-size: 12px;
    }
    @media screen and (max-width:599px){
        #personal-information{
            padding: 10px 10px 30px 10px
        }
        .user-order-wrapper{
            padding: 5px;
        }
        .user-order-detail{
            padding: 5px 10px;
        }
        .order-detail-h4{
            font-size: 14px;
            line-height: 18px;
            margin-bottom: 5px;
        }
        .order-detail-wrapper h5{
            font-size: 12px;
            line-height: 16px;
        }
        .order-detail-h6 {
            font-size: 16px;
        }
        .order-detail-wrapper-product img{
            height: 80px;
            width: 80px;
        }
        .personal-info-h1{
            font-size: 24px;
            line-height: 32px;
        }
    }
</style>
<section id="personal-information">
    <div class="container">
        <div class="container">
            <div class="row">
                @include('user.layouts.sidebarmenu')
                <div class="col-lg-9 col-12">
                    <h1 class="personal-info-h1">List Order</h1>
                        @foreach($carts as $cart)
                            <div class="user-order-wrapper">
                                <div class="container user-order-detail">
                                    <div class="row">
                                        <div class="col-xl-3 col-6">
                                            <div class="order-detail-wrapper">
                                                <h4 class="order-detail-h4">Nomor Pesanan</h4>
                                                <h5>{{ $cart->orders()->first()->reference_no }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-6">
                                            <div class="order-detail-wrapper">
                                                <h4 class="order-detail-h4">Tanggal Transaksi</h4>
                                                <h5>{{ $cart->orders()->first()->created_at }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-6">
                                            <div class="order-detail-wrapper">
                                                <h4 class="order-detail-h4">Total Pembayaran</h4>
                                                <h5>Rp {{number_format( $cart->orders()->first()->total_amount + $cart->orders()->first()->shipping_fee,0,',','.')}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-6">
                                            <div class="order-detail-wrapper">
                                                <h4 class="order-detail-h4">Status</h4>
                                                <h5>{{ $cart->status()->first()->name }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container order-detail-wrapper-product">
                                    <h6 class="order-detail-h6">Nama Toko Disini</h6>
                                    <div class="row">
                                        <?php $products = $cart->products()->get(); ?>
                                        @foreach($products as $product)
                                        <div class="col-xl-8 col-9">
                                            <div class="row">
                                                <div class="col-xl-6 col-12">
                                                    <img src="{{asset('images/homepage/laptop-1.png')}}" alt="">
                                                </div>
                                                <div class="col-xl-6 col-12">
                                                    <h6 clas="order-detail-h6" >{{ $product->name }}</h6>
                                                    <p>Jumlah : <span>{{ $product->pivot->count }}</span></p>
                                                    <p><span style="color:#EE6530">Rp {{number_format( $product->price,0,',','.')}}</span>/unit</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="col-xl-4 col-3" style="position:relative">
                                            <div class="btn-lacak">
                                                <a href="{{ route('user.order.detail',$cart->orders()->first()->reference_no) }}">
                                                    <button class="btn btn-primary">Lihat Pesanan</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


@include('layouts.js')
<!-- Add JS Here -->
<script>
    $(function(){
    var current = location.pathname;
    $('#nav li a').each(function(){
        var $this = $(this);
        console.log($this);
        // if the current path is like this link, make it active
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active');
        }
    })
})
</script>
<!-- End JS -->
@include('layouts.footer')