@extends('store.layouts.headerHome')

@section('content')
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
                        <h3>Halo,<span style="font-weight:bold">{{explode(' ', Auth::user()->name, 2)[0]}}</span> ayo isi detail toko anda</h3>
                        <form class="createStore-form" >
                            <div class="form-group form-email">
                                <label class="form-label mt-10">Email anda</label>
                                <span>{{Auth::user()->email}}</span>
                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label form-label-1">Masukkan Nama Toko dan Domain</label>
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
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label form-label-1">Masukkan Alamat Tokomu</label>
                                <label for="exampleInputEmail2">Provinsi dan Kota</label>
                                <div class="row">
                                    <div class="col-12 col-xl-6">
                                    <select class="custom-select" id="provinsi">
                                        <option selected></option>
                                    </select>
                                    </div>
                                    <div class="col-12 col-xl-6">
                                        <select class="custom-select" id="inputGroupSelect04">
                                            <option selected></option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <label for="exampleInputEmail2" style="margin-top:10px">Alamat toko</label>
                                <input type="email" class="form-control form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">Pastikan Alamat toko yang diisi sudah benar</small>

                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Agree to our Terms & Conditons</label>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn createStore-btn">Buat Toko Gratis</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="createStore" class="display-mobile">
    <div class="createStore-inner">
        <div class="container">
            <div class="row">
            <div class="col-12">
                    <div class="createStore-outer-form">
                        <h3>Halo,<span style="font-weight:bold">User</span> ayo isi detail toko anda</h3>
                        <form class="createStore-form" >
                            <div class="form-group form-email">
                                <label for="exampleInputEmail1" class="form-label mt-10">Masukkan Email anda</label>
                                <input type="email" class="form-control form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">Pastikan email yang diisi sudah benar</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label form-label-1">Masukkan Nama Toko dan Domain</label>
                                <label for="exampleInputEmail2">Nama toko</label>
                                <input type="email" class="form-control form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Toko Punya saya">
                                <small id="emailHelp" class="form-text text-muted">Pastikan nama toko yang diisi sudah benar</small>
                                <div class="row">
                                    <label for="exampleInputEmail2">Domain Toko</label>
                                    <div class="col-3" style="text-align:right" >
                                    <span class="form-domain" >dodolanku.id/</span>
                                    </div>
                                    <div class="col-9">
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="tokopunyasaya">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label form-label-1">Masukkan Alamat Tokomu</label>
                                <label for="exampleInputEmail2">Provinsi dan Kota</label>
                                <div class="row">
                                    <div class="col-6 col-xl-6">
                                    <select class="custom-select" id="provinsi">
                                        @foreach($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="col-6 col-xl-6">
                                        <select class="custom-select" id="inputGroupSelect05">
                                            <option selected></option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <label for="exampleInputEmail2" style="margin-top:10px">Alamat toko</label>
                                <input type="email" class="form-control form-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">Pastikan Alamat toko yang diisi sudah benar</small>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Agree to our Terms & Conditons</label>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn createStore-btn">Buat Toko Gratis</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('store.layouts.footer-home')
@endsection

