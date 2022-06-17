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
</style>
<div id="wrapper">
        @include('store.layouts.sidebar-template')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('store.layouts.navbar')
                <div class="container-fluid">
                    <div class="container">
                        <div class="template-wrapper" id="input-logo">
                            <form>
                                <div class="form-group">
                                <h2 for="exampleInputEmail1">Input Logo Toko</h2>
                                <p>Maksimal Ukuran 300x300</p>
                                    <div class="upload-img">
                                        <div class="row">
                                            <div class="input-field">
                                                <div class="input-images-1" style="padding-top: .5rem;"></div>
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
                        <div class="template-wrapper" id="input-banner-homepage">
                            <form>
                                <div class="form-group">
                                <h2 for="exampleInputEmail1">Input Banner Homepage</h2>
                                <p>Minimal Ukuran 1920x1080</p>
                                <div class="upload-img">
                                    <div class="row">
                                        <div class="input-field">
                                            <div class="input-images-1" style="padding-top: .5rem;"></div>
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
                        <div class="template-wrapper" id="input-banner-homepage-category">
                            <form>
                                <div class="form-group">
                                <h2 for="exampleInputEmail1">Upload Banner Kategori</h2>
                                <p>Minimal Ukuran 1920x1080 dan Maksimal 5</p>
                                <div class="custom-file-wrapper">
                                    <div class="custom-file">
                                        <label for="customFile">Fashion</label>
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
                            <form>
                                <div class="form-group">
                                <h2 for="exampleInputEmail1">Input Banner Search</h2>
                                <p>Minimal Ukuran 1920x1080</p>
                                <div class="upload-img">
                                    <div class="row">
                                        <div class="input-field">
                                            <div class="input-images-1" style="padding-top: .5rem;"></div>
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
                            <form>
                                <div class="form-group">
                                    <h2 for="exampleInputEmail1">Input Color Text</h2>
                                    <p>Silahkan Merubah Warna Sesuai dengan Keinginanmu</p>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="custom-file">
                                                <label for="favcolor">Text 1</label>
                                                <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="custom-file">
                                                <label for="favcolor">Text 2</label>
                                                <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="custom-file">
                                                <label for="favcolor">Text 3</label>
                                                <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="custom-file">
                                                <label for="favcolor">Text 4</label>
                                                <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div style="display:flex">
                                    <button type="submit" class="btn btn-primary mt-3" id="submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="template-wrapper" id="input-color-bg">
                            <form>
                                <div class="form-group">
                                    <h2 for="exampleInputEmail1">Input Background COlor</h2>
                                    <p>Silahkan Merubah Warna Background Sesuai dengan Keinginanmu</p>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="custom-file">
                                                <label for="favcolor">Background 1</label>
                                                <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="custom-file">
                                                <label for="favcolor">Background 2</label>
                                                <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="custom-file">
                                                <label for="favcolor">Background 3</label>
                                                <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="custom-file">
                                                <label for="favcolor">Background 4</label>
                                                <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div style="display:flex">
                                    <button type="submit" class="btn btn-primary mt-3" id="submit-btn">Submit</button>
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


});


$('.input-images-1').imageUploader();
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
</script>
<!-- END JS -->
@include('store.layouts.footer-copyright')
</body>
</html>