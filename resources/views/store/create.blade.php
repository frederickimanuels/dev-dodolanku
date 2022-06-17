@include('store.layouts.header')

@include('layouts.navbar-home')
<style>
  div[data-acc-content] { display: none;  }
  div[data-acc-step]:not(.open) { 
        /* background: #f2f2f2;     */
        color: green;
    }
  /* div[data-acc-step]:not(.open) h5 { color: #777;  } */
  /* div[data-acc-step]:not(.open) .badge-primary { background: #ccc;  } */
</style>
<section id="createStore" class="display-desktop">
    <div class="createStore-inner">
        <div class="container">
            <div class="row">
                <div class="col-6 col-xl-6 createStore-img" style="position:relative">
                    <img src="{{asset('images/homepage/laptop-1.png')}}" alt="">
                </div>
                <div class="col-6 col-xl-6">
                    <div class="createStore-outer-form">
                        <div class="row">
                            <div class="col-1 border-line">
                            <img src="{{asset('images/homepage/elips.png')}}" alt="">

                            </div>
                            <div class="col-11">
                                <h3>Halo,<span style="font-weight:bold">{{explode(' ', Auth::user()->name, 2)[0]}}</span> ayo isi detail toko anda</h3>
                                <form class="createStore-form" id="form-1" method="POST" action="{{ route('store.store') }}">
                                    @csrf
                                    <div class="form-group form-email">
                                        <label class="form-label mt-10">Email anda</label>
                                        <span>{{Auth::user()->email}}</span>
                                    </div>
                                    <div class="form-group" id="form-create" data-acc-step>
                                        <label for="store_name" class="form-label form-label-1" ata-acc-title>Nama Toko dan Link Toko</label>
                                        <div data-acc-content>
                                            <label for="store_name">Nama toko</label>
                                            <input type="text" class="form-control form-input" id="store_name" aria-describedby="store_name" placeholder="Masukkan nama toko" name="store_name">
                                            @error('store_name')
                                                <p class="help-block text-danger">Nama toko harus diisi</p>
                                            @enderror
                                            <small id="store_name" class="form-text text-muted">Pastikan nama toko yang diisi sudah benar</small>
                                            <div class="row">
                                                <label for="store_slug">Link Toko</label>
                                                <div class="col-3" style="text-align:right" >
                                                <span class="form-domain">dodolanku.id/</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" id="store_slug" aria-describedby="store_slug" placeholder="Masukkan link toko" name="store_slug">
                                                    @error('store_slug')
                                                        <p class="help-block text-danger">Link toko harus diisi</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="form-create" data-acc-step>
                                        <label class="form-label form-label-1" ata-acc-title>Masukkan Alamat Tokomu</label>
                                        <div data-acc-content>
                                            <label for="province">Provinsi dan Kota</label>
                                            <div class="row">
                                                <div class="col-12 col-xl-6">
                                                <select class="custom-select" name="province" id="province">
                                                    <option value="" disabled selected>Pilih Provinsi</option>
                                                    @foreach($provinces as $province)
                                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('province')
                                                    <p class="help-block text-danger">Provinsi harus dipilih</p>
                                                @enderror
                                                </div>
                                                <div class="col-12 col-xl-6">
                                                    <select class="custom-select" name="city" id="cities">
                                                        <option value="" disabled selected>Pilih Kota</option>
                                                    </select>
                                                    @error('city')
                                                        <p class="help-block text-danger">Kota harus dipilih</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <label for="store_address" style="margin-top:10px">Alamat toko</label>
                                            <textarea class="form-control form-input" id="store_address" aria-describedby="store_address" placeholder="Masukkan alamat toko" name="store_address"></textarea>
                                            @error('store_address')
                                                <p class="help-block text-danger">Alamat harus diisi</p>
                                            @enderror
                                            <small style="display:flex;margin-bottom:10px" class="form-text text-muted">Pastikan Alamat toko yang diisi sudah benar</small>
                                        </div>
                                    </div>
                                    <div class="form-check" id="form-create" data-acc-step>
                                        <div data-acc-content style="position:relative">
                                            <input type="checkbox" class="form-check-input" id="terms" name="terms">
                                            <label class="form-check-label" for="terms">Agree to our Terms & Conditons</label>
                                            @error('terms')
                                                <p class="help-block text-danger">Anda harus menyetujui syarat dan ketentuan</p>
                                            @enderror
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('store.layouts.js')
<!-- Add Js Here -->
<script>
    
    // $(function() {
    //     $( "#form" ).accordionForm({
    //         mode: 'accordion',
    //         autoButtonsNextClass: 'btn btn-primary float-right',
    //         autoButtonsPrevClass: 'btn btn-light',
    //         stepNumberClass: 'badge badge-pill badge-primary mr-1',
    //         onSubmit: function() {
    //         alert('Form submitted!');
    //         return true;
    //         }
    //     });
    // });
    $(function(){
        $("#form-1").accWizard({
            autoButtons: true,
            autoButtonsNextClass: "NextBTN",
            autoButtonsPrevClass: "PrevBTN",
            autoButtonsShowSubmit: true,
            autoButtonsSubmitText: 'Submit',
            autoButtonsEditSubmitText: 'Saveee',

        });
        $("#form-1").accWizard({
            scrollPadding: 0,
            start:0,
            stepNumbers:true,
            stepNumberClass:'',
        });
    });
    $(document).ready(function(){
        $("#form-create").click(function(){
            // if(document.getElementById("store_name").value.length == 0)
            // {
                
            // }
            if($('data-acc-step').hasClass("open")){
                    console.log("aaa")
                }
        });
    });

    $("#province").on("change", function () {
        var province_id = $(this).val();
        $.ajax({
            type: "GET",
            url: "/location/getCities/" + province_id,
            dataType: "JSON",
            success: function(data){
                $("#cities").html('<option value="" disabled selected>Pilih Kota</option>');
                $.each( data, function( key, value ) {
                    $("#cities").append('"<option value="'+ value.id + '">' + value.type + ' ' + value.name + '</option>"');
                });
            },
            error: function( error ){
                alert( error );
            }
        });
    });
</script>

<!-- End JS -->

@include('store.layouts.footer-copyright')

</body>
</html>

