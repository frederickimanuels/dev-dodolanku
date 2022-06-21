<?php $data=[
    'title' => 'Tambah Produk Baru',
    'description' => 'Tambah Produk Baru @Dodolanku.id',
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
        <form method="POST" action="{{ route('store.product.store') }}" enctype="multipart/form-data">
            @csrf
            <style>
                .button-return-back{
                    text-decoration: none;
                    color: #03AC0E;
                    font-size: 1rem;
                }
            </style>
            <div class="row">
                <div class="col">
                    <h1>Tambahkan Produk</h1>
                </div>
                <div class="col" style="display: flex;justify-content:end;align-items:center;">
                    <a href="{{ route('store.index') }}" class="button-return-back">
                        <i class="fa-solid fa-caret-left"></i> Kembali ke halaman sebelumnya
                    </a>
                </div>
            </div>
            <div class="form-container-content">
                <div class="row">
                    <div class="col-xl-4 col-12 upload-image-text">
                        <div class="upload-text-inner">
                            <h2 class="upload-image-text-h2" >Foto Produk <span style="color:red">*</span></h2>
                            <p>Format Gambar .jpg .jpeg .png dan minimal 3 foto yang diupload, maksimal 2MB per foto</p>
                        </div>
                    </div>
                    <div class="col-xl-8 col-12">
                        <div class="upload-img">
                            <div class="row">
                                <div class="input-field">
                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
                                </div>
                            </div>
                            <input type="file" id="myfile" style="display: none;">
                        </div>
                    
                        @error('images')
                            <p class="help-block text-danger">Foto produk diperlukan</p>
                        @enderror
                        
                    </div>
                </div>
            </div>

            <div class="break-line-3"></div>

            <div class="form-container-content">
                <h3>Informasi Produk</h3>
                <div class="container">
                    <div class="upload-form-content">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label form-upload-label">Nama Produk <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product-name" name="product_name" placeholder="Isi nama produk.." value="{{ old('product_name') }}">
                                @error('product_name')
                                    <p class="help-block text-danger">Nama produk harus diisi minimal 5 karakter</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Kategori <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <select type="text" class="form-control" id="product-category" name="product_category">
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == old('product_category') ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_category')
                                <p class="help-block text-danger">Kategori produk harus dipilih</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Deskripsi Produk <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="product-product_description" name="product_description" placeholder="Deskripsikan produk ini secara singkat..">{{ old('product_description') }}</textarea>
                                @error('product_description')
                                    <p class="help-block text-danger">Deskripsi produk harus diisi minimal 5 karakter, maksimal 500 karakter</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Tentang Produk <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="product-about" name="product_about" rows="5" placeholder="Ceritakan tentang produk ini..">{{ old('product_about') }}</textarea>
                                @error('product_about')
                                    <p class="help-block text-danger">Tentang produk harus diisi minimal 10 karakter, maksimal 2000 karakter</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="break-line-3"></div>

            <div class="form-container-content">
                <h3>Detail Produk</h3>
                <div class="container">
                    <div class="upload-form-content">
                        {{-- <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label form-upload-label">Minimum Pemesanan <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product-min-order" name="product_min_order"  placeholder="Isi minimum pemesanan..">
                                @error('product_min_order')
                                    <p class="help-block text-danger">Minimum pemesanan harus diisi minimal 1</p>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group row" id="product-stock-container">
                            <label for="staticEmail" class="col-sm-2 col-form-label form-upload-label">Stock <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product-stock" name="product_stock"  placeholder="Isi jumlah stock.." value="{{ old('product_stock') }}">
                                @error('product_stock')
                                    <p class="help-block text-danger">Stock harus diisi minimal 1</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" id="product-price-container">
                            <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Harga <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product-price" name="product_price"  placeholder="Isi harga produk.." value="{{ old('product_price') }}">
                                @error('product_price')
                                    <p class="help-block text-danger">Harga produk harus diisi minimal Rp 100</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" id="product-weight-container">
                            <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Berat <span style="font-family:Montserrat-Light">(gram)</span><span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product-weight" name="product_weight" placeholder="Isi berat produk.." value="{{ old('product_weight') }}">
                                @error('product_weight')
                                    <p class="help-block text-danger">Berat produk harus diisi minimal 10 gram</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Ukuran</label> --}}
                            <div class="col-sm-9 form-upload-volume" style="padding-top:7px;">
                                *notes: Berat volume (gram) dapat dihitung dengan rumus panjang (cm) x lebar (cm) x tinggi (cm) / 6000
                            </div>
                            {{-- <div class="col-sm-3 form-upload-volume">
                                <label for="inputPassword" class="form-upload-label">Panjang</label>
                                <input type="text" class="form-control" id="product-category">
                            </div> --}}
                            {{-- <div class="col-sm-3 form-upload-volume">
                                <label for="inputPassword" class="form-upload-label">Lebar</label>
                                <input type="text" class="form-control" id="product-category">
                            </div>
                            <div class="col-sm-3 form-upload-volume">
                                <label for="inputPassword" class="form-upload-label">Tinggi</label>
                                <input type="text" class="form-control" id="product-category">
                            </div> --}}
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

<!-- Modal Add Varian -->
<div class="container">
    <div class="modal fade inputvarmodal" id="inputvarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Varian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="addVar" aria-describedby="addon-wrapping" autocomplete="off" placeholder="Masukkan nama varian">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                    <button type="button" id="save-var" data-dismiss="modal" class="btn btn-primary" disabled>Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Add Varian -->


@include('store.layouts.js')
<!-- Add Js Here -->
<script>
    $(document).ready(function(){
        $('.input-images-1').imageUploader();
    });
</script>
<!-- End JS -->
@include('store.layouts.footer-copyright')
</body>
</html>

