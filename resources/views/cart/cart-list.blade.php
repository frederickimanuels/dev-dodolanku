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
            @if(count($carts) > 0)
                <?php $c = 0?>
                @foreach($carts as $cart)
                    @if($cart->products()->first())
                    @if($c == 0)
                        <h2>Kamu memiliki beberapa belanjaan di toko berikut</h2>
                        <?php $c = 1?>
                    @endif
                    <div class="row shop-list">
                        <div class="col-xl-8 col-12">
                            <h2>{{ $cart->stores()->first()->name }}</h2>
                            <h3>Kamu Memiliki <span>{{ $cart->products()->count() }}</span> Barang di keranjang toko ini</h3>
                        </div>
                        <div class="col-xl-4 col-12" style="position:relative">
                            <div class="btn-wrapper">
                                <a href="{{ route('cart.show',$cart->stores()->first()->slug) }}">
                                    <button type="button" class="btn btn-primary" >Lihat Keranjang</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                @if($c == 0)
                    <h2>Kamu belum memiliki keranjang belanjaan.</h2>
                    <?php $c = 1?>
                @endif
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