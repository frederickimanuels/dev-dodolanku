<?php $data=[
    'title' => 'Profil Pengguna',
    'description' => 'Pengaturan profil pengguna @Dodolanku.id',
    'keywords' => 'cart, online shop, business, haul',
    'author' => 'Dodolanku.id',
]; ?>
@include('user.layouts.header')

@include('layouts.navbar-home')
<style>
    .container {
        /* max-width: 1100px; padding: 0 20px; margin:0 auto; */
    }
.panel {
    /* margin: 100px auto 40px;  */
    max-width: 500px; 
    /* text-align: center; */
}
.button_outer {
    background: #0d6efd; 
    border-radius:8px; 
    text-align: center; 
    height: 50px; 
    width: 200px; 
    display: inline-block; 
    transition: .2s; 
    position: relative; 
    overflow: hidden;
}
.btn_upload {
    padding: 12px 30px 12px; color: #fff; text-align: center; position: relative; display: inline-block; overflow: hidden; z-index: 3; white-space: nowrap;
}
.btn_upload input {
    position: absolute; width: 100%; left: 0; top: 0; width: 100%; height: 105%; cursor: pointer; opacity: 0;
}
.file_uploading {
    width: 100%; height: 10px; margin-top: 20px; background: #ccc;
}
.file_uploading .btn_upload {display: none;}
.processing_bar {position: absolute; left: 0; top: 0; width: 0; height: 100%; border-radius: 30px; background:#83ccd3; transition: 3s;}
.file_uploading .processing_bar {width: 100%;}
.success_box {display: none; width: 50px; height: 50px; position: relative;}
.success_box:before {
    content: ''; 
    display: block;
    width: 9px; 
    height: 18px; 
    border-bottom: 6px solid #fff; 
    border-right: 6px solid #fff; 
    -webkit-transform:rotate(45deg); 
    -moz-transform:rotate(45deg); 
    -ms-transform:rotate(45deg); 
    transform:rotate(45deg); 
    position: absolute; 
    left: 17px; 
    top: 17px;
}
.file_uploaded .success_box {display: inline-block;}
.file_uploaded {margin-top: 0; width: 50px; background:#83ccd3; height: 50px;}
.uploaded_file_view {
    max-width: 300px; 
    /* margin: 40px auto;  */
    text-align: center; 
    position: relative; 
    transition: .2s; 
    opacity: 0; 
    border: 2px solid #ddd; 
    padding: 15px;
}
.file_remove{width: 30px; height: 30px; border-radius: 50%; display: block; position: absolute; background: #aaa; line-height: 30px; color: #fff; font-size: 12px; cursor: pointer; right: -15px; top: -15px;}
.file_remove:hover {background: #222; transition: .2s;}
.uploaded_file_view img {max-width: 100%;}
.uploaded_file_view.show {opacity: 1;}
.error_msg {text-align: center; color: #f00}
</style>
<section id="personal-information">
    <div class="container">
        <div class="container">
            <div class="row">
                @include('user.layouts.sidebarmenu')
                <div class="col-lg-9 col-12 personal-info-detail">
                    <h1 class="personal-info-h1">Profile</h1>
                    <form action="{{ route('user.profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-list">
                            <div class="col">
                                <label for="name" class="profile-label" >Nama</label>
                                <input type="text" name="name" class="form-control profile-form" placeholder="Full name" value="{{ Auth::user()->name }}">
                            </div>
                            {{-- <div class="col">
                                <input type="text" class="form-control profile-form" placeholder="Last name">
                            </div> --}}
                        </div>
                        <div class="row form-list">
                            <div class="col">
                                <label for="email" class="profile-label" >Email <span style="font-size:14px; font-family:Monserrat-light!important;">*cannot change</span></label>
                                <input type="email" name="email"  class="form-control profile-form" placeholder="Email" value="{{ Auth::user()->email }}" disabled="disabled">
                            </div>
                        </div>
                        <div class="row form-list">
                            <div class="col">
                                <label for="password" class="profile-label" >Password</label>
                                <div class="form-control profile-form" style="display: flex; justify-content:space-between; padding-top:12px;">
                                    <input type="password" value="******" style="background:none;" disabled="disabled">
                                    <a href="{{ route('change.password') }}" style="text-decoration:none;">Ubah Password</a>
                                </div>
                            </div>
                            {{-- <div class="col-xl-6 col-12 pt-3 pt-xl-0">
                                <label for="birth-date" class="profile-label">Birth Date</label>
                                <input type="date" class="form-control profile-form" placeholder="Birth Date">
                            </div> --}}
                        </div>
                        {{-- <div class="row form-list">
                            <div class="col-xl-6 col-12">
                                <label for="phone-number" class="profile-label">Phone Number</label>
                                <input type="number" class="form-control profile-form" placeholder="Phone Number">
                            </div>
                            <div class="col-xl-6 col-12 pt-3 pt-xl-0">
                                <label for="birth-date" class="profile-label">Birth Date</label>
                                <input type="date" class="form-control profile-form" placeholder="Birth Date">
                            </div>
                        </div> --}}
                        {{-- <div class="row form-list">
                            <div class="col-6">
                                <input type="text" class="form-control profile-form" placeholder="Password">
                            </div>
                            <div class="col-6">
                                <!-- <input type="text" class="form-control profile-form" placeholder="Password"> -->
                            </div>
                        </div> --}}
                        <div class="row form-list">
                            <!-- <div class="form-group">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>                       -->
                            <label for="password" class="profile-label" >Ubah Foto Profil</label>
                            <div class="container">
                                <div class="panel">
                                    <div class="button_outer">
                                        <div class="btn_upload">
                                            <input type="file" id="upload_file" name="profile_photo">
                                            Pilih Foto
                                        </div>
                                        <div class="processing_bar"></div>
                                        <div class="success_box"></div>
                                    </div>
                                </div>
                                <div class="error_msg"></div>
                                <div class="uploaded_file_view" id="uploaded_view">
                                    <span class="file_remove">X</span>
                                </div>
                            </div>
                        </div>
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
    var btnUpload = $("#upload_file"),
		btnOuter = $(".button_outer");
	btnUpload.on("change", function(e){
		var ext = btnUpload.val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
			$(".error_msg").text("Not an Image...");
		} else {
			$(".error_msg").text("");
			btnOuter.addClass("file_uploading");
			setTimeout(function(){
				btnOuter.addClass("file_uploaded");
			},3000);
			var uploadedFile = URL.createObjectURL(e.target.files[0]);
			setTimeout(function(){
				$("#uploaded_view").append('<img src="'+uploadedFile+'" />').addClass("show");
			},3500);
		}
	});
	$(".file_remove").on("click", function(e){
		$("#uploaded_view").removeClass("show");
		$("#uploaded_view").find("img").remove();
		btnOuter.removeClass("file_uploading");
		btnOuter.removeClass("file_uploaded");
	});
</script>
<!-- End JS -->
@include('layouts.footer')