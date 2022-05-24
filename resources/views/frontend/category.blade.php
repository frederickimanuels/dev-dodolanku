@extends('frontend.layouts.headerHome')

@section('content')
@include('frontend.layouts.navbar-home')
<section id="aboutus-banner">
<div class="container">
    <img src="{{asset('images/homepage/hyundai.jpg')}}" alt=".." class="aboutus-img">
</div>
</section>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="container bootdey">
    <div class="row">

    
    <div class="col-md-3">
        <!-- <section class="panel">
            <div class="panel-body">
                <input type="text" placeholder="Keyword Search" class="form-control" />
            </div>
        </section> -->
        <section class="panel panel-color">
            <header class="panel-heading">
                <h1>Category</h1>
            </header>
            <div class="panel-body">
                <ul class="prod-cat">
                    <li>Bags</li>
                    <li>aaaa</li>
                    <li>bbbb</li>
                </ul>
            </div>
            <div class="break-line"></div>
            <header class="panel-heading panel-filter">
                <h1>Filter</h1>
            </header>
            <div class="panel-body ">
                <ul class="prod-cat">
                    <li>Bags</li>
                    <li>aaaa</li>
                    <li>bbbb</li>
                </ul>
            </div>
        </section>
    </div>
    <div class="col-md-9">
        <div class="row product-list">
            <div class="col-md-4">
                <section class="panel">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('images/homepage/profile1.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('images/homepage/profile1.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                </section>
            </div>
            <div class="col-md-4">
                <section class="panel">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset('images/homepage/profile1.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                </section>
            </div>
            
           
            
           


        </div>
    </div>
    </div>
</div>

@include('frontend.layouts.footer-home')
@endsection 