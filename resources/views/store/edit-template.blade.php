<?php $data=[
    'title' => 'Pengaturan Template',
    'description' => 'Pengaturan Template Toko @Dodolanku.id',
    'keywords' => 'cart, online shop, business, haul',
    'author' => 'Dodolanku.id',
]; ?>

@include('store.layouts.header')
<style>
.accordion {
  background-color: #189AB4!important;
  color: #FFFFFF;
  /* cursor: pointer; */
  padding: 18px 18px 18px 0px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  transition: 0.4s;
  font-size: 16px;
  font-family: Montserrat-Bold;
}
.accordion:hover{
    color: #000000;
}
.non-accordeon{
    background-color: #189AB4!important;
    color: #FFFFFF;
    /* cursor: pointer; */
    padding: 18px 18px 18px 0px;
    width: 100%;
    /* border: none;
    text-align: left;
    outline: none; */
    font-size: 16px;
    font-family: Montserrat-Bold;
}
ul{
    padding-left: 0rem;
}
li{
    font-size: 12px;
    cursor: pointer;
    padding: 5px 0px
}
li:hover{
    color: #000000;
}
.active, .accordion:hover {
  /* background-color: #ccc;  */

}

.panel {
  padding: 0 18px;
  display: none;
  background-color: #189AB4!important;
  overflow: hidden;
}
#accordionSidebar{
    width: 80%;
}
.template-wrapper{
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    padding: 30px 30px;
}
#content-wrapper{
    background: #FFFFFF !important;
}
#submit-btn{
    margin-left: auto;
}
.with-reset{
    justify-content:flex-end;
}
.with-reset #submit-btn{
    margin-left: 0;
}
h2{
    font-size: 24px;
    font-family: Montserrat-Bold;
}
h3{
    font-size: 18px;
    font-family: Montserrat-Bold;
}
p{
    font-size: 18px;
    font-family: Montserrat-Medium;
}
input{
    border-radius: 0;
    width: 100%;
}
.custom-file-wrapper{
    margin: 10px 0;
}
label{
    font-family: Montserrat-Bold;
    font-size: 16px;
}
#input-banner-homepage{
    display: none;
}
#input-banner-homepage-category{
    display: none;
}
#input-banner-search{
    display: none;
}
#input-color-text{
    display: none;
}
#input-color-bg{
    display: none;
}
.btn-non-accordeon li{
    font-size: 16px;
    padding: 18px 18px 18px 0px;
}
.btn-non-accordeon li:hover{
    color: black;
}
</style>
<div id="wrapper">
        @include('store.layouts.sidebar-template')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('store.layouts.navbar')
                <div class="container-fluid">
                    <div class="container">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span>{{ session('status') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{-- <span>Gagal memperbaharui template</span> --}}
                                {{ implode('', $errors->all('<div>:message</div>')) }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="template-wrapper" id="input-logo">
                            <form action="{{ route('store.template.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="input_type" value="store_logo">
                                <input type="hidden" id="store_logo_preload" value="{{ $store->templateconfigs()->where('type','store_logo')->first() ?  $store->templateconfigs()->where('type','store_logo')->first()->images()->first()->filepath : ''  }}">
                                <div class="form-group">
                                <h2>Ganti Logo Toko</h2>
                                <p>Maksimal Ukuran 300x300</p>
                                    <div class="upload-img">
                                        <div class="row">
                                            <div class="input-field">
                                                <div class="input-images-logo" style="padding-top: .5rem;"></div>
                                            </div>
                                        </div>
                                        <input type="file" id="input-logo" style="display: none;">
                                    </div>
                                </div>
                                <div style="display:flex">
                                    <button type="submit" class="btn btn-primary mt-3" id="submit-btn">Submit</button>
                                </div>
                                @error('images.*')
                                    <p class="help-block text-danger">Image maksimal berukuran 2MB dengan format jpeg,png,jpg,svg</p>
                                @enderror
                            </form>
                        </div>
                        <div class="template-wrapper" id="input-banner-homepage">
                            <form action="{{ route('store.template.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                <h2>Ganti Banner Homepage</h2>
                                <p>Maksimal 5 gambar</p>
                                <input type="hidden" name="input_type" value="store_banner">
                                <div class="upload-img">
                                    <div class="row">
                                        <div class="input-field">
                                            <div class="input-images-banner" style="padding-top: .5rem;"></div>
                                        </div>
                                    </div>
                                    <input type="file" id="5" style="display: none;">
                                </div>
                                </div>
                                <div style="display:flex">
                                    <button type="submit" class="btn btn-primary mt-3" id="submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="template-wrapper" id="input-banner-homepage-category">
                            <form >
                                <div class="form-group">
                                <h2 for="exampleInputEmail1">Upload Banner Kategori</h2>
                                <p>Minimal Ukuran 1920x1080 dan Maksimal 5</p>
                                <div class="custom-file-wrapper">
                                    <div class="custom-file">
                                        <label for="customFile">Fashion</label>
                                        <div class="upload-img">
                                            <div class="row">
                                                <div class="input-field">
                                                    <div class="input-images-3" style="padding-top: .5rem;"></div>
                                                </div>
                                            </div>
                                            <input type="file" id="myfile" style="display: none;">
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-file-wrapper">
                                    <div class="custom-file">
                                        <label for="customFile">Mainan Anak-Anak</label>
                                        <div class="upload-img">
                                            <div class="row">
                                                <div class="input-field">
                                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
                                                </div>
                                            </div>
                                            <input type="file" id="myfile" style="display: none;">
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-file-wrapper">
                                    <div class="custom-file">
                                        <label for="customFile">Olahraga</label>
                                        <div class="upload-img">
                                            <div class="row">
                                                <div class="input-field">
                                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
                                                </div>
                                            </div>
                                            <input type="file" id="myfile" style="display: none;">
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-file-wrapper">
                                    <div class="custom-file">
                                        <label for="customFile">Elektronik</label>
                                        <div class="upload-img">
                                            <div class="row">
                                                <div class="input-field">
                                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
                                                </div>
                                            </div>
                                            <input type="file" id="myfile" style="display: none;">
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-file-wrapper">
                                    <div class="custom-file">
                                        <label for="customFile">Ibu Rumah-Tangga</label>
                                        <div class="upload-img">
                                            <div class="row">
                                                <div class="input-field">
                                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
                                                </div>
                                            </div>
                                            <input type="file" id="myfile" style="display: none;">
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div style="display:flex">
                                    <button type="submit" class="btn btn-primary mt-3" id="submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="template-wrapper" id="input-banner-search">
                            <form action="{{ route('store.template.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                <input type="hidden" name="input_type" value="store_banner">
                                <h2 for="exampleInputEmail1">Ganti Banner Daftar Produk</h2>
                                <p>Maksimal 1 gambar</p>
                                <div class="upload-img">
                                    <div class="row">
                                        <div class="input-field">
                                            <div class="input-images-search" style="padding-top: .5rem;"></div>
                                        </div>
                                    </div>
                                    <input type="file" id="myfile" style="display: none;">
                                </div>
                                </div>
                                <div style="display:flex">
                                    <button type="submit" class="btn btn-primary mt-3" id="submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="template-wrapper" id="input-color-text">
                            <form method="POST" action="{{ route('store.template.update') }}">
                                @csrf
                                <div class="form-group">
                                    <h2 for="exampleInputEmail1">Ganti Warna Text</h2>
                                    <input type="hidden" name="input_type" value="store_text">
                                    <p>Silahkan Merubah Warna Text Sesuai dengan Keinginanmu</p>
                                    <div class="row">
                                        @if($store->templateconfigs()->where('type','store_text')->first())
                                            <?php $i = 1;?>
                                            @foreach($store->templateconfigs()->where('type','store_text')->get() as $store_text)
                                                <div class="col-3">
                                                    <div class="custom-file">
                                                        <label for="favcolor">Text {{ $i }}</label>
                                                        <input type="color" id="favcolor" name="color[]" value="{{ $store_text->extra }}"><br><br>
                                                    </div>
                                                </div>
                                                <?php $i+=1;?>
                                            @endforeach
                                        @else
                                            <div class="col-3">
                                                <div class="custom-file">
                                                    <label for="favcolor">Text 1</label>
                                                    <input type="color" id="favcolor" name="color[]" value="#ff0000"><br><br>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="custom-file">
                                                    <label for="favcolor">Text 2</label>
                                                    <input type="color" id="favcolor" name="color[]" value="#ff0000"><br><br>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="custom-file">
                                                    <label for="favcolor">Text 3</label>
                                                    <input type="color" id="favcolor" name="color[]" value="#ff0000"><br><br>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="custom-file">
                                                    <label for="favcolor">Text 4</label>
                                                    <input type="color" id="favcolor" name="color[]" value="#ff0000"><br><br>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div style="display:flex;" class="with-reset">
                                    <a href="{{ route('store.template.reset-text') }}" class="btn btn-info mt-3" style="margin-right: 10px; text-decoration:none; color:white; font-weight:bold">Kembalikan ke awal</a>
                                    <button type="submit" class="btn btn-primary mt-3" id="submit-btn">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <div class="template-wrapper" id="input-color-bg">
                            <form method="POST" action="{{ route('store.template.update') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="input_type" value="store_bg">
                                    <h2 for="exampleInputEmail1">Ganti Warna Background</h2>
                                    <p>Silahkan Merubah Warna Background Sesuai dengan Keinginanmu</p>
                                    <div class="row">
                                        @if($store->templateconfigs()->where('type','store_bg')->first())
                                            <?php $i = 1;?>
                                            @foreach($store->templateconfigs()->where('type','store_bg')->get() as $store_bg)
                                                <div class="col-3">
                                                    <div class="custom-file">
                                                        <label for="favcolor">Background {{ $i }}</label>
                                                        <input type="color" id="favcolor" name="bg_color[]" value="{{ $store_bg->extra }}"><br><br>
                                                    </div>
                                                </div>
                                                <?php $i+=1;?>
                                            @endforeach
                                        @else
                                            <div class="col-3">
                                                <div class="custom-file">
                                                    <label for="favcolor">Background 1</label>
                                                    <input type="color" id="favcolor" name="bg_color[]" value="#ff0000"><br><br>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="custom-file">
                                                    <label for="favcolor">Background 2</label>
                                                    <input type="color" id="favcolor" name="bg_color[]" value="#ff0000"><br><br>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="custom-file">
                                                    <label for="favcolor">Background 3</label>
                                                    <input type="color" id="favcolor" name="bg_color[]" value="#ff0000"><br><br>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="custom-file">
                                                    <label for="favcolor">Background 4</label>
                                                    <input type="color" id="favcolor" name="bg_color[]" value="#ff0000"><br><br>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div style="display:flex" class="with-reset">
                                    <a href="{{ route('store.template.reset-bg') }}" class="btn btn-info mt-3" style="margin-right: 10px; text-decoration:none; color:white; font-weight:bold">Kembalikan ke awal</a>
                                    <button type="submit" class="btn btn-primary mt-3" id="submit-btn">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

    
@include('store.layouts.js')
<!-- JS add here -->
<script>
    $(document).ready(function(){
        $("#btn-logo").click(function(){
            $("#input-logo").show();
            $("#input-banner-homepage").hide();
            $("#input-banner-homepage-category").hide();
            $("#input-banner-search").hide();
            $("#input-color-text").hide();
            $("#input-color-bg").hide();
        });
        $("#btn-banner-home").click(function(){
            $("#input-logo").hide();
            $("#input-banner-homepage").show();
            $("#input-banner-homepage-category").hide();
            $("#input-banner-search").hide();
            $("#input-color-text").hide();
            $("#input-color-bg").hide();
        });
        $("#btn-banner-search").click(function(){
            $("#input-logo").hide();
            $("#input-banner-homepage").hide();
            $("#input-banner-homepage-category").show();
            $("#input-banner-search").hide();
            $("#input-color-text").hide();
            $("#input-color-bg").hide();
        });
        $("#btn-banner-category").click(function(){
            $("#input-logo").hide();
            $("#input-banner-homepage").hide();
            $("#input-banner-homepage-category").hide();
            $("#input-banner-search").show();
            $("#input-color-text").hide();
            $("#input-color-bg").hide();
        });
        $("#btn-bg-color").click(function(){
            $("#input-logo").hide();
            $("#input-banner-homepage").hide();
            $("#input-banner-homepage-category").hide();
            $("#input-banner-search").hide();
            $("#input-color-text").show();
            $("#input-color-bg").hide();
        });
        $("#btn-text-color").click(function(){
            $("#input-logo").hide();
            $("#input-banner-homepage").hide();
            $("#input-banner-homepage-category").hide();
            $("#input-banner-search").hide();
            $("#input-color-text").hide();
            $("#input-color-bg").show();
        });

        $("#input-logo").on("change", function() {
            if ($("#input-logo")[0].files.length > 1) {
                alert("You can select only 1 images");
            }
            // else {
            //     $("#imageUploadForm").submit();
            // }
        });
        $('.input-images-logo').imageUploader({});
        $('.input-images-banner').imageUploader({});
        $('.input-images-search').imageUploader({});
        
        
        // $('.input-images-1').imageUploader({
        //     preloaded: preloaded,
        //     imagesInputName: 'photos',
        //     preloadedInputName: 'old'
        // });
        
        // $('.input-images-2').imageUploader({
        //     preloaded: preloaded,
        //     imagesInputName: 'photos',
        //     preloadedInputName: 'old'
        // });
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                panel.style.display = "none";
                } else {
                panel.style.display = "block";
                }
            });
        }
    });



</script>
<!-- END JS -->
@include('store.layouts.footer-copyright')
</body>
</html>