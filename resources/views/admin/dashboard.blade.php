<?php $data=[
    'title' => 'Admin Dashboard',
    'description' => 'Dodolanku Admin Tool',
    'keywords' => 'Dodolanku.id',
    'author' => 'Dodolanku.id',
]; ?>
@include('admin.layouts.header')

<div id="wrapper">
        @include('admin.layouts.sidebar')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('admin.layouts.navbar')
                <div class="container-fluid">
                    <!-- <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
                    </div> -->
                    <div class="row">
                        <div class="col-md-6 col-xl-6 mb-6">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Jumlah Toko</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>{{ App\Store::count() }}</span></div>
                                        </div>
                                        <!-- <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6 mb-6">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Pesanan Berlangsung</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>{{ App\Cart::join('cart_status','cart_status.cart_id','carts.id')->where('status_id','<>','0')->where('status_id','<>','3')->where('status_id','<>','5')->whereNull('cart_status.deleted_at')->count()  }}</span></div>
                                        </div>
                                        <!-- <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-6 col-xl-6 mb-6">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Jumlah User</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>{{ App\User::count() }}</span></div>
                                        </div>
                                        <!-- <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6 mb-6">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Permintaan penarikan dana</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>{{ App\Withdrawal::whereNull('is_accept')->count() }}</span></div>
                                        </div>
                                        <!-- <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div> -->
                                    </div>
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

    
@include('admin.layouts.js')
<!-- JS add here -->

<!-- END JS -->
@include('admin.layouts.footer-copyright')
</body>
</html>