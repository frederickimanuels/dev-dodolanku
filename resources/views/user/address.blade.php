<?php $data=[
    'title' => 'Atur Alamat',
    'description' => 'Pengaturan Alamat Pengguna @Dodolanku.id',
    'keywords' => 'cart, online shop, business, haul',
    'author' => 'Dodolanku.id',
]; ?>

@include('user.layouts.header')

@include('layouts.navbar-home')

<section id="personal-information">
    <div class="container">
        <div class="container">
            <div class="row">
                @include('user.layouts.sidebarmenu')
                <div class="col-lg-9 col-12 personal-info-detail">
                    <h1 class="personal-info-h1">Alamat</h1>
                    <form method="POST" action="{{ route('user.address.store') }}">
                        @csrf
                        <div class="row form-list">
                            <div class="col">
                                <label for="description" class="profile-label">Alamat lengkap</label>
                                <input type="text" name="description" class="form-control profile-form" placeholder="Alamat lengkap" value="{{ Auth::user()->currentAddress()  ? Auth::user()->currentAddress()->description : '' }}">
                            </div>
                            {{-- <div class="col">
                                <input type="text" class="form-control profile-form" placeholder="Last name">
                            </div> --}}
                        </div>
                        <div class="row form-list">
                            <div class="col-xl-6 col-12">
                                <select class="form-control profile-form" name="province" id="province">
                                    <option value="" disabled {{ Auth::user()->currentAddress()  ? '' : 'selected'}}>Pilih Provinsi</option>
                                    @foreach($provinces as $province)
                                        <option {{ Auth::user()->currentAddress() ? Auth::user()->currentAddress()->province_id == $province->id  ? 'selected' : '' : ''}} value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                                @error('province')
                                    <p class="help-block text-danger">Provinsi harus dipilih</p>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-12 pt-3 pt-xl-0">
                                <input type="hidden" id="hidden_city" value="{{ Auth::user()->currentAddress() ? Auth::user()->currentAddress()->city_id ? Auth::user()->currentAddress()->city_id : '' : ''}}">
                                <select class="form-control profile-form" name="city" id="cities">
                                    <option value="" disabled selected>Pilih kota</option>
                                </select>
                                @error('city')
                                    <p class="help-block text-danger">Kota harus dipilih</p>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="row form-list">
                            <div class="col-6">
                                <input type="text" class="form-control profile-form" placeholder="Password">
                            </div>
                            <div class="col-6">
                                <!-- <input type="text" class="form-control profile-form" placeholder="Password"> -->
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary btn-profile">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@include('layouts.js')
<!-- Add JS Here -->
<script>
    $(document).ready(function(){
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
@include('layouts.footer')