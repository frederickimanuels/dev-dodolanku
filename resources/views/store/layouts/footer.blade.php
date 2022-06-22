<section id="homepage-footer">
<div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row footer-mobile">
                    <div class="col-sm-4 col-md-5 item">
                        <div class="homepage-logo" >INI LOGO</div>
                        <h3>Subscribe to Us</h3>
                        <form action="" class="subscribe-form">
                            <div class="search-wrapper">
                                <input type="text" placeholder="Email Address" name="Email Address">
                                <button type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4 col-md-2 item contact-left">
                        <h3>Sitemap</h3>
                        <ul class="contact-wrapper">
                            <li><a href="{{route('base')}}">Home</a></li>
                            <li><a href="{{route('feature')}}">Feature</a></li>
                            <li><a href="{{route('about')}}#HELP">Help</a></li>
                            <li><a href="{{route('about')}}#FAQ">FAQ</a></li>
                        </ul>
                    </div> 
                    <div class="col-sm-4 col-md-2 item contact-left">
                        <h3>Company</h3>
                        <ul class="contact-wrapper">
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="{{ route('terms') }}">Syarat & Ketentuan</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social">
                        <h3>Contact Us</h3>
                        <ul class="contact-wrapper" >
                            <li><a href="mailto:customerservice@dodolanku.id"><img src="{{asset('images/homepage/telephone.png')}}" alt="" class="contact-icon">customerservice@dodolanku.id</a></li>
                            <li><a href="#"><img src="{{asset('images/homepage/house.png')}}" alt="" class="contact-icon">(021) 210-135-45</a></li>
                        </ul>
                    </div>
                    <!-- <div class="col-lg-3 item social">
                        <h3>Contact Us</h3>
                        <a href="#"><img src="{{asset('images/homepage/icon-instagram.png')}}" alt="" class="social-icon"></a>
                        <a href="#"><img src="{{asset('images/homepage/icon-facebook.png')}}" alt="" class="social-icon"></a>
                        <a href="#"><img src="{{asset('images/homepage/icon-twitter.png')}}" alt="" class="social-icon"></a>
                    </div> -->
                </div>
            </div>
        </footer>

    </div>
   
</section>
</body>
</html>