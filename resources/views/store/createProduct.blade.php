@include('store.layouts.header')

@include('store.layouts.navbar-home')

<section id="createproduct" class="display-desktop">
    <div class="container create-product-container">
        <form action="">
        <h1>Tambahkan Produk</h1>
        <div class="form-container-content">
            <div class="row">
                <div class="col-4 upload-image-text">
                    <div class="upload-text-inner">
                        <h2 class="upload-image-text-h2" >Foto Produk <span style="color:red">*</span></h2>
                        <p>Format Gambar .jpg .jpeg .png dan ukuran minimum 300 x 300px minimal 3 foto yang diupload</p>
                    </div>
                </div>
                <div class="col-8">
                    <div class="upload-img">
                        <div class="row">
                            <div class="col-3">
                                <img id="image-upload" src="http://via.placeholder.com/150" style="border-radius:8px"/>
                            </div>
                            <div class="col-3">
                                <img id="image-upload" src="http://via.placeholder.com/150" style="border-radius:8px"/>
                            </div>
                            <div class="col-3">
                                <img id="image-upload" src="http://via.placeholder.com/150" style="border-radius:8px"/>
                            </div>
                            <div class="col-3">
                                <img id="image-upload" src="http://via.placeholder.com/150" style="border-radius:8px"/>
                            </div>
                        </div>
                        <input type="file" id="myfile" style="display: none;">
                        <!-- <input type="submit" value="Upload Image" name="submit"> -->
                    </div>
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
                        <input type="text" class="form-control" id="product-name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Kategori <span style="color:red">*</span></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="product-category">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Kode Produk</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="product-category">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Deskripsi Produk <span style="color:red">*</span></label>
                        <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="product-category"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Link Url Video</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="product-category">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="break-line-3"></div>

        <div class="form-container-content">
            <h3>Harga Produk</h3>
            <div class="container">
                <div class="upload-form-content">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label form-upload-label">Minimum Pemesanan</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="product-name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Harga <span style="color:red">*</span></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="product-category">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Berat <span style="font-family:Montserrat-Light">(gram)</span><span style="color:red">*</span></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="product-category">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Volume</label>
                        <div class="col-sm-3 form-upload-volume">
                            <label for="inputPassword" class="form-upload-label">Panjang</label>
                            <input type="text" class="form-control" id="product-category">
                        </div>
                        <div class="col-sm-3 form-upload-volume">
                            <label for="inputPassword" class="form-upload-label">Lebar</label>
                            <input type="text" class="form-control" id="product-category">
                        </div>
                        <div class="col-sm-3 form-upload-volume">
                            <label for="inputPassword" class="form-upload-label">Tinggi</label>
                            <input type="text" class="form-control" id="product-category">
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

        <div class="break-line-3"></div>

        <div class="form-container-content product-varian">
            <div class="product-varian-text">
                <h2 class="upload-image-text-h2">Varian Produk</h2>
                <p>Tambahkan varian seperti warna, ukuran, atau lainnya. maksimum 2 tipe varian.</p>
            </div>
            <div class="product-varian-btn">
                <a href="">
                    <i class="fa-solid fa-plus"></i>
                    <span>Tambah</span>
                </a>
            </div>
        </div>
        <!-- <div class="break-line-3" style="margin: 0px;border:30px solid #E5E5E5;"></div> -->
        </form>
    </div>
</section>


@include('store.layouts.js')
<!-- Add Js Here -->


<!-- End JS -->
@include('store.layouts.footer-copyright')
</body>
</html>

