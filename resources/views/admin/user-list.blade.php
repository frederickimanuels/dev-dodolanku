<?php $data=[
    'title' => 'Admin User List',
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
                                    <h1 class="h1-dashboard h1-product-list">List User</h1>
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
                                            <input name="user_search" class="form-control border-0 small search-box" type="text" placeholder="Masukkan nama / email">
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
                                    <th scope="col" style="padding-left:40px">Nama User</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Jumlah Order</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    @if(count($users) == 0)
                                    <tr style="position:relative">
                                        <td colspan="5">
                                            <div style="display: flex;justify-content:center;">
                                                <span><i class="fa-solid fa-search"></i> Harap masukkan Nama / Email user pada kolom search</span>
                                            </div>
                                        </td>
                                    </tr>
                                    @else
                                    @foreach($users as $user)
                                        <tr style="position:relative" >
                                            {{-- <th scope="row" style="padding-left:40px;border:none"> 
                                                <input class="table-checkbox" type="checkbox" aria-label="Checkbox for following text input">
                                            </th> --}}
                                            <td style="padding-left:40px;">
                                                <ul class="product-statistics pt-4">
                                                    {{ $user->name }}
                                                </ul>
                                            </td>
                                            <td>
                                                <ul class="product-statistics pt-4">
                                                    {{ $user->email }}
                                                </ul>
                                            </td>
                                            <td>
                                                <ul class="product-statistics pt-4">
                                                    <li><i class="fa-solid fa-cart-shopping"></i></i>{{ $user->hasCartOrders()->count() }}</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul class="product-statistics pt-4">
                                                    {{ $user->isBanned() ? 'Banned' : 'Active'}}
                                                </ul>
                                            </td>
                                            <td>
                                                <div class="product-action pt-4">
                                                    @if(!$user->isBanned())
                                                        <a banned="0" user-id="{{ $user->id }}" class="btn btn-danger ban-user-button">Ban User</a>
                                                    @else
                                                        <a banned="1" user-id="{{ $user->id }}" class="btn btn-success ban-user-button">Unban User</a>
                                                    @endif
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
                            {{-- <form class="me-auto navbar-search w-100" method="GET">
                                <div class="input-group search-box-mobile">
                                    <i class="fa-solid fa-magnifying-glass magnifying-glass"></i>
                                    <input name="user_search" class="form-control border-0 small search-box" type="text" placeholder="Masukkan nama / email">
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
                <h5 class="modal-title" id="banModalTitle">Konfirmasi Ban User</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-text">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                <a id="hyperlink-ban" href="#">
                    <button type="button" class="btn btn-success" id="button-unban">Unban User</button>
                    <button type="button" class="btn btn-danger" id="button-ban" hidden>Ban User</button>
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
        $('.ban-user-button').on('click',function(){
            let banned = $(this).attr('banned');
            let user_id = $(this).attr('user-id');
            if(banned == "1"){
                $('#hyperlink-ban').attr('href','/admin/user/unban/'+ user_id);
                document.getElementById('banModalTitle').innerHTML = "Konfirmasi unban user";
                document.getElementById('modal-text').innerHTML = "Apakah anda yakin unban user ini?";
                $('#button-unban').attr("hidden", false);
                $('#button-ban').attr("hidden", true);
            }else{
                $('#hyperlink-ban').attr('href','/admin/user/ban/'+ user_id);
                document.getElementById('banModalTitle').innerHTML = "Konfirmasi ban user"
                document.getElementById('modal-text').innerHTML = "Apakah anda yakin ban user ini?"
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


