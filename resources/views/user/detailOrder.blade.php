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
        width: 100px;
        height: 100px;
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
    .detail-order-wrapper{
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        border-radius: 5px;
        padding: 10px;
    }
    h3{
        font-family: Montserrat-Bold;
        font-size: 18px;
    }
    .ml-auto{
        margin-left: auto;
    }
    .btn-100{
        width: 100%;
    }
    button{
        font-size: 12px;
        line-height: 20px;
        font-family: PlusJakarta-Bold;
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
                    <h1 class="personal-info-h1">Detail Order</h1>
                    <div class="user-order-wrapper">
                        <div class="container user-order-detail">
                            <div class="row">
                                <div class="col-xl-3 col-6">
                                    <div class="order-detail-wrapper">
                                        <h4 class="order-detail-h4">Invoice</h4>
                                        <h5>10281028102</h5>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-6">
                                    <div class="order-detail-wrapper">
                                        <h4 class="order-detail-h4">Tanggal Transaksi</h4>
                                        <h5>15 Jun 2022,15.00</h5>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-6">
                                    <div class="order-detail-wrapper">
                                        <h4 class="order-detail-h4">Total Pembayaran</h4>
                                        <h5>Rp.940.000</h5>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-6">
                                    <div class="order-detail-wrapper">
                                        <h4 class="order-detail-h4">Status</h4>
                                        <h5>Dalam Perjalanan</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container order-detail-wrapper-product">
                            <div class="row" >
                                <div class="col-6">
                                    <h6 class="order-detail-h6">Detail Pembelian</h6>
                                </div>
                                <div class="col-6 d-flex">
                                    <h6 class="order-detail-h6" style="margin-left:auto">Toko Sumber Tjuan</h6>
                                </div>
                            </div>
                        </div>
                        <div class="container order-detail-wrapper-product">
                            <div class="detail-order-wrapper mt-2 mb-2">
                                <div class="row">
                                    <div class="col-xl-8 col-9">
                                        <div class="row">
                                            <div class="col-xl-6 col-12">
                                                <img src="{{asset('images/homepage/laptop-1.png')}}" alt="">
                                            </div>
                                            <div class="col-xl-6 col-12">
                                                <h6 clas="order-detail-h6" >Ultra Voucher 100k</h6>
                                                <p>Jumlah : <span>999</span></p>
                                                <p><span style="color:#EE6530">Rp.5000 </span>/unit</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-3">
                                        <h6>Total Harga</h6>
                                        <h3 class="total-price">Rp.500.000</h3>
                                        <button class="btn btn-primary">Beli Lagi</button>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-order-wrapper mt-2 mb-2">
                                <div class="row">
                                    <div class="col-xl-8 col-9">
                                        <div class="row">
                                            <div class="col-xl-6 col-12">
                                                <img src="{{asset('images/homepage/laptop-1.png')}}" alt="">
                                            </div>
                                            <div class="col-xl-6 col-12">
                                                <h6 clas="order-detail-h6" >Ultra Voucher 100k</h6>
                                                <p>Jumlah : <span>999</span></p>
                                                <p><span style="color:#EE6530">Rp.5000 </span>/unit</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-3">
                                        <h6>Total Harga</h6>
                                        <h3 class="total-price">Rp.500.000</h3>
                                        <button class="btn btn-primary">Beli Lagi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container order-detail-wrapper-product">
                            <div class="row pt-2" >
                                <div class="col-6">
                                    <h6 class="order-detail-h6">Detail Pengiriman</h6>
                                </div>
                            </div>
                            <div class="row pt-2 pb-2">
                                <div class="col-2">Kurir</div>
                                <div class="col-1">:</div>
                                <div class="col-9">Sicepat-Regular Package</div>
                            </div>
                            <div class="row pt-2 pb-2">
                                <div class="col-2">No Resi</div>
                                <div class="col-1">:</div>
                                <div class="col-9">10298102172</div>
                            </div>
                            <div class="row pt-2 pb-2">
                                <div class="col-2">Alamat</div>
                                <div class="col-1">:</div>
                                <div class="col-9">
                                    <h3>Juan Fernando Wijaya</h3>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem eum esse voluptatum totam provident itaque, sit iure minima at tenetur quam cumque corporis nostrum delectus sint quibusdam quo odio cupiditate.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 ml-auto">
                                    <div class="row">
                                        <div class="col-4">
                                        <button class="btn btn-100 btn-light">Bantuan</button>
                                        </div>
                                        <div class="col-4">
                                        <button class="btn btn-100 btn-success">Beri Ulasan</button>
                                        </div>
                                        <div class="col-4">
                                        <button class="btn btn-100 btn-primary">Lacak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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