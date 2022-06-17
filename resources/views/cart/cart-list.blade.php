@include('cart.layouts.header')

@include('layouts.navbar-home')
<style>
    .container{
        max-width: 70%;
    }
</style>
<section id="shop-cart-list" >
    <div class="container">
        <div class="row shop-list">
            <h2>Toko Billie Halim</h2>
            <div class="col-9">
                <h3>Kamu Memiliki <span>4</span> Barang di keranjang toko ini</h3>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-primary">Lihat Keranjang</button>
            </div>
        </div>
        <div class="row shop-list">
            <h2>Toko Billie Halim</h2>
            <div class="col-9">
                <h3>Kamu Memiliki <span>4</span> Barang di keranjang toko ini</h3>
            </div>
            <div class="col-3">
                <button type="button" onclick="window.location.href='https://w3docs.com';" class="btn btn-primary">Lihat Keranjang</button>
            </div>
        </div>
    </div>
</section>

@include('layouts.js')
<!-- Add JS Here -->

<!-- End JS -->
@include('layouts.footer')