@include('layouts.header')

@include('layouts.navbar-home')
<style>
  .price, #product_subtotal_1{
    font-family: Montserrat-Medium;
    font-size: 16px;
  }
  .quantity input[type="text"]{
    font-family: Montserrat-Medium;
    font-size: 16px;
  }
  .card-body h5{
    font-family: Montserrat-Bold;
    font-size: 20px;
  } 
  .card-body h6{
    font-family: Montserrat-Medium;
    font-size: 18px;
  } 
  .card-body p{
    font-family: Montserrat-Medium;
    font-size: 16px;
  }
  main{
    width: 60%;
  }
  .basket{
    width: 70%;
  } 
  aside{
    width: 30%;
  }
  .fa-trash{
    cursor: pointer;
  }
  .cart-empty{
    text-align: center;
    padding-top: 100px;
  }
  .cart-empty h2{
    font-size: 30px;
    font-family: Montserrat-Bold;
  }
  .cart-empty h3{
    padding-top: 20px;
    font-size: 20px;
    font-family: Montserrat-Bold;
    margin-bottom: 50px;
  }
  .cart-empty a{
    /* margin-top: 30px; */
    padding-top: 20px;
    font-size: 20px;
    font-family: Montserrat-Bold;
    background-color: #53A7B2 ;
    padding: 10px 30px;
    border-radius: 8px;
    color: #FFFFFF;
    text-decoration: none;
  }
  .cart-empty a:hover{
    text-decoration: none;
    opacity: 0.7;
  }
  @media screen and (max-width:599px)
  {
    main{
      width: 95%;
    }
  }
</style>

<section id="shopping_cart" >


<main class="" >
  <form method="POST" action="{{ route('cart.pay') }}">
    @csrf 
    <div class="basket container cart-empty {{ count($products)>0 ? 'd-none' : '' }}">
      <h2>Keranjang Belanjaanmu Masih Kosong Nih</h2>
      <h3>Yuk tambahkan produknya sekarang</h3>
      <a href="{{ route('store.show',$store->slug) }}">
        <span>
          Belanja Sekarang
        </span>
      </a>
    </div>
    <div class="basket {{ count($products)>0 ? '' : 'd-none' }}">
      <!-- <div class="basket-labels">
        <ul>
          <li class="item item-heading">Item</li>
          <li class="price">Price</li>
          <li class="quantity">Quantity</li>
          <li class="subtotal">Subtotal</li>
        </ul>
      </div> -->
      <div id="details">
        <h1 class="cart-h1">Order di <span><a href="{{ route('store.show',$store->slug) }}" style="text-decoration: none; color:#EE6530;">{{ $store->name }}</a></span></h1>
        <input type="hidden" name="cart_id" value="{{ $cart ? $cart->id : '' }}">
        <input type="hidden" name="address_id" value="{{ $address ? $address->id : '' }}">
        <input type="hidden" id="input_shipping_fee" name="shipping_fee" value="">
        @if($products)
        @foreach($products as $product)
          <div class="basket-product d-flex">
            <div class="basket-item">
              <div class="product-image">
                <img src="{{ $product->images()->first() ? asset('images/stored/'. $product->images()->first()->filepath) :  asset('images/homepage/default-product-image.png') }}" alt="Placholder Image 2" class="product-frame">
              </div>
              <div class="product-details-cart">
                <div class="container">
                  <div class="row">
                    <div class="col-12 ">
                      <h1>{{ $product->name }}</h1>
                    </div>
                  </div>
                  <div class="row pt-2 pb-2">
                    <div class="col-12">
                      <div class="price"><span style="color:#FC764E">Rp {{number_format($product->price,0,',','.')}}</span>  / unit</div>
                    </div>
                  </div>
                  <div class="row pt-2 pb-2">
                    <div class="col-6">
                      <div class="quantity">
                        <label for="">Jumlah</label>
                        <input type="hidden" name="product_id[]" class="product_id" value="{{ $product->id }}">
                        <input type="text" name="product_count[]" value="{{ $product->pivot->count }}" class="quantity-field product_count">
                        <input type="hidden" name="" class="product_price" value="{{ $product->price }}">
                        <input type="hidden" name="" class="product_weight" value="{{ $product->weight }}">
                      </div>
                    </div>  
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="subtotal ml-auto d-flex">
              Rp <span id="product_subtotal_{{$product->id}}">{{number_format($product->price * $product->pivot->count,0,',','.')}}</span>
              <i class="fa-solid fa-trash mt-auto remove-product" product-id="{{ $product->id }}" cart-id="{{ $cart->id }}"></i>
            </div>
            <div>
            
            </div>
          </div>
        @endforeach
        @endif
      </div>


      <!-- delivery part -->
        <div class="summary-delivery">
          <div class="container">
          <h1 class="cart-h1 delivery-h1">Delivery</h1>
            <div class="row">
              <!-- Courier -->
                <div class="col-6 col-sm-12 col-lg-6 col-md-6">
                  <div class="delivery-checkbox">
                      <div class="card" style="width: 100%">
                        <div class="card-body">
                          <h5 class="card-title">Sicepat</h5>
                          <h6 class="card-subtitle mb-2">1-3 Hari</h6>
                          <p class="card-text">Rp <span id="shipping_fee_1"></span></p>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <aside>
      <h1 class="cart-h1" >Address</h1>
      <div class="summary summary-address">
        <!-- <div class="summary-total-items"><span class="total-items"></span>Address</div> -->
        <div class="summary-delivery">
          @if($address)
          <div class="mb-2">
            {{ $address ? $address->description : ''}}</br>
            {{ $address ? $address->province . '-' . $address->city : ''}}
          </div>
          {{-- <select name="delivery-collection" class="summary-delivery-selection">
              <option value="0" selected="selected">Select Collection or Delivery</option>
             <option value="collection">Collection</option>
             <option value="first-class">Royal Mail 1st Class</option>
             <option value="second-class">Royal Mail 2nd Class</option>
             <option value="signed-for">Royal Mail Special Delivery</option>
          </select> --}}
          <a href="{{ route('user.address') }}" class="add-address">
            <span>
              Ubah
            </span>
          </a>
          @else
            <a href="{{ route('user.address') }}" class="add-address">
              <span>
                Atur alamat pengiriman
              </span>
            </a>
            <!-- <form action="{{route('user.address')}}">
              <button >Click me</button>
            </form> -->
          @endif
        </div>
      </div>
      <h1 class="cart-h1" >Summary</h1>
      <div class="summary">
        <!-- <div class="summary-total-items"><span class="total-items"></span>Summary</div> -->
        {{-- <div class="summary-order-number">
          <div class="subtotal-title">Order Number</div>
          <div class="subtotal-order-number">121212</div>
          <!-- <div class="subtotal-value final-value" id="basket-subtotal">1211221212</div> -->
        </div>
        <div class="summary-promotional">
            <!-- <label for="promo-code">Have Promo Code?</label> -->
            <input id="promo-code" placeholder="Voucher Code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
            <button class="promo-code-cta">Apply</button>
        </div> --}}
        <div class="summary-subtotal">
          <div class="subtotal-title">Total Harga</div>
          <div class="subtotal-value final-value" id="basket-subtotal">Rp <span id="order_value"></span></div>
          <div class="subtotal-title">Ongkos Kirim</div>
          <div class="subtotal-value final-value" id="basket-subtotal">Rp <span id="shipping_fee_2"></span></div>
          {{-- <div class="subtotal-title">Discount</div>
          <div class="subtotal-value final-value" id="basket-subtotal">130.00</div> --}}
        </div>
        <div class="summary-total">
          <div class="total-title">Total Tagihan</div>
          <div class="total-value final-value" id="basket-total">Rp <span id="total_amount"></span></div>
        </div>
        <div class="summary-checkout pt-5">
          @if($address)
            <button type="submit" class="checkout-cta">Bayar</button>
          @else
            <a href="{{ route('user.address') }}" class="add-address">
              <span>
                Atur alamat pengiriman
              </span>
            </a>
          @endif
        </div>
      </div>
    </aside>
  </div>
  </main>
</section>
<!-- Modal -->
<div class="modal fade" id="modalRemoveProduct" tabindex="-1" role="dialog" aria-labelledby="modalRemoveProduct" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Hapus Produk</h5>
              <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              Apakah anda yakin menghapus barang ini dari keranjang belanja?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
              <a id="hyperlink_remove" href="#">
                  <button type="button" class="btn btn-danger">Hapus Produk</button>
              </a>
          </div>
      </div>
  </div>
</div>
@include('layouts.js')
<!-- Add JS Here -->
<script>
  $(document).ready(function(){
    var global_ongkir = 0;
    var global_total_order = 0;
    calculateOngkir();
    calculateOrder();
    calculateTotal()
    $(".product_count").on("keypress keyup blur", function () {
        var val = $(this).val();
        val = val.replace(/[^\d]/g, "");;
        $(this).val(val);
        var product_id = Number($(this).siblings('.product_id').val());
        var price = Number($(this).siblings('.product_price').val());
        var subtotal = Number(val) * price;
        subtotal =  Intl.NumberFormat('de-DE').format(subtotal);
        document.getElementById("product_subtotal_"+product_id).innerHTML = '';
        document.getElementById("product_subtotal_"+product_id).innerHTML = subtotal;
        calculateOngkir();
        calculateOrder();
        calculateTotal();
    });

    $('.checkout-cta').on('click',function(){
      calculateOngkir();
      calculateOrder();
    });
    
    function calculateOngkir(){
      document.getElementById("shipping_fee_1").innerHTML = '';
      document.getElementById("shipping_fee_2").innerHTML = '';
      var total_weight = 0;
      $('.product_weight').each(function () {
        var weight = Number($(this).val());
        var count = Number($(this).siblings('.product_count').val());
        total_weight = total_weight + (weight * count);
      });
      ongkir = total_weight / 1000 * 20000;
      // $('#input_shipping_fee').val() = ongkir;
      global_ongkir = ongkir;
      ongkir = Intl.NumberFormat('de-DE').format(ongkir);
      document.getElementById("shipping_fee_1").innerHTML = ongkir;
      document.getElementById("shipping_fee_2").innerHTML = ongkir;
    }

    function calculateOrder(){
      document.getElementById("order_value").innerHTML = '';
      var total_order = 0;
      $('.product_price').each(function () {
        var price = Number($(this).val());
        var count = Number($(this).siblings('.product_count').val());
        total_order = total_order + (price * count);
      });
      
      global_total_order = total_order;
      total_order = Intl.NumberFormat('de-DE').format(total_order);
      document.getElementById("order_value").innerHTML = total_order;
    }
    function calculateTotal(){
      var total_amount = Number(global_total_order) + Number(global_ongkir);
      total_amount = Intl.NumberFormat('de-DE').format(total_amount);
      document.getElementById("total_amount").innerHTML = total_amount;
      document.getElementById("input_shipping_fee").value = global_ongkir;
    }

    
    function openRemoveModal(){
      $('#modalRemoveProduct').modal('toggle');
    }
    function closeRemoveModal(){
      $('#modalRemoveProduct').modal('hide');
    }

    $('.checkout-cta').on('click',function(){
      calculateOngkir();
      calculateOrder();
    });

    $('.remove-product').on('click',function(){
        let product_id = $(this).attr('product-id');
        let cart_id = $(this).attr('cart-id');
        $('#hyperlink_remove').attr('href','/cart/remove-product/'+cart_id+'/'+ product_id);
        openRemoveModal();
    });

    $('.close-modal').on('click',function(){
      closeRemoveModal();
    });
  });
</script>
<!-- End JS -->
@include('layouts.footer')