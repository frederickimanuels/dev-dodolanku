<?php $data=[
    'title' => 'Daftar Pesanan',
    'description' => 'Daftar pesanan toko @Dodolanku.id',
    'keywords' => 'cart, online shop, business, haul',
    'author' => 'Dodolanku.id',
]; ?>

@include('store.layouts.header')

<div id="wrapper">
        @include('store.layouts.sidebar')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('store.layouts.navbar')
                <div class="display-desktop">
                    <div class="container-fluid product-list-header">
                        <div class="container list-product-wrapper product-order-wrapper">
                            <div class="d-flex">
                                <div class="mr-auto p-2">
                                    <h1 class="h1-dashboard h1-product-list">Daftar Pesanan</h1>
                                </div>
                                
                                <div class="p-2">
                                <form class="me-auto navbar-search w-100">
                                    <div class="input-group">
                                        {{-- <input class="form-control border-0 small search-box" type="text" placeholder=""> --}}
                                        <!-- <div class="input-group-append"><button class="btn btn-primary py-0" type="button">Cari</button></div> -->
                                    </div>
                                </form>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="container product-order-wrapper" style="padding:0">
                            <table class="table product-table">
                                <thead class="table-head">
                                    <tr>
                                        <th scope="row" style="padding-left:40px">Pesanan</th>
                                        <th scope="row">Detail Pemesan</th>
                                        <th scope="row">Kurir</th>
                                        <th scope="row">No Resi</th>
                                        <th scope="row">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    @if(count($carts)>0)
                                    @foreach($carts as $cart)
                                        <tr>
                                            <td colspan="4" style="padding-left:40px">
                                                <span class="order-number">Order #{{ $cart->orders()->first()->reference_no }}</span>
                                            </td>
                                            <td colspan="1">
                                                <span class="order-date">{{ $cart->orders()->first()->created_at }}</span>
                                            </td>
                                        </tr>
                                            <tr style="position:relative" >
                                                <td style="padding-left:40px;padding-top:20px;">
                                                    <?php $products = $cart->products()->get(); ?>
                                                    @foreach($products as $product)
                                                        <div class="row">
                                                            <div class="col-4 product-list-img-container">
                                                                <img class="product-list-img" src="{{ $product->images()->first() ? asset('images/stored/'. $product->images()->first()->filepath) :  asset('images/homepage/default-product-image.png') }}" alt="Card image cap">
                                                            </div>
                                                            <div class="col-8 product-list-text product-order-text pt-1">
                                                                <h2>{{ $product->name }}</h2>
                                                                <p>Jumlah : <span style="color:black;font-weight:bold" >{{ $product->pivot->count }}</span> Pcs</p>
                                                                <p>Rp {{number_format( $product->price,0,',','.')}}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div class="product-order-detail pt-4">
                                                        <h3>{{ $cart->users()->first()->name }}</h3>
                                                        <?php $address = $cart->address()->withTrashed()->first();
                                                                $address->province = App\Province::where('id',$address->province_id)->first()->name;
                                                                $address->city =  App\City::where('id',$address->city_id)->first()->name; ?>
                                                        <p>{{ $address->description . ', ' . $address->city . ', ' . $address->province }}</p>
                                                    <div>
                                                </td>
                                                <td>
                                                    <div class="product-delivery pt-4">
                                                        {{ $cart->orders()->first()->courier }}
                                                    </div>
                                                </td>
                                                <td>
                                                    @if( $cart->status()->first()->id == 2 )
                                                    <div class="product-stock pt-4">
                                                        <form>
                                                            <div class="input-group">
                                                                <input id="resi-{{ $cart->id }}" class="form-control border-0 small product-resi" type="text" placeholder="Input no Resi">
                                                            </div>
                                                        </form>
                                                        <div id="resi-no-input-{{ $cart->id }}" hidden><span style="color:red">No resi harus diisi</span></div>
                                                    </div>
                                                    @else
                                                    <div class="product-order-detail pt-4">
                                                        <p>{{ $cart->orders()->first()->couriertracking }}</p>
                                                    <div>
                                                    @endif

                                                </td>
                                                <td>
                                                    <div class="pt-4">
                                                        <button data-id="{{ $cart->id }}" class="delivery-status" style="padding:5px 15px;" {{ $cart->status()->first()->id != 2 ? "disabled='disabled'" : ''}}>
                                                            {{ $cart->status()->first()->id == 2 ? 'Kirim Sekarang' : $cart->status->first()->name }}
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="display-mobile">
                    <div class="container-fluid">
                        <div class="container display-mobile-wrapper">
                            <form class="me-auto navbar-search w-100">
                                <div class="input-group search-box-mobile">
                                    <i class="fa-solid fa-magnifying-glass magnifying-glass"></i>
                                    <input class="form-control border-0 small search-box" type="text" placeholder="">
                                    <!-- <div class="input-group-append"><button class="btn btn-primary py-0" type="button">Cari</button></div> -->
                                </div>
                            </form>
                            <div class="row product-list-row">
                            <div class="break-line-1"></div>
                                <div class="row">
                                    <div class="container product-list-mobile ">
                                        <h6>Pesanan Dikirim</h6>
                                        <p>INV/2022/MPL/2321398131</p>
                                        <p>Benny Stefano</p>
                                    </div>
                                    <div class="break-line-1" style="margin:10px 10px;border-radius:10px"></div>

                                </div>
                                <div class="row">
                                    <div class="col-4" style="display:flex;align-items:center">
                                        <img class="product-list-img" src="{{ $product->images()->first() ? asset('images/stored/'. $product->images()->first()->filepath) :  asset('images/homepage/default-product-image.png') }}" alt="Card image cap">
                                    </div>
                                    <div class="col-8 product-list-mobile-text">
                                        <h1>Scarlett Whitening</h1>
                                        <p>Varian Biru Muda</p>
                                        <h2>Rp.42.000</h2>
                                    </div>
                                    <!-- <div class="col-2" style="display:flex;align-items:center">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </div> -->
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mobile-shipping-details" >
                                            <i class="fa-solid fa-truck"></i>
                                            <span>Sicepat - Regular Package</span>
                                        </div>
                                        <div class="mobile-shipping-details" >
                                            <i class="fa-solid fa-location-dot"></i>
                                            <span>DKI Jakarta</span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <a href="" class="mobile-track">
                                            <span>Lacak</span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

@include('store.layouts.js')
<script>
    $('#sidebarToggleTop').click(function() {
        $("#toggle-open").toggleClass("d-none");
        if(document.getElementById("toggle-exit").classList.contains("d-none")){
            $("#toggle-exit").removeClass("d-none");
        }else{
            $("#toggle-exit").addClass("d-none");
        }
        $("#sidebar-id").toggleClass("sidebar-menu");
        $("#sidebar-id").removeClass("toggled");
    });
    $(document).ready(function(){
        $('.delivery-status').on('click',function(){
            var cart_id = ($(this).attr('data-id'));
            var no_resi = $('#resi-'+cart_id).val();
            if(no_resi != ''){
                postTracking(cart_id,no_resi);
                $('#resi-no-input-'+cart_id).attr("hidden", true);
            }else{
                $('#resi-no-input-'+cart_id).attr("hidden", false);
            }
        });
        function postTracking(cart_id,resi){
            $.ajax({
                type: "POST",
                url: "{{ route('cart.update.couriertracking') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    cart_id: cart_id,
                    couriertracking: resi,
                },
                success: function(data){
                    window.location.reload();
                },
                error: function( error ){
                    // alert( error );
                }
            });
        }
    });

</script>    

@include('store.layouts.footer-copyright')
</body>
</html>



