@include('store.layouts.header')

<div id="wrapper">
        @include('store.layouts.sidebar')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('store.layouts.navbar')
                <div class="container container-chats">
                    <div class="row no-gutters container-inner">
                        <div class="col-12 col-xl-4 border-right">
                            <div class="settings-tray">
                                <div class="setting-container">

                                    <h1>Chats</h1>
                                    <span class="settings-tray--right">
                                        <i class="fa-solid fa-arrows-rotate"></i>
                                        <i class="fa-solid fa-message"></i>
                                        <i class="fa-solid fa-bars"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="search-box">
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <input placeholder="Search here" type="text">
                                </div>
                            </div>
                            <div class="friend-drawer friend-drawer--onhover">
                                <img class="profile-image" src="" alt="">
                                    <div class="text">
                                        <h6>Billie Halim</h6>
                                        <p class="text-muted">10 biji 10k boleh kak?</p>
                                    </div>
                                <span class="time text-muted small">13:21</span>
                            </div>
                           <hr>
                            <div class="friend-drawer friend-drawer--onhover">
                                <img class="profile-image" src="" alt="">
                                    <div class="text">
                                        <h6>Benny Stefan</h6>
                                        <p class="text-muted">Minyak Nya Berapa Kak?</p>
                                    </div>
                                <span class="time text-muted small">00:32</span>
                            </div>
                            <hr>
                            <div class="friend-drawer friend-drawer--onhover ">
                                <img class="profile-image" src="" alt="">
                                    <div class="text">
                                        <h6>Prederick I</h6>
                                        <p class="text-muted">Lokasi Toko Dimana ya?</p>
                                    </div>
                                <span class="time text-muted small">13:21</span>
                            </div>
                            <hr>                   
                            <div class="friend-drawer friend-drawer--onhover">
                                <img class="profile-image" src="" alt="">
                                    <div class="text">
                                        <h6>Jspen Sep</h6>
                                        <p class="text-muted">Bisa Nego?</p>
                                    </div>
                                <span class="time text-muted small">13:21</span>
                            </div>
                            <hr>
                            <div class="friend-drawer friend-drawer--onhover">
                                <img class="profile-image" src="" alt="">
                                    <div class="text">
                                        <h6>Anonymous</h6>
                                        <p class="text-muted">Order banyak dapet diskon?</p>
                                    </div>
                                <span class="time text-muted small">13:21</span>
                            </div>
                            <hr>
                            <div class="friend-drawer friend-drawer--onhover">
                                <img class="profile-image" src="" alt="">
                                    <div class="text">
                                        <h6>Anonymous</h6>
                                        <p class="text-muted">Order banyak dapet diskon?</p>
                                    </div>
                                <span class="time text-muted small">13:21</span>
                            </div>
                            <hr>
                            <div class="friend-drawer friend-drawer--onhover">
                                <img class="profile-image" src="" alt="">
                                    <div class="text">
                                        <h6>Anonymous</h6>
                                        <p class="text-muted">Order banyak dapet diskon?</p>
                                    </div>
                                <span class="time text-muted small">13:21</span>
                            </div>
                        </div>
                        <div class="col-12 col-xl-8 border-left mobile-chats">
                            <div class="settings-tray">
                                <div class="friend-drawer no-gutters friend-drawer--grey">
                                    <img class="profile-image" src="" alt="">
                                    <div class="text">
                                        <h6>Billie Halim</h6>
                                        <p class="text-muted">Saya Ganteng Sekali ....</p>
                                    </div>
                                    <span class="settings-tray--right">
                                    <i class="fa-solid fa-arrows-rotate"></i>
                                    <i class="fa-solid fa-message"></i>
                                    <i class="fa-solid fa-bars"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="chat-panel">
                                <div class="row no-gutters">
                                    <div class="col-md-3">
                                        <div class="chat-bubble chat-bubble--left">
                                            Harganya bisa nego kak?
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-md-3 offset-md-9">
                                        <div class="chat-bubble chat-bubble--right">
                                            Mau Beli berapa?
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-md-3 offset-md-9">
                                        <div class="chat-bubble chat-bubble--right">
                                            diatas 5pcs 2.000 kak
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-md-3">
                                        <div class="chat-bubble chat-bubble--left">
                                            butuh 100pcs
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-md-3">
                                        <div class="chat-bubble chat-bubble--left">
                                            1500 bisa ga kak?
                                        </div>
                                    </div>
                                        </div>
                                <div class="row no-gutters">
                                    <div class="col-md-3 offset-md-9">
                                        <div class="chat-bubble chat-bubble--right">
                                            bisa kak silahkan diorder
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="chat-box-tray">
                                            <i class="fa-solid fa-face-smile"></i>
                                            <input type="text" placeholder="Type your message here...">
                                            <i class="fa-solid fa-microphone"></i>
                                            <i class="fa-solid fa-paper-plane"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

@include('store.layouts.js')
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
    // $( '.friend-drawer--onhover' ).on( 'click',  function() {
    //      $( '.chat-bubble' ).hide('slow').show('slow');
    // });
</script>    

@include('store.layouts.footer')


