<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 sidebar-menu" id="sidebar-id">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon">
                <img class="border rounded-circle img-profile img-profile-sidebar" src="{{ Auth::user()->images()->first() ? asset('images/stored/'. Auth::user()->images()->first()->filepath) :  asset('images/homepage/blank-profile-picture.png') }}">
            </div>
            <div class="sidebar-brand-text mx-3"><span>{{ Auth::user()->name }}</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
        <hr class="sidebar-divider my-0" >
        
            <li class="nav-item"><a class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="fas fa-table"></i><span>Dashboard</span></a></li>
            <hr class="sidebar-divider my-0" >
            
            <li class="nav-item"><a class="nav-link" href="index.html"><i class="fas fa-coins"></i><span>Penarikan Dana</span></a></li>
            {{-- <li class="nav-item"><a class="nav-link" href="login.html"><i class="far fa-user-circle"></i><span>Chat</span></a></li> --}}
            <li class="nav-item"><a class="nav-link {{ Request::routeIs('admin.store.list') ? 'active' : '' }}" href="{{ route('admin.store.list') }}"><i class="fa-solid fa-store"></i><span>List Toko</span></a></li>
            <li class="nav-item"><a class="nav-link" href="register.html"><i class="fas fa-envelope"></i><span>List Pesanan</span></a></li>
            <li class="nav-item"><a class="nav-link " href="{{ route('store.product.add') }}"><i class="fa-solid fa-user"></i><span>List User</span></a></li>
            {{-- <hr class="sidebar-divider my-0" > --}}
            {{-- <li class="nav-item"><a class="nav-link" href="register.html"><i class="fas fa-cog"></i><span>Pengaturan Toko</span></a></li> --}}
        </ul>
        <!-- <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div> -->
    </div>
</nav>



