<?php $data=[
    'title' => 'Pengaturan Toko',
    'description' => 'Pengaturan Toko @Dodolanku.id',
    'keywords' => 'cart, online shop, business, haul',
    'author' => 'Dodolanku.id',
]; ?>

@include('store.layouts.header')
@include('layouts.navbar-home')

<style>
    .uploaded{
        height: 150px;
    }
    /* .modal-dialog{
        max-width: 300px;
    } */
</style>

<section id="createproduct">
    <div class="container create-product-container">
        <form method="POST" action="{{ route('store.update') }}">
            @csrf
            <h1>Pengaturan Toko</h1>

            <div class="break-line-3"></div>

            <div class="form-container-content">
                <h3>Informasi Toko</h3>
                <div class="container">
                    <div class="upload-form-content">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label form-upload-label">Nama Toko <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="store-name" name="store_name" placeholder="Isi nama toko.." value="{{ $store->name }}">
                                @error('store_name')
                                    <p class="help-block text-danger">Nama toko harus diisi, maksimal 60 karakter</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label form-upload-label">Link Toko</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="dodolanku.id/{{ $store->slug }}" disabled="disabled" style="color: black;background-color:lightgray">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Lokasi Toko <span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <?php $provinces = App\Province::get(); ?>
                                <select type="text" class="form-control" name="province" id="province">
                                    <option value="" disabled {{ $store->currentAddress()->first()  ? '' : 'selected'}}>Pilih Provinsi</option>
                                    @foreach($provinces as $province)
                                        <option {{ $store->currentAddress()->first() ? $store->currentAddress()->first()->province_id == $province->id  ? 'selected' : '' : ''}} value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                                @error('province')
                                    <p class="help-block text-danger">Provinsi harus dipilih</p>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <input type="hidden" id="hidden_city" value="{{ $store->currentAddress()->first() ? $store->currentAddress()->first()->city_id ? $store->currentAddress()->first()->city_id : '' : ''}}">
                                <select type="text" class="form-control" name="city" id="cities">
                                    <option value="" disabled selected>Pilih kota</option>
                                </select>
                                @error('province')
                                    <p class="help-block text-danger">Kota harus dipilih</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Alamat Toko <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="store_address" placeholder="Tulis alamat lengkap toko..">{{ $store->currentAddress()->first() ? $store->currentAddress()->first()->description : ''}}</textarea>
                                @error('store_address')
                                    <p class="help-block text-danger">Alamat toko harus diisi, minimal 10 karakter</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-save-product" >
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</section>


@include('store.layouts.js')
<!-- Add Js Here -->
<script>
    $(document).ready(function(){
        $('.input-images-1').imageUploader();

        function ajaxCity(province_id,selected){
            $.ajax({
                type: "GET",
                url: "/location/getCities/" + province_id,
                dataType: "JSON",
                success: function(data){
                    $("#cities").html('<option value="" disabled selected>Pilih Kota</option>');
                    $.each( data, function( key, value ) {
                        if(selected == value.id){
                            $("#cities").append('"<option selected value="'+ value.id + '">' + value.type + ' ' + value.name + '</option>"');
                        }else{
                            $("#cities").append('"<option value="'+ value.id + '">' + value.type + ' ' + value.name + '</option>"');
                        }
                    });
                },
                error: function( error ){
                    // alert( error );
                }
            });
        }

        if($("#province").val() != ''){
            ajaxCity($("#province").val(), $("#hidden_city").val());
        }
        
        $("#province").on("change", function () {
            var province_id = $(this).val();
            ajaxCity(province_id,false);
        });
    });
</script>
<!-- End JS -->
@include('store.layouts.footer-copyright')
</body>
</html>

