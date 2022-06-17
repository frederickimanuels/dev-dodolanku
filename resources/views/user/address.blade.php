@include('user.layouts.header')

@include('layouts.navbar-home')

<section id="personal-information">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 left-profile">
                    <div class="img-container">
                        <div class="img-inner">
                            <img src="{{asset('images/homepage/profile1.jpg')}}" alt="Avatar" class="img-profile-big">
                        </div>
                    </div>
                      <h2 class="profile-name" >{{ Auth::user()->name }}</h2>
                      <ul class="profile-menu-list">
                            {{-- <li>Wallet</li> --}}
                            <li>
                                <a href="{{ route('user.profile') }}" style="text-decoration: none;color:inherit">Profile</a>
                            </li>
                            <li>Orders</li>
                            <li>
                                <a href="{{ route('user.address') }}" style="text-decoration: none;color:inherit">Address</a>
                            </li>
                            {{-- <li>Payment Methods</li> --}}
                      </ul>
                </div>
                <div class="col-lg-9 col-12 personal-info-detail">
                    <h1 class="personal-info-h1">Alamat</h1>
                    <form action="">
                        <div class="row form-list">
                            <div class="col">
                                <label for="description" class="profile-label">Alamat lengkap</label>
                                <input type="text" name="description" class="form-control profile-form" placeholder="Alamat lengkap" value="{{ $address ? $address->description : '' }}">
                            </div>
                            {{-- <div class="col">
                                <input type="text" class="form-control profile-form" placeholder="Last name">
                            </div> --}}
                        </div>
                        <div class="row form-list">
                            <div class="col-xl-6 col-12">
                                <select class="form-control profile-form" name="province" id="province">
                                    <option value="" disabled selected>Pilih Provinsi</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                                @error('province')
                                    <p class="help-block text-danger">Provinsi harus dipilih</p>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-12 pt-3 pt-xl-0">
                                <select class="form-control profile-form" name="city" id="city">
                                    <option value="" disabled selected>Pilih kota</option>
                                    {{-- @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach --}}
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
    });
</script>
<!-- End JS -->
@include('layouts.footer')