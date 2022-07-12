<?php $data=[
    'title' => 'Atur Produk',
    'description' => 'Pengaturan Produk Penjual @Dodolanku.id',
    'keywords' => 'cart, online shop, business, haul',
    'author' => 'Dodolanku.id',
]; ?>

@include('store.layouts.header')
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
        @include('store.layouts.sidebar')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('store.layouts.navbar')
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
                                    <h1 class="h1-dashboard h1-product-list">Daftar Produk</h1>
                                </div>
                                <div class="mr-auto p-2 product-menu">
                                    <ul style="padding-left:0">
                                        <li><a href="{{ route('store.product.manage') }}" class="{{ request()->status ? '' : 'active-list' }}">Semua Produk</a></li>
                                        <li><a href="{{ route('store.product.manage') }}?status=aktif" class="{{ request()->status == 'aktif' ? 'active-list' : ''}}">Aktif</a></li>
                                        <li><a href="{{ route('store.product.manage') }}?status=habis" class="{{ request()->status == 'habis' ? 'active-list' : ''}}">Habis</a></li>
                                    </ul>
                                </div>
                                <div class="p-2">
                                <form class="me-auto navbar-search w-100" method="GET">
                                    <div class="input-group">
                                        <input type="hidden" value="{{ request()->status }}" name='status'>
                                        <input name="search" class="form-control border-0 small search-box" type="text" placeholder="Masukkan nama produk">
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
                                    {{-- <th scope="col" style="padding-left:40px">
                                        <input class="table-checkbox"  type="checkbox" aria-label="Checkbox for following text input">
                                    </th> --}}
                                    <th scope="col" style="padding-left:40px">Nama Produk</th>
                                    <th scope="col">Penjualan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    @if(count($products) == 0)
                                    <tr style="position:relative">
                                        <td colspan="6">
                                            <div style="display: flex;justify-content:center;">
                                                <a href="{{ route('store.product.add') }}"><i class="fa-solid fa-plus"></i> Tambahkan Produk Baru</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @foreach($products as $product)
                                        <tr style="position:relative" >
                                            {{-- <th scope="row" style="padding-left:40px;border:none"> 
                                                <input class="table-checkbox" type="checkbox" aria-label="Checkbox for following text input">
                                            </th> --}}
                                            <td style="padding-left:40px;">
                                                <a href="{{ route('store.product.show',[$store->slug,$product->slug]) }}">
                                                    <div class="row">
                                                        <div class="col-3 product-list-img-container">
                                                            <img class="product-list-img" src="{{ $product->images()->first() ? asset('images/stored/'. $product->images()->first()->filepath) :  asset('images/homepage/default-product-image.png') }}" alt="Card image cap">
                                                        </div>
                                                        <div class="col-9 product-list-text pt-4">
                                                            <h2>{{ $product->name }}</h2>
                                                            <p>{{ $product->description }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <ul class="product-statistics pt-4">
                                                    {{-- <li><i class="fa-solid fa-eye"></i>999</li> --}}
                                                    <?php $sold_count = 0;
                                                        if($product->carts()->first()){
                                                            $cart_products = $product->carts()->join('cart_status','cart_status.cart_id','carts.id')->where('status_id','<>','1')->where('status_id','<>','3')->whereNull('cart_status.deleted_at')->get();
                                                            foreach($cart_products as $cart_product){
                                                                $sold_count = $sold_count + $cart_product->pivot->count;
                                                            }
                                                        }
                                                        ?>
                                                    <li><i class="fa-solid fa-bag-shopping"></i>{{ $sold_count }}</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <div class="product-price pt-4">
                                                    Rp {{number_format($product->price,0,',','.')}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product-stock pt-4" >
                                                    {{ $product->stock }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product-stock pt-4">
                                                    {{ $product->is_active == 1 ? 'Aktif' : 'Habis'}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product-action pt-4">
                                                    <div class="product-action-icon">
                                                        <a href="{{ route('store.product.edit',$product->slug) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    </div>
                                                    <div class="product-action-icon">
                                                        <a href="#" data-slug="{{ $product->slug }}" class="delete-product-btn"><i class="fa-solid fa-trash-can"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
                                    {{-- <img class="product-list-img" src="{{ $product->images()->first() ? asset('images/stored/'. $product->images()->first()->filepath) :  asset('images/homepage/default-product-image.png') }}" alt="Card image cap"> --}}
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
                {!! $products->links() !!}
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
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Hapus Produk</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin menghapus barang ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                <a id="hyperlink_delete" href="#">
                    <button type="button" class="btn btn-danger">Hapus Produk</button>
                </a>
            </div>
        </div>
    </div>
</div>
@include('store.layouts.js')
<!-- JS Here -->
<script>
    $(document).ready(function(){
        $('.delete-product-btn').on('click',function(){
            let slug = $(this).attr('data-slug');
            $('#hyperlink_delete').attr('href','/store/delete-product/'+ slug);
            openDeleteModal();
        });
        $('.close-modal').on('click',function(){
            closeDeleteModal();
        });
        function openDeleteModal(){
            $('#deleteModal').modal('toggle');
        }
        function closeDeleteModal(){
            $('#deleteModal').modal('hide');
        }
    });
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
</script>

<!-- END JS -->
    
@include('store.layouts.footer-copyright')
</body>
</html>


