<?php $data=[
    'title' => 'Admin Store List',
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
                                    <h1 class="h1-dashboard h1-product-list">List Toko</h1>
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
                                        <input name="store_search" class="form-control border-0 small search-box" type="text" placeholder="Cari Toko">
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
                                    <th scope="col" style="padding-left:40px">Nama Toko</th>
                                    <th scope="col">Penjualan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    @foreach($stores as $store)
                                        <tr style="position:relative" >
                                            {{-- <th scope="row" style="padding-left:40px;border:none"> 
                                                <input class="table-checkbox" type="checkbox" aria-label="Checkbox for following text input">
                                            </th> --}}
                                            <td style="padding-left:40px;">
                                                <a href="{{ route('store.show',$store->slug) }}">
                                                    <div class="row">
                                                        <div class="col-3 product-list-img-container">
                                                            <img class="product-list-img" src="{{ $store->templateconfigs()->where('type','store_logo')->first() ?  asset('images/stored/'. $store->templateconfigs()->where('type','store_logo')->first()->images()->first()->filepath) : asset('images/homepage/dodolanku-logo.jpg')  }}" alt="Card image cap">
                                                        </div>
                                                        <div class="col-9 product-list-text pt-4">
                                                            <h2>{{ $store->name }}</h2>
                                                            <p>{{ App\City::where('id',$store->address()->first()->city_id)->first()->name .' - '. App\Province::where('id',$store->address()->first()->province_id)->first()->name}}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                <ul class="product-statistics pt-4">
                                                    {{-- <li><i class="fa-solid fa-eye"></i>999</li> --}}
                                                    <?php $checkout_count = 0;
                                                        if($store->carts()->first()){
                                                            $checkout_count = $store->carts()->join('cart_status','cart_status.cart_id','carts.id')->where('status_id','<>','1')->where('status_id','<>','3')->whereNull('cart_status.deleted_at')->count();
                                                        }
                                                        ?>
                                                    <li><i class="fa-solid fa-cart-shopping"></i></i>{{ $checkout_count }}</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul class="product-statistics pt-4">
                                                    {{ $store->isBanned() ? 'Diblokir' : 'Aktif'}}
                                                </ul>
                                            </td>
                                            <td>
                                                <div class="product-action pt-4">
                                                    @if(!$store->isBanned())
                                                        <a banned="0" store-id="{{ $store->id }}" class="btn btn-danger ban-store-button">Blokir Toko</a>
                                                    @else
                                                        <a banned="1" store-id="{{ $store->id }}" class="btn btn-success ban-store-button">Aktifkan Toko</a>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {!! $stores->links() !!}
                </div>
                <div class="display-mobile">
                    <div class="container-fluid">
                        <div class="container display-mobile-wrapper">
                            {{-- <form class="me-auto navbar-search w-100">
                                <div class="input-group search-box-mobile">
                                    <i class="fa-solid fa-magnifying-glass magnifying-glass"></i>
                                    <input class="form-control border-0 small search-box" type="text" placeholder="">
                                    <!-- <div class="input-group-append"><button class="btn btn-primary py-0" type="button">Cari</button></div> -->
                                </div>
                            </form> --}}
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

<div class="modal fade" id="banModal" tabindex="-1" role="dialog" aria-labelledby="banModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="banModalTitle">Konfirmasi Blokir Toko</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-text">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                <a id="hyperlink-ban" href="#">
                    <button type="button" class="btn btn-success" id="button-unban">Aktifkan Toko</button>
                    <button type="button" class="btn btn-danger" id="button-ban" hidden>Blokir Toko</button>
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
        $('.ban-store-button').on('click',function(){
            let banned = $(this).attr('banned');
            let store_id = $(this).attr('store-id');
            if(banned == "1"){
                $('#hyperlink-ban').attr('href','/admin/store/unban/'+ store_id);
                document.getElementById('banModalTitle').innerHTML = "Konfirmasi aktifkan toko";
                document.getElementById('modal-text').innerHTML = "Apakah anda yakin aktifkan toko ini?";
                $('#button-unban').attr("hidden", false);
                $('#button-ban').attr("hidden", true);
            }else{
                $('#hyperlink-ban').attr('href','/admin/store/ban/'+ store_id);
                document.getElementById('banModalTitle').innerHTML = "Konfirmasi blokir toko"
                document.getElementById('modal-text').innerHTML = "Apakah anda yakin blokir toko ini?"
                $('#button-unban').attr("hidden", true);
                $('#button-ban').attr("hidden", false);
            }
            openBanModal();
        });
        $('.close-modal').on('click',function(){
            closeBanModal();
        });
        function openBanModal(){
            $('#banModal').modal('toggle');
        }
        function closeBanModal(){
            $('#banModal').modal('hide');
        }
    });
</script>

<!-- END JS -->
    
@include('store.layouts.footer-copyright')
</body>
</html>


