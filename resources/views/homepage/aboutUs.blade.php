@include('homepage.layouts.header')

@include('layouts.navbar-home')

<section id="aboutus-banner">
<div class="container">
    <img src="{{asset('images/homepage/hyundai.jpg')}}" alt=".." class="aboutus-img">
    <div class="container banner-inner">
        <h1 class="aboutus-h1">About Us</h1>
        <p class="aboutus-text" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus autem quam accusantium quae odio voluptatibus sit, atque culpa pariatur iste maiores, voluptates iure vitae nemo explicabo eum consectetur possimus eaque! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa asperiores fuga optio facere natus, praesentium nobis perferendis excepturi commodi in voluptates totam, enim voluptas deleniti, corrupti laudantium ex inventore rerum!</p>
    </div>
</div>
</section>

<section id="aboutus-search">
<h1 class="aboutus-h1">Search Question</h1>
<div class="container">
    <div class="search-inner">
        <form>
            <div class="form-row">
            <div class="col">
                <input type="text" class="form-control aboutus-searchbar" placeholder="">
            </div>
            </div>
        </form>
    </div>
    <p class="aboutus-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis atque dolorum, reprehenderit velit totam dicta cum nostrum inventore ex illo optio, molestiae doloribus fuga culpa dolor tempore excepturi assumenda! Neque!</p>
</div>
</section>
<section id="aboutus-faq">
    <div class="container">
        <h1 class="aboutus-h1">FAQ</h1>
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

@include('homepage.layouts.js')
<!-- Add Js Here... -->

<!-- End JS -->
@include('homepage.layouts.footer')