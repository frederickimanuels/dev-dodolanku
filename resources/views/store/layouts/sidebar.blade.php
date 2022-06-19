<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 sidebar-menu" id="sidebar-id">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand justify-content-center align-items-center sidebar-brand m-0" href="#">
            <!-- <div class="sidebar-brand-icon"><i class="fas fa-laugh-wink"></i></div> -->
            <div class="sidebar-brand-icon">
                <img class="border rounded-circle img-profile img-profile-sidebar" src="{{ Auth::user()->images()->first() ? asset('images/stored/'. Auth::user()->images()->first()->filepath) :  asset('images/homepage/blank-profile-picture.png') }}">
            </div>
            <div class="sidebar-brand-text mx-3"><span>{{ Auth::user()->hasStore()->name }}</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
        <hr class="sidebar-divider my-0" >
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="fas fa-coins"></i>
                    <span>Saldo Toko</span><br>
                    <span>Rp {{ Auth::user()->hasStore()->balances()->first() ? number_format( Auth::user()->hasStore()->currentBalance()->first()->value,0,',','.') : '0'}}</span>
                </a>
            </li>
            <hr class="sidebar-divider my-0" >
            <li class="nav-item"><a class="nav-link {{ Request::routeIs('store.dashboard') ? 'active' : '' }}" href="{{ route('store.dashboard') }}"><i class="fas fa-table"></i><span>Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link {{ Request::routeIs('store.order') ? 'active' : '' }}" href="{{ route('store.order') }}"><i class="fas fa-envelope"></i><span>Pesanan</span></a></li>
            {{-- <li class="nav-item"><a class="nav-link" href="login.html"><i class="far fa-user-circle"></i><span>Chat</span></a></li> --}}
            <li class="nav-item"><a class="nav-link {{ Request::routeIs('store.product.manage') ? 'active' : '' }}" href="{{ route('store.product.manage') }}"><i class="fas fa-shopping-bag"></i><span>Produk</span></a></li>
            <li class="nav-item"><a class="nav-link {{ Request::routeIs('store.product.add') ? 'active' : '' }}" href="{{ route('store.product.add') }}"><i class="fa-solid fa-plus"></i><span>Tambah Produk</span></a></li>
            <hr class="sidebar-divider my-0" >
            {{-- <li class="nav-item"><a class="nav-link" href="register.html"><i class="fas fa-user-circle"></i><span>Statistik Penjualan</span></a></li>
            <li class="nav-item"><a class="nav-link" href="register.html"><i class="fas fa-user-circle"></i><span>Ulasan Pembeli</span></a></li>
            <li class="nav-item"><a class="nav-link" href="register.html"><i class="fas fa-user-circle"></i><span>Ulasan Bantuan</span></a></li>
            <hr class="sidebar-divider my-0" > --}}
            <li class="nav-item"><a class="nav-link {{ Request::routeIs('store.manage') ? 'active' : '' }}" href="{{ route('store.manage') }}"><i class="fas fa-cog"></i><span>Pengaturan Toko</span></a></li>
            <li class="nav-item"><a class="nav-link {{ Request::routeIs('store.template') ? 'active' : '' }}" href="{{ route('store.template') }}"><i class="fas fa-cog"></i><span>Pengaturan Template</span></a></li>
        </ul>
        <!-- <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div> -->
    </div>
</nav>


