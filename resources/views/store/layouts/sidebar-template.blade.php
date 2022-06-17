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
            <h3 class="mt-3">Editor Website</h3>
            <!-- <button class="accordion">Logo <i class="fa-solid fa-angle-down"></i></button> -->
            <ul class="btn-non-accordeon">
                <li id="btn-logo">Logo Home</li>
            </ul>
            <button class="accordion">Banner <i class="fa-solid fa-angle-down"></i></button>
            <div class="panel">
                <ul>
                    <li id="btn-banner-home">Banner Homepage</li>
                    <li id="btn-banner-search">Banner Search</li>
                    <li id="btn-banner-category">Banner Kategori</li>
                </ul>
            </div>

            <button class="accordion">Color <i class="fa-solid fa-angle-down"></i></button>
            <div class="panel">
                <ul>
                    <li id="btn-bg-color" >Background Color</li>
                    <li id="btn-text-color">Text-Color</li>
                </ul>
            </div>
        </ul>
    </div>
</nav>



