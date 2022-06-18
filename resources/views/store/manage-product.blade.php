@include('store.layouts.header')

<div id="wrapper">
        @include('store.layouts.sidebar')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('store.layouts.navbar')
                <div class="display-desktop">
                    <div class="container-fluid product-list-header">
                        <div class="container list-product-wrapper">
                            <div class="d-flex">
                                <div class="mr-auto p-2">
                                    <h1 class="h1-dashboard h1-product-list">Daftar Produk</h1>
                                </div>
                                <div class="mr-auto p-2 product-menu">
                                    <ul style="padding-left:0">
                                        <li><a href="{{ route('store.product.manage') }}" class="active-list">Semua Produk</a></li>
                                        <li><a href="" >Aktif</a></li>
                                        <li><a href="">Nonaktif</a></li>
                                    </ul>
                                </div>
                                <div class="p-2">
                                <form class="me-auto navbar-search w-100">
                                    <div class="input-group">
                                        <input class="form-control border-0 small search-box" type="text" placeholder="">
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
                                    <th scope="col">Statistik</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    @foreach($products as $product)
                                        <tr style="position:relative" >
                                            {{-- <th scope="row" style="padding-left:40px;border:none"> 
                                                <input class="table-checkbox" type="checkbox" aria-label="Checkbox for following text input">
                                            </th> --}}
                                            <td style="padding-left:40px;">
                                                <a href="{{ route('store.product.show',[$store->slug,$product->slug]) }}">
                                                    <div class="row">
                                                        <div class="col-3 product-list-img-container">
                                                            <img class="product-list-img" src="{{asset('images/homepage/profile1.jpg')}}" alt="Card image cap">
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
                                                    <li><i class="fa-solid fa-cart-shopping"></i></i>100</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <div class="product-price pt-4">
                                                    Rp {{number_format($product->first()->price,0,',','.')}}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product-stock pt-4" >
                                                    {{ $product->stock }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch product-switch pt-4">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product-action pt-4">
                                                    <div class="product-action-icon">
                                                        <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
                                                    </div>
                                                    <div class="product-action-icon">
                                                        <a href=""><i class="fa-solid fa-trash-can"></i></a>
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
                                    <img class="product-list-img" src="{{asset('images/homepage/profile1.jpg')}}" alt="Card image cap">
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
</script>

<!-- END JS -->
    
@include('store.layouts.footer-copyright')
</body>
</html>


