@include('store.layouts.header')

@include('layouts.navbar-home')

<style>
     :root{
            /* Header Disini */
            /* BG Color Dsini */
            --bgcolor:#AE8D84;
            --bgcolor1:#FFFFFF;
            --bgcolor2:#FFF8F6;
            --bgcolor3:#DFC3BB;
            --bgcolorFooter:#AE8D84;
            --bgcolorHeader:#AE8D84;


            /* Text Gede Color Disini */
            --textColor1:#FFFFFF;
            --textColor2:#000000;
            --textColor3:#FC764E;

            /* Popular Product Color */

            /* FooterColor */
        }
        #homepage-footer .footer-clean{
            background-color:var(--bgcolorFooter);
        }
        .navbar-homepage{
            background-color:var(--bgcolorHeader) !important;
        }
        #aboutus-banner{
            background-color: var(--bgcolor2);
        }
        .search-filter{
            margin-left: auto;
            order: 2;
        }
        .search-filter-wrapper{
            margin-bottom: 30px;
            margin-top: 30px;
        }
        .search-filter select{
            border-radius: 15px;
            background-color: #FFFFFF;
            color: #9a9a9a;
            font-size: 14px;
            font-family: PlusJakarta-Regular;
            line-height: 24px;
            padding: 10px 30px 10px 10px;
        }
        .card{
            border-radius: 5%;
            /* margin: 0 20px; */
        }
        .card-img-top{
            border-top-left-radius: 5%;
            border-top-right-radius: 5%;
        }
        .popular-card-text h5{
            font-family: Montserrat-Regular;
            font-size: 14px;
            line-height: 23px;
            color: var(--textColor2);
        }
        .popular-card-text h6{
            font-family: Montserrat-Bold;
            font-size: 16px;
            line-height: 24px;
            color: var(--textColor3);
        }
        .checked {
            color: orange;
        }
        .rating-text{
            color: #9A9A9A;
            font-size: 14px;
            line-height: 23px;
            font-family: Montserrat-Regular;
        }
        .banner-text{
            position: relative;
        }
        .banner-text h1{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family: PlusJakarta-Bold;
            font-size: 48px;
            line-height: 54px;
            color: var(--textColor1);
            text-transform: uppercase;
        }
        .panel-color{
            background-color: #FFFFFF;
            padding: 0px;
        }
        .panel-heading{
            background-color: var(--bgcolor);
            padding: 20px;
        }
        .panel-body{
            background-color: var(--bgcolor3);
            padding: 20px;
        }
        .prod-cat input[type="checkbox"]{
            /* width: 20%; */
            width: 20px;
            height: 20px;
            text-align: left;
        }
        .prod-cat label{
            /* width: 20%; */
            text-align: left;
            font-family: Montserrat-Regular;
            font-size: 14px;
            line-height: 23px;
            color: var(--textColor2);
            vertical-align: baseline;
            margin-left: 10px;
        }
        .category-filter{
            display: flex;
        }
        .prod-price li{
            margin:10px 0;
        }
        .prod-price input[type="number"]{
            background-color: var(--bgcolor1);
            border-radius: 5px;
            font-family: Montserrat-Regular;
            font-size: 14px;
            line-height: 23px;
            color: var(--textColor2);
        }
       
