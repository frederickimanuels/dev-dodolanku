@include('layouts.header')

@include('layouts.navbar-home')

<section id="shopping_cart" >
<main>
    <div class="basket">
      <!-- <div class="basket-labels">
        <ul>
          <li class="item item-heading">Item</li>
          <li class="price">Price</li>
          <li class="quantity">Quantity</li>
          <li class="subtotal">Subtotal</li>
        </ul>
      </div> -->
      <div id="details">
        <h1 class="cart-h1">Order</h1>
        @foreach($variants as $variant)
          <div class="basket-product">
            <div class="basket-item">
              <div class="product-image">
                <img src="{{asset('images/homepage/profile1.jpg')}}" alt="Placholder Image 2" class="product-frame">
              </div>
              <div class="product-details">
                <h1><strong>{{ $variant->product()->first()->name }}</strong></h1>
                <p><strong>{{ $variant->name == 'default' ? '' : $variant->name }}</strong></p>
              </div>
            </div>
            <div class="price">Rp {{number_format($variant->price,0,',','.')}}</div>
            <div class="quantity">
              <input type="text" value="{{ $variant->pivot->count }}" class="quantity-field">
            </div>
            <div class="subtotal">Rp {{number_format($variant->price * $variant->pivot->count,0,',','.')}}</div>
          </div>
        @endforeach
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
                          <h6 class="card-subtitle mb-2 text-muted">1-3 Hari</h6>
                          <p class="card-text">Rp.100.000</p>
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
          {{ $address->description }}</br>
          {{ $address->province . '-' . $address->city }}
          {{-- <select name="delivery-collection" class="summary-delivery-selection">
              <option value="0" selected="selected">Select Collection or Delivery</option>
             <option value="collection">Collection</option>
             <option value="first-class">Royal Mail 1st Class</option>
             <option value="second-class">Royal Mail 2nd Class</option>
             <option value="signed-for">Royal Mail Special Delivery</option>
          </select> --}}
        </div>
      </div>
      <h1 class="cart-h1" >Summary</h1>
      <div class="summary">
        <!-- <div class="summary-total-items"><span class="total-items"></span>Summary</div> -->
        <div class="summary-order-number">
          <div class="subtotal-title">Order Number</div>
          <div class="subtotal-order-number">121212</div>
          <!-- <div class="subtotal-value final-value" id="basket-subtotal">1211221212</div> -->
        </div>
        <div class="summary-promotional">
            <!-- <label for="promo-code">Have Promo Code?</label> -->
            <input id="promo-code" placeholder="Voucher Code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
            <button class="promo-code-cta">Apply</button>
        </div>
        <div class="summary-subtotal">
          <div class="subtotal-title">Order Amount</div>
          <div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
          <div class="subtotal-title">Shipping Fee</div>
          <div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
          <div class="subtotal-title">Discount</div>
          <div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
        </div>
        <div class="summary-total">
          <div class="total-title">Total Amount</div>
          <div class="total-value final-value" id="basket-total">130.00</div>
        </div>
        <div class="summary-checkout pt-5">
          <button class="checkout-cta">Payment</button>
        </div>
      </div>
    </aside>
  </main>

</section>

@include('layouts.js')
<!-- Add JS Here -->
<script>
  $(document).ready(function(){
    $('.checkout-cta').on('click',function(){
      calculateOngkir();
    });
    function calculateOngkir(){
      var formData = {
        origin: 1,
        destination: 200,
        weight: 2000,
        courier: 'jne',
      };
      $.ajax({
        type: "POST",
        url: "https://api.rajaongkir.com/starter/cost",
        headers: {
            'Content-Type':'application/x-www-form-urlencoded',
            'key':'f17773ff1279822ff97bb9ba2767d682',
        },
        data: formData,
        dataType: "json",
        encode: true,
        success: function (result) {
          console.log(result);
        }
      });
    }
  });
</script>
<!-- End JS -->
@include('layouts.footer')