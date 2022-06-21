<?php $data=[
    'title' => 'Tambah Tips Baru',
    'description' => 'Tambah Tips Baru @Dodolanku.id',
    'keywords' => 'cart, online shop, business, haul',
    'author' => 'Dodolanku.id',
]; ?>

@include('admin.layouts.header')
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
        <form method="POST" action="{{ route('admin.tips.store') }}" enctype="multipart/form-data">
            @csrf
            <h1>Tambahkan Tips</h1>
            <div class="form-container-content">
                <div class="row">
                    <div class="col-xl-4 col-12 upload-image-text">
                        <div class="upload-text-inner">
                            <h2 class="upload-image-text-h2" >Banner Tips<span style="color:red">*</span></h2>
                            <p>1 Gambar berformat .jpg .jpeg .png, berukuran 500x200</p>
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
                            <p class="help-block text-danger">Banner tips diperlukan</p>
                        @enderror
                        
                    </div>
                </div>
            </div>

            <div class="break-line-3"></div>

            <div class="form-container-content">
                <h3>Informasi Tips</h3>
                <div class="container">
                    <div class="upload-form-content">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label form-upload-label">Judul <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product-name" name="title" placeholder="Isi judul tips.." value="{{ old('product_name') }}">
                                @error('title')
                                    <p class="help-block text-danger">Judul harus diisi</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Deskripsi <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="product-product_description" name="description" placeholder="Isi deskripsi tips.." rows="5">{{ old('product_description') }}</textarea>
                                @error('description')
                                    <p class="help-block text-danger">Deskripsi harus diisi</p>
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

