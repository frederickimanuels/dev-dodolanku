<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 sidebar-menu" id="sidebar-id">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand justify-content-center align-items-center sidebar-brand m-0" href="#">
            <!-- <div class="sidebar-brand-icon"><i class="fas fa-laugh-wink"></i></div> -->
            <div class="sidebar-brand-icon">
                <img class="border rounded-circle img-profile img-profile-sidebar" src="{{asset('images/homepage/profile1.jpg')}}">
            </div>
            <div class="sidebar-brand-text mx-3"><span>{{ Auth::user()->hasStore()->name }}</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
        <hr class="sidebar-divider my-0" >
            <li class="nav-item"><a class="nav-link active" href="index.html"><i class="fas fa-coins"></i><span>Saldo Toko</span></a></li>
            <li class="nav-item"><a class="nav-link" href="profile.html"><i class="fas fa-coins"></i><span>Penghasilan</span></a></li>
            <hr class="sidebar-divider my-0" >
            <li class="nav-item"><a class="nav-link" href="{{ route('store.dashboard') }}"><i class="fas fa-table"></i><span>Dashboard</span></a></li>
            {{-- <li class="nav-item"><a class="nav-link" href="login.html"><i class="far fa-user-circle"></i><span>Chat</span></a></li> --}}
            <li class="nav-item"><a class="nav-link" href="{{ route('store.product.manage') }}"><i class="fas fa-shopping-bag"></i><span>Produk</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('store.product.add') }}"><i class="fas fa-cart-plus"></i><span>Tambah Produk</span></a></li>
            <li class="nav-item"><a class="nav-link" href="register.html"><i class="fas fa-envelope"></i><span>Pesanan</span></a></li>
            <hr class="sidebar-divider my-0" >
            {{-- <li class="nav-item"><a class="nav-link" href="register.html"><i class="fas fa-user-circle"></i><span>Statistik Penjualan</span></a></li>
            <li class="nav-item"><a class="nav-link" href="register.html"><i class="fas fa-user-circle"></i><span>Ulasan Pembeli</span></a></li>
            <li class="nav-item"><a class="nav-link" href="register.html"><i class="fas fa-user-circle"></i><span>Ulasan Bantuan</span></a></li>
            <hr class="sidebar-divider my-0" > --}}
            <li class="nav-item"><a class="nav-link" href="register.html"><i class="fas fa-cog"></i><span>Pengaturan Toko</span></a></li>
        </ul>
        <!-- <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div> -->
    </div>
</nav>



