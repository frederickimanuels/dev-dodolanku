<?php $data=[
    'title' => 'Halaman tidak ditemukan',
    'description' => 'Halaman tidak ditemukan @Dodolanku.id',
    'keywords' => 'cart, online shop, business, haul',
    'author' => 'Dodolanku.id',
]; ?>


@include('homepage.layouts.header')

@include('layouts.navbar-home')
<style>
    #null-page{
        padding:150px 100px;
    }
    .content-wrapper{
        text-align: center;
    }
    .content-wrapper img{
        max-width: 280px;
        height: auto;
        width: 100%;
        display: block;
        margin: 0px auto 16px;
    }
    .content-wrapper h1{
        font-family: Montserrat-Bold;
        font-size: 40px;
        line-height: 48px;
    }
    .content-wrapper p{
        font-family: Montserrat-Medium;
        font-size: 22px;
        line-height: 30px;
    }
    .content-wrapper button{
        background-color: #53A7B2;
        padding: 5px 50px;
        font-family: Montserrat-Bold;
        font-size: 24px;
        border: none;
        color: #FFFFFF;
    }
    button:hover{
        border: none;
        background-color: green;
    }
    @media screen and (max-width:599px){
        #null-page{
            padding:50px 10px;
        }
        .content-wrapper h1{
            font-size: 28px;
            line-height: 36px;
        }
        .content-wrapper p{
            font-size: 18px;
            line-height: 26px;
        }
        .content-wrapper button{
            padding: 5px 20px;
            font-size: 18px;
        
        }
    }
</style>
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>{{ session('status') }}aas</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span>{{ session('error') }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<section id="null-page">
    <div class="container">
        <div class="content-wrapper">
            <img src="{{asset('images/homepage/error-not-found.png')}}" alt=".." class="aboutus-img">
            <h1>Waduh Tujuanmu tidak ada</h1>
            <p>Mungkin Kamu salah jalan atau alamat, ayo balik.</p>
            <a href="{{ route('base') }}"><button class="btn">Homepage</button></a>
        </div>

    </div>
</section>

@include('layouts.js')
<!-- Add JS Here... -->
<script>
    
</script>
<!-- End JS -->
@include('layouts.footer')