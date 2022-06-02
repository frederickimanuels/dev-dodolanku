@include('store.layouts.header')

@include('store.layouts.navbar-home')

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
                                
                            </div>
                            <div class="col-11">
                                <h3>Halo,<span style="font-weight:bold">{{explode(' ', Auth::user()->name, 2)[0]}}</span> ayo isi detail toko anda</h3>
                                <form class="createStore-form" id="form-1" >
                                    <div class="form-group form-email">
                                        <label class="form-label mt-10">Email anda</label>
                                        <span>{{Auth::user()->email}}</span>
                                    </div>
                                    <div class="form-group" data-acc-step>
                                        <label for="exampleInputEmail1" class="form-label form-label-1" ata-acc-title>Masukkan Nama Toko dan Domain</label>
                                        <div data-acc-content>
                                            <label for="exampleInputEmail2">Nama toko</label>
                                            <input type="email" class="form-control form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama toko">
                                            <small id="emailHelp" class="form-text text-muted">Pastikan nama toko yang diisi sudah benar</small>
                                            <div class="row">
                                                <label for="exampleInputEmail2">Domain Toko</label>
                                                <div class="col-3" style="text-align:right" >
                                                <span class="form-domain" >dodolanku.id/</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan link toko">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" data-acc-step>
                                        <label for="exampleInputEmail1" class="form-label form-label-1" ata-acc-title>Masukkan Alamat Tokomu</label>
                                        <div data-acc-content>
                                            <label for="exampleInputEmail2">Provinsi dan Kota</label>
                                            <div class="row">
                                                <div class="col-12 col-xl-6">
                                                <select class="custom-select" name="provinsi">
                                                    <option value="" disabled selected>Pilih Provinsi</option>
                                                    @foreach($provinces as $province)
                                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                                <div class="col-12 col-xl-6">
                                                    <select class="custom-select" name="city">
                                                        <option value="" disabled selected>Pilih Kota</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <label for="exampleInputEmail2" style="margin-top:10px">Alamat toko</label>
                                            <input type="email" class="form-control form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                            <small style="display:flex;margin-bottom:10px" id="emailHelp" class="form-text text-muted">Pastikan Alamat toko yang diisi sudah benar</small>
                                        </div>
                                    </div>
                                    <div class="form-check" data-acc-step>
                                        <div data-acc-content style="position:relative">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Agree to our Terms & Conditons</label>
                                        </div>
                                    </div>
                                    <!-- <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn createStore-btn">Buat Toko Gratis</button>
                                    </div> -->
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
</script>

<!-- End JS -->
@include('store.layouts.footer')

