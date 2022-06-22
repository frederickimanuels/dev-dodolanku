<?php $data=[
    'title' => 'Tentang Dodolanku',
    'description' => 'Tentang Dodolanku.id',
    'keywords' => 'cart, online shop, business, haul',
    'author' => 'Dodolanku.id',
]; ?>

@include('homepage.layouts.header')

@include('layouts.navbar-home')

@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span>{{ session('status') }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<section id="aboutus-banner">
<div class="container">
    <img src="{{asset('images/homepage/bg-1.png')}}" alt="" class="homepage-slick">
    <div class="container banner-inner">
        <h1 class="aboutus-h1">About Us</h1>
        <p class="aboutus-text" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus autem quam accusantium quae odio voluptatibus sit, atque culpa pariatur iste maiores, voluptates iure vitae nemo explicabo eum consectetur possimus eaque! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa asperiores fuga optio facere natus, praesentium nobis perferendis excepturi commodi in voluptates totam, enim voluptas deleniti, corrupti laudantium ex inventore rerum!</p>
    </div>
</div>
</section>

<section id="aboutus-search">
<h1 class="aboutus-h1" id="HELP">Need Help?</h1>
<p class="aboutus-p">Email Us</p>
<div class="container">
    <div class="search-inner">
        <form action="{{ route('email-us') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="row">
                    <div class="col-3">
                        <label for="email"><strong>Email Anda</strong></label>
                        <input type="text" name="email" class="form-control aboutus-searchbar" placeholder="Tulis email" value="{{ old('email') }}">
                        @error('email')
                            <p class="help-block text-danger">Email harus diisi</p>
                        @enderror
                    </div>
                    <div class="col-8">
                        <label for="email"><strong>Pesan</strong></label>
                        <input type="text" name="message" class="form-control aboutus-searchbar" placeholder="Tulis pesan / pertanyaan"  value="{{ old('message') }}">
                        @error('message')
                            <p class="help-block text-danger">Pesan harus diisi</p>
                        @enderror
                    </div>
                    <div class="col">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</section>
<section id="aboutus-faq">
    <div class="container">
        <h1 class="aboutus-h1" id="FAQ">FAQ</h1>
        <ul class="aboutus-list" >
            <li class="list-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit perferendis voluptates delectus qui dicta velit, commodi placeat mollitia illo ex sequi eveniet fuga dolor voluptatum iure veniam architecto. Cupiditate, earum.</li>
            <li class="list-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit perferendis voluptates delectus qui dicta velit, commodi placeat mollitia illo ex sequi eveniet fuga dolor voluptatum iure veniam architecto. Cupiditate, earum.</li>
            <li class="list-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit perferendis voluptates delectus qui dicta velit, commodi placeat mollitia illo ex sequi eveniet fuga dolor voluptatum iure veniam architecto. Cupiditate, earum.</li>
            <li class="list-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit perferendis voluptates delectus qui dicta velit, commodi placeat mollitia illo ex sequi eveniet fuga dolor voluptatum iure veniam architecto. Cupiditate, earum.</li>
            <li class="list-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit perferendis voluptates delectus qui dicta velit, commodi placeat mollitia illo ex sequi eveniet fuga dolor voluptatum iure veniam architecto. Cupiditate, earum.</li>
            <li class="list-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit perferendis voluptates delectus qui dicta velit, commodi placeat mollitia illo ex sequi eveniet fuga dolor voluptatum iure veniam architecto. Cupiditate, earum.</li>
        </ul>
    </div>
</section>

@include('layouts.js')
<!-- Add Js Here... -->
<script>
    (function ($) {
  $(document).ready(function() {
    if (typeof window.location.hash !== 'undefined') {
      $("html, body").animate({ scrollTop: $('#' + window.location.hash).offset().top }, 1000);
    }
  });
})(jQuery);
</script>
<!-- End JS -->
@include('layouts.footer')