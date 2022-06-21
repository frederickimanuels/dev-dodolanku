<?php $data=[
    'title' => 'Admin Tips List',
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
                                    <h1 class="h1-dashboard h1-product-list">Tips List</h1>
                                </div>
                                {{-- <div class="mr-auto p-2 product-menu">
                                    <ul style="padding-left:0">
                                        <li><a href="{{ route('store.product.manage') }}" class="active-list">Semua Produk</a></li>
                                        <li><a href="" >Aktif</a></li>
                                        <li><a href="">Nonaktif</a></li>
                                    </ul>
                                </div> --}}
                                
                                <a href="{{ route('admin.tips.create') }}" class="btn btn-success m-2" style="height: 2.5rem"><i class="fa-solid fa-plus"></i> Tambahkan Tips Baru</a>
                                <div class="p-2">
                                    <form class="me-auto navbar-search w-100" method="GET">
                                        <div class="input-group">
                                            <input name="search" class="form-control border-0 small search-box" type="text" placeholder="Masukkan Judul / Deskripsi">
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
                                        <th scope="row" style="padding-left:40px">Image</th>
                                        <th scope="row">Judul</th>
                                        <th scope="row">Description</th>
                                        <th scope="row">Status</th>
                                        <th scope="row">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    @if(count($tips) == 0)
                                    <tr style="position:relative">
                                        <td colspan="5">
                                            <div style="display: flex;justify-content:center;">
                                                <span><i class="fa-solid fa-search"></i> Tips tidak ditemukan </span>
                                            </div>
                                        </td>
                                    </tr>
                                    @else
                                    @foreach($tips as $tp)
                                        <tr style="position:relative" >
                                            <td style="padding-left:40px;padding-top:20px;">
                                                    <img style="max-width:300px" src="{{ $tp->images()->first() ? asset('images/stored/'. $tp->images()->first()->filepath) :  asset('images/homepage/default-product-image.png') }}" alt="Card image cap">
                                            </td>
                                            <td>
                                                <div class="pt-4">
                                                    {{ $tp->title }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="pt-4">
                                                    {{ $tp->description }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="pt-4">
                                                    {{ $tp->is_show ?  'Tampil' : '-'}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product-action pt-4">
                                                    <a href="{{ route('admin.tips.toggle',$tp->id) }}" class="mx-2 btn {{ $tp->is_show == 1 ? 'btn-warning' : ' btn-info' }}">{{ $tp->is_show == 1 ? 'Sembunyikan' : 'Tampilkan' }}</a>
                                                    <a href="{{ route('admin.tips.edit',$tp->id) }}" class="mx-2 btn btn-secondary">Edit</a>
                                                    <a tips-id="{{ $tp->id }}" class="mx-2 btn btn-danger cancel-order-button">Hapus</a>
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
                
                {!! $tips->links() !!}
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
                <h5 class="modal-title" id="banModalTitle">Konfirmasi Delete Tips</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-text">
                Yakin ingin hapus tips ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                <a id="hyperlink-ban" href="#">
                    <button type="button" class="btn btn-danger" id="button-cancel">Hapus Tips</button>
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
            let tips_id = $(this).attr('tips-id');
            $('#hyperlink-ban').attr('href','/admin/tips/delete/'+ tips_id);
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