</style>
<section id="aboutus-banner">
    <div class="container banner-text">
        <img src="{{asset('images/homepage/hyundai.jpg')}}" alt=".." class="aboutus-img">
        <h1>Kategori Produk</h1>
    </div>
    <div class="container bootdey">
        <div class="row search-filter-wrapper">
            <div class="col-3 search-filter">
                <select class="form-select" aria-label="Default select example">
                    <option selected value="0">Urutkan Berdasarkan</option>
                    <option value="polkadot">Polkadot</option>
                    <option value="birumaroon">Biru Maroon</option>
                </select>
            </div>
        </div>
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
                            <li>
                                <div class="category-filter">
                                    <input type="checkbox" aria-label="Checkbox for following text input">
                                    <label for="checkbox">Test</label>
                                </div>
                            </li>
                            <li>
                                <div class="category-filter">
                                    <input type="checkbox" aria-label="Checkbox for following text input">
                                    <label for="checkbox">Test</label>
                                </div>
                            </li>
                            <li>
                                <div class="category-filter">
                                    <input type="checkbox" aria-label="Checkbox for following text input">
                                    <label for="checkbox">Test</label>
                                </div>
                            </li>
                            <li>
                                <div class="category-filter">
                                    <input type="checkbox" aria-label="Checkbox for following text input">
                                    <label for="checkbox">Test</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="break-line"></div> -->
                    <header class="panel-heading panel-filter">
                        <h1>Material</h1>
                    </header>
                    <div class="panel-body ">
                        <ul class="prod-cat">
                            <li>
                                <div class="category-filter">
                                    <input type="checkbox" aria-label="Checkbox for following text input">
                                    <label for="checkbox">Test</label>
                                </div>
                            </li>
                            <li>
                                <div class="category-filter">
                                    <input type="checkbox" aria-label="Checkbox for following text input">
                                    <label for="checkbox">Test</label>
                                </div>
                            </li>
                            <li>
                                <div class="category-filter">
                                    <input type="checkbox" aria-label="Checkbox for following text input">
                                    <label for="checkbox">Test</label>
                                </div>
                            </li>
                            <li>
                                <div class="category-filter">
                                    <input type="checkbox" aria-label="Checkbox for following text input">
                                    <label for="checkbox">Test</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <header class="panel-heading panel-filter">
                        <h1>Harga</h1>
                    </header>
                    <div class="panel-body ">
                        <ul class="prod-cat prod-price">
                            <li>
                                <input type="number" class="form-control" placeholder="Harga Minimum" aria-label="Username" aria-describedby="basic-addon1">
                            </li>
                            <li>
                                <input type="number" class="form-control" placeholder="Harga Maksimum" aria-label="Username" aria-describedby="basic-addon1">
                            </li>
                            <li>
                                <div class="category-filter">
                                    <input type="checkbox" aria-label="Checkbox for following text input">
                                    <label for="checkbox">&#10094; Rp.300.000</label>
                                </div>
                            </li>
                            <li>
                                <div class="category-filter">
                                    <input type="checkbox" aria-label="Checkbox for following text input">
                                    <label for="checkbox">Rp.300.000 - Rp.500.000</label>
                                </div>
                            </li>
                            <li>
                                <div class="category-filter">
                                    <input type="checkbox" aria-label="Checkbox for following text input">
                                    <label for="checkbox">&#10095; Rp.501.000</label>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </section>
            </div>
            <div class="col-md-9">
                <div class="row product-list">
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="{{asset('images/homepage/bag-1.png')}}" alt="Card image cap">
                            <div class="card-body popular-card-text">
                                <h5 class="card-text">Praide Designer Shoulder Bags 2020</h5>
                                <h6>Rp. 750.000</h6>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="rating-text">(127)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="{{asset('images/homepage/bag-1.png')}}" alt="Card image cap">
                            <div class="card-body popular-card-text">
                                <h5 class="card-text">Praide Designer Shoulder Bags 2020</h5>
                                <h6>Rp. 750.000</h6>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="rating-text">(127)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="{{asset('images/homepage/bag-1.png')}}" alt="Card image cap">
                            <div class="card-body popular-card-text">
                                <h5 class="card-text">Praide Designer Shoulder Bags 2020</h5>
                                <h6>Rp. 750.000</h6>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="rating-text">(127)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="{{asset('images/homepage/bag-1.png')}}" alt="Card image cap">
                            <div class="card-body popular-card-text">
                                <h5 class="card-text">Praide Designer Shoulder Bags 2020</h5>
                                <h6>Rp. 750.000</h6>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="rating-text">(127)</span>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>

@include('store.layouts.js')
<!-- JS -->


<!-- END JS -->
@include('store.layouts.footer')
@include('store.layouts.footer-copyright')
</body>
</html>
