<?php $data=[
    'title' => 'Admin Order List',
    'description' => 'Dodolanku Admin Tool',
    'keywords' => 'Dodolanku.id',
    'author' => 'Dodolanku.id',
]; ?>
@include('admin.layouts.header')
<style>
    a{
        color: #5b5b5b;
        text-decoration: none;
    }
    a:hover{
        color: #5b5b5b;
    }
    .h1-dashboard{
        font-size: 32px;
    }
    /* .pagination{
        justify-content: center;
    }
    .page-link{
        font-family: Montserrat-Medium;
        font-size: 16px;
        color: #000000;
    } */
</style>
<div id="wrapper">
        @include('admin.layouts.sidebar')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('admin.layouts.navbar')
                <div class="display-desktop">
                    <div class="container-fluid product-list-header">
                        <div class="container list-product-wrapper">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span>{{ session('status') }}</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="d-flex">
                                <div class="mr-auto p-2">
                                    <h1 class="h1-dashboard h1-product-list">Cari Order</h1>
                                </div>
                                {{-- <div class="mr-auto p-2 product-menu">
                                    <ul style="padding-left:0">
                                        <li><a href="{{ route('store.product.manage') }}" class="active-list">Semua Produk</a></li>
                                        <li><a href="" >Aktif</a></li>
                                        <li><a href="">Nonaktif</a></li>
                                    </ul>
                                </div> --}}
                                <div class="p-2">
                                <form class="me-auto navbar-search w-100" method="GET">
                                    <div class="input-group">
                                        <input name="reference_no" class="form-control border-0 small search-box" type="text" placeholder="Masukkan Reference No">
                                        <!-- <div class="input-group-append"><button class="btn btn-primary py-0" type="button">Cari</button></div> -->
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="container" style="padding:0">
                            <table class="table product-table">
                                <thead class="table-head" >
                                    <tr>
                                        <th scope="row" style="padding-left:40px">Pesanan</th>
                                        <th scope="row">Detail Pemesan</th>
                                        <th scope="row">Toko</th>
                                        <th scope="row">Kurir</th>
                                        <th scope="row">No Resi</th>
                                        <th scope="row">Status</th>
                                        <th scope="row">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    @if(count($orders) == 0)
                                    <tr style="position:relative">
                                        <td colspan="7">
                                            <div style="display: flex;justify-content:center;">
                                                <span><i class="fa-solid fa-search"></i> Harap masukkan Order Reference No pada kolom search</span>
                                            </div>
                                        </td>
                                    </tr>
                                    @else
                                    @foreach($orders as $order)
                                        <?php $cart = $order->carts()->first() ?>
                                        <?php $store = $cart->stores()->first() ?>
                                        <tr>
                                            <td colspan="6" style="padding-left:40px">
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
                                                <a href="{{ route('store.show',$store->slug) }}">
                                                    <div class="row">
                                                        <div class="col-12 product-list-text pt-4">
                                                            <h2>{{ $store->name }}</h2>
                                                            <p>{{ App\City::where('id',$store->address()->first()->city_id)->first()->name .' - '. App\Province::where('id',$store->address()->first()->province_id)->first()->name}}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="product-delivery pt-4">
                                                    {{ $cart->orders()->first()->courier }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="pt-4">
                                                    {{ $order->couriertracking ?  $order->couriertracking : '-'}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="pt-4">
                                                    {{ $cart->status()->first()->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product-action pt-4">
                                                    @if($cart->status()->first()->id == 2)
                                                        <a order-id="{{ $order->id }}" class="btn btn-danger cancel-order-button">Cancel Order</a>
                                                    @endif
                                                    {{-- <div class="product-action-icon">
                                                        <a href="{{ route('admin.store.edit',$store->slug) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    </div>
                                                    <div class="product-action-icon">
                                                        <a href="{{ route('admin.store.delete',$store->slug) }}"><i class="fa-solid fa-trash-can"></i>Ban</a>
                                                    </div> --}}
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
                                <div class="col-4" style="display:flex;align-items:center">
                                    <img class="product-list-img" src="{{ asset('images/homepage/default-product-image.png') }}" alt="Card image cap">
                                </div>
                                <div class="col-6 product-list-mobile-text">
                                    <h1>Scarlett Whitening</h1>
                                    <h2>Rp.42.000</h2>
                                    <p>Stock <span>99</span></p>
                                    <p>Stock <span>Aktif</span></p>
                                </div>
                                <div class="col-2" style="display:flex;align-items:center">
                                    <i class="fa-solid fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- {!! $products->links() !!} --}}

            </div>
            <!-- <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
                </div>
            </footer> -->
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    
<style>
    .modal button.close{
        background:none;
        color: grey;
    }
</style>

<div class="modal fade" id="cancelordermodal" tabindex="-1" role="dialog" aria-labelledby="banModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="banModalTitle">Konfirmasi Cancel Order</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-text">
                Yakin ingin cancel order ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                <a id="hyperlink-ban" href="#">
                    <button type="button" class="btn btn-danger" id="button-cancel">Cancel Order</button>
                </a>
            </div>
        </div>
    </div>
</div>
@include('store.layouts.js')
<!-- JS Here -->
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
        $('.cancel-order-button').on('click',function(){
            let order_id = $(this).attr('order-id');
            $('#hyperlink-ban').attr('href','/admin/order/cancel/'+ order_id);
            openBanModal();
        });
        $('.close-modal').on('click',function(){
            closeBanModal();
        });
        function openBanModal(){
            $('#cancelordermodal').modal('toggle');
        }
        function closeBanModal(){
            $('#cancelordermodal').modal('hide');
        }
    });
</script>

<!-- END JS -->
    
@include('store.layouts.footer-copyright')
</body>
</html>


