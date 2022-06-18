@include('layouts.header')

@include('layouts.navbar-home')
<style>
    .container{
        max-width: 70%;
    }
    .btn-wrapper{
        position: absolute;
        bottom: 0;
        right: 0;
    }
    h1{
        font-size: 22px;
        font-family: PlusJakarta-Bold;
    }
    h2{
        font-size: 16px;
        font-family: PlusJakarta-Medium;
    }
    @media screen and (max-width:599px)
    {
        .container{
            max-width: 100%;
        }
        .btn-wrapper{
            position: relative;
            float: right;
        }
    }
</style>
<section id="shop-cart-list" >
    <div class="container">
        @if(Auth::guest())
            <h1>Login Dulu Woi <a href="{{ route('login') }}"></a></h1>
        @endif

        @if(!Auth::guest())
            <h1>Hai, {{ Auth::user()->name }}</h1>
            @if(count($carts) > 1)
                <h2>Kamu memiliki beberapa belanjaan di toko berikut</h2>
                <div class="row shop-list">
                    <div class="col-xl-8 col-12">
                        <h2>Toko Billie Halim</h2>
                        <h3>Kamu Memiliki <span>4</span> Barang di keranjang toko ini</h3>
                    </div>
                    <div class="col-xl-4 col-12" style="position:relative">
                        <div class="btn-wrapper">
                            <button type="button" onclick="window.location.href='https://w3docs.com';" class="btn btn-primary">Lihat Keranjang</button>
                        </div>
                    </div>
                </div>
            @else
                <h2>Kamu belum memiliki keranjang belanja</h2>
            @endif
        @endif       
    </div>
</section>

@include('layouts.js')
<!-- Add JS Here -->

<!-- End JS -->
@include('layouts.footer')