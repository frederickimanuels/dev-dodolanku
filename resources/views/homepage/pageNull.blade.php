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


<section id="null-page">
    <div class="container">
        <div class="content-wrapper">
            <img src="{{asset('images/homepage/error-not-found.png')}}" alt=".." class="aboutus-img">
            <h1>Waduh Tujuanmu tidak ada</h1>
            <p>Mungkin Kamu salah jalan atau alamat, ayo balik.</p>
            <button class="btn">Homepage</button>
        </div>

    </div>
</section>

@include('layouts.js')
<!-- Add JS Here... -->
<script>
    
</script>
<!-- End JS -->
@include('layouts.footer')