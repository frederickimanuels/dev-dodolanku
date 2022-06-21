<?php $data=[
    'title' => 'Dashboard Penjual',
    'description' => 'Halaman dashboard penjual @Dodolanku.id',
    'keywords' => 'cart, online shop, business, haul',
    'author' => 'Dodolanku.id',
]; ?>

@include('store.layouts.header')
<style>
    .image-tips{
        width: 100%;
        max-height: 200px;
    }
    .noHover{
        pointer-events: none;
    }
</style>
<div id="wrapper">
        @include('store.layouts.sidebar')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('store.layouts.navbar')
                <div class="container-fluid">
                    <!-- <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
                    </div> -->
                    <div class="row">
                        <div class="col-md-4 col-xl-4 mb-4">
                            <a href="{{ route('store.order') }}" style="text-decoration: none;color:inherit;">
                                <div class="card shadow border-start-primary py-2">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Pesanan Berlangsung</span></div>
                                                <div class="text-dark fw-bold h5 mb-0"><span>{{ $store->carts()->join('cart_status','cart_status.cart_id','carts.id')->where('status_id','<>','1')->where('status_id','<>','3')->where('status_id','<>','5')->whereNull('cart_status.deleted_at')->count() }}</span></div>
                                            </div>
                                            <!-- <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div> -->
                                        </div>
                                    </div>
                                </div>
                            </a>
                            
                        </div>
                        <div class="col-md-4 col-xl-4 mb-4">
                            <a href="{{ route('store.product.manage') }}" style="text-decoration: none;color:inherit;">
                                <div class="card shadow border-start-warning py-2">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Produk Toko</span></div>
                                                <div class="text-dark fw-bold h5 mb-0"><span>{{ $store->products()->count() }}</span></div>
                                            </div>
                                            <!-- <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div> -->
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-xl-4 mb-4">
                            <a href="{{ route('store.order') }}" style="text-decoration: none;color:inherit;">
                                <div class="card shadow border-start-success py-2">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Penjualan</span></div>
                                                <div class="text-dark fw-bold h5 mb-0"><span>{{ $store->orders()->count() }}</span></div>
                                            </div>
                                            <!-- <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div> -->
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row inner-row my-5">
                        <h1 class="h1-dashboard" style="margin-bottom:15px;">Halo, Bagaimana Kabar Tokomu?</h1>
                        <h4 class="mb-4">Berikut ada beberapa tips dari mimin Dodolanku</h4>
                        @if(count($tips) > 0)
                        @foreach($tips as $tp)
                        <div class="col-lg-4 mb-4">
                            <div class="card noHover" style="width: 100%">
                                <img class="card-img-top image-tips" src="{{ $tp->images()->first() ? asset('images/stored/'. $tp->images()->first()->filepath) : asset('images/homepage/computer-1.png') }}" alt="Card image cap">
                                <div class="card-body">
                                    <h4>{{ $tp->title }}</h4>
                                    <p class="card-text">{{ $tp->description }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Earnings Overview</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;0&quot;,&quot;10000&quot;,&quot;5000&quot;,&quot;15000&quot;,&quot;10000&quot;,&quot;20000&quot;,&quot;15000&quot;,&quot;25000&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Revenue Sources</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Direct&quot;,&quot;Social&quot;,&quot;Referral&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#36b9cc&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;50&quot;,&quot;30&quot;,&quot;15&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas></div>
                                    <div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle text-primary"></i>&nbsp;Direct</span><span class="me-2"><i class="fas fa-circle text-success"></i>&nbsp;Social</span><span class="me-2"><i class="fas fa-circle text-info"></i>&nbsp;Refferal</span></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small fw-bold">Server migration<span class="float-end">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"><span class="visually-hidden">20%</span></div>
                                    </div>
                                    <h4 class="small fw-bold">Sales tracking<span class="float-end">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"><span class="visually-hidden">40%</span></div>
                                    </div>
                                    <h4 class="small fw-bold">Customer Database<span class="float-end">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"><span class="visually-hidden">60%</span></div>
                                    </div>
                                    <h4 class="small fw-bold">Payout Details<span class="float-end">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"><span class="visually-hidden">80%</span></div>
                                    </div>
                                    <h4 class="small fw-bold">Account setup<span class="float-end">Complete!</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="visually-hidden">100%</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0">Todo List</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <h6 class="mb-0"><strong>Lunch meeting</strong></h6><span class="text-xs">10:30 AM</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1"></label></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <h6 class="mb-0"><strong>Lunch meeting</strong></h6><span class="text-xs">11:30 AM</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2"></label></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <h6 class="mb-0"><strong>Lunch meeting</strong></h6><span class="text-xs">12:30 AM</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3"></label></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card textwhite bg-primary text-white shadow">
                                        <div class="card-body">
                                            <p class="m-0">Primary</p>
                                            <p class="text-white-50 small m-0">#4e73df</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card textwhite bg-success text-white shadow">
                                        <div class="card-body">
                                            <p class="m-0">Success</p>
                                            <p class="text-white-50 small m-0">#1cc88a</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card textwhite bg-info text-white shadow">
                                        <div class="card-body">
                                            <p class="m-0">Info</p>
                                            <p class="text-white-50 small m-0">#36b9cc</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card textwhite bg-warning text-white shadow">
                                        <div class="card-body">
                                            <p class="m-0">Warning</p>
                                            <p class="text-white-50 small m-0">#f6c23e</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card textwhite bg-danger text-white shadow">
                                        <div class="card-body">
                                            <p class="m-0">Danger</p>
                                            <p class="text-white-50 small m-0">#e74a3b</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card textwhite bg-secondary text-white shadow">
                                        <div class="card-body">
                                            <p class="m-0">Secondary</p>
                                            <p class="text-white-50 small m-0">#858796</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
<!-- JS add here -->

<!-- END JS -->
@include('store.layouts.footer-copyright')
</body>
</html>