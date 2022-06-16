@include('store.layouts.header')

@include('store.layouts.navbar-home')

<section id="createproduct" class="display-desktop">
    <div class="container create-product-container">
        <form method="POST" action="{{ route('store.product.store') }}">
            @csrf
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
                            <input type="text" class="form-control" id="product-name" name="product_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Kategori <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="product-category" value="Skip dulu" name="product_category">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Deskripsi Produk <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="product-category" name="product_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Link Url Video</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="product-category" value="Skip dulu" name="product_video_url">
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
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label form-upload-label">Minimum Pemesanan</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="product-min-order" name="product_min_order">
                            </div>
                        </div>
                        <div class="form-group row" id="product-stock-container">
                            <label for="staticEmail" class="col-sm-2 col-form-label form-upload-label">Stock</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="product-stock" name="product_stock">
                            </div>
                        </div>
                        <div class="form-group row" id="product-price-container">
                            <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Harga <span style="color:red">*</span></label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="product-price" name="product_price">
                            </div>
                        </div>
                        <div class="form-group row" id="product-weight-container">
                            <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Berat <span style="font-family:Montserrat-Light">(gram)</span><span style="color:red">*</span></label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="product-weight" name="product_weight">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label form-upload-label">Ukuran</label>
                            <div class="col-sm-9 form-upload-volume">
                                Berat volume (gram) dapat dihitung dengan rumus panjang (cm) x lebar (cm) x tinggi (cm) / 6000
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

            <div class="break-line-3"></div>

            <div class="form-container-content product-varian">
                <div class="row">
                    <div class="product-varian-text col-md-4">
                        <h2 class="upload-image-text-h2">Varian Produk</h2>
                        <p>Tambahkan varian seperti warna atau ukuran.</p>
                    </div>
                    <div class="product-varian-btn col-md-2">
                        <span class="button-checkbox">
                            <div id="enable-varian" class="btn btn-primary">Aktifkan Varian</div>
                            <div id="disable-varian" class="btn btn-danger" hidden>Matikan Varian</div>
                            <input type="checkbox" name="variant_active" id="varian-status-checkbox" style="opacity:0; position:absolute; left:9999px;">
                        </span>
                    </div>
                </div>
                <div class="product-varian-content" hidden>
                    <div class="row">
                        <label>Pilih Varian</label>
                        <div class="col-3">
                            <select class="form-select form-select-varian" id="selection-variant" aria-label="Default select example">
                                <option disabled>Pilih Varian</option>
                                <option selected value="size">Ukuran</option>
                                <option value="color">Warna</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-add-varian" id="add-variant" data-toggle="modal" data-target="#inputvarmodal" disabled>
                                Tambah
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 pt-2 variant-list-wrapper">
                            <div class="varian-wrapper-1" id="list-variant">
                                {{-- <div class="varian-type" id="varian-id-0">
                                    <input type="hidden" class="varian-type-input" varian-id="0" value="Biru">
                                    <span>Biru</span>
                                    <div class="varian-delete">
                                        <i class="fa-solid fa-x fa-x-varian" id="delete-item" varian-id="0"></i>
                                    </div>
                                </div>
                                <div class="varian-type" id="varian-id-1">
                                    <input type="hidden" class="varian-type-input" varian-id="1" value="Hitam">
                                    <span>Hitam</span>
                                    <div class="varian-delete">
                                        <i class="fa-solid fa-x fa-x-varian" id="delete-item" varian-id="1"></i>
                                    </div>
                                </div>
                                <div class="varian-type" id="varian-id-2">
                                    <input type="hidden" class="varian-type-input" varian-id="2" value="Hijau">
                                    <span>Hijau</span>
                                    <div class="varian-delete">
                                        <i class="fa-solid fa-x fa-x-varian" id="delete-item" varian-id="2"></i>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="tabel-varian">
                        <h4>Tabel Varian</h4>
                        <table class="table" id="variantTable">
                            <thead>
                                <tr>
                                    <th scope="col">VARIAN</th>
                                    <th scope="col">HARGA</th>
                                    <th scope="col">STOK</th>
                                    <th scope="col">BERAT</th>
                                    <th scope="col">GAMBAR</th>
                                    <th scope="col">STATUS</th>
                                </tr>
                            </thead>
                            <tbody id="TableParent" class="tabel-varian-body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</section>

<!-- Modal Add Varian -->
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
<!-- End Modal Add Varian -->


@include('store.layouts.js')
<!-- Add Js Here -->
<script>
    $(document).ready(function(){
        $('#enable-varian').on('click',function(){
            enableVariant();
        });
        function enableVariant(){
            $('#varian-status-checkbox').attr("checked", true);
            $('#enable-varian').attr("hidden", true);
            $('#disable-varian').attr("hidden", false);
            $('.product-varian-content').attr("hidden", false);
            $('#product-stock-container').attr("hidden", true);
            $('#product-price-container').attr("hidden", true);
            $('#product-weight-container').attr("hidden", true);
            $('#product-stock').val('1');
            $('#product-price').val('100');
            $('#product-weight').val('10');
        }

        $('#disable-varian').on('click',function(){
            disableVariant();
        });
        function disableVariant(){
            $('#varian-status-checkbox').attr("checked", false);
            $('#enable-varian').attr("hidden", false);
            $('#disable-varian').attr("hidden", true);
            clearVariant();
            $('.product-varian-content').attr("hidden", true);
            $('#product-stock-container').attr("hidden", false);
            $('#product-price-container').attr("hidden", false);
            $('#product-weight-container').attr("hidden", false);
            $('#product-stock').val('0');
            $('#product-price').val('0');
            $('#product-weight').val('0');
        }

        $('#imageVar').click(function(){
            $('.form-image').click()
        });
        var variant_type = "";
        if ($('#selection-variant').val() != ""){
            $('#add-variant').removeAttr('disabled');
        }
        generateTable();
        $('#selection-variant').on('change',function(){
            var select_value = $(this).val();
            if(select_value != ""){
                if(variant_type != select_value){
                    clearVariant();
                    generateTable();
                    variant_type = select_value;
                }
                $('#add-variant').removeAttr('disabled');
            }else{
                $('#add-variant').attr('disabled','true');
            }
        });
        $('#addVar').on('keypress keyup blur',function(){
            let length = false;
            length = $(this).val().length;
            if(length < 1 ){
                $('#save-var').attr('disabled','true');
            }else if(length > 0){
                $('#save-var').removeAttr('disabled');
            }
        });

        $('#save-var').on('click',function(){
            var input_value = $('#addVar').val();
            var exist = false;
            var last_id = 0;
            $('.varian-type-input').each(function () {
                var exist_value = $(this).val();
                if(last_id < $(this).attr("varian-id")){
                    last_id = $(this).attr("varian-id");
                }
                if(input_value == exist_value){
                    exist = true;
                }
            });
            if(exist == false){
                var new_id = +last_id + 1;
                $('#list-variant').append(
                    "<div class='varian-type'>"+
                        "<input type='hidden' class='varian-type-input' varian-id='"+ new_id +"' value='"+ input_value +"'>"+
                        "<span>"+ input_value +"</span>"+
                        "<div class='varian-delete'>"+
                            "<i class='fa-solid fa-x fa-x-varian' id='delete-item'></i>"+
                        "</div>"+
                    "</div>"
                );
                generateTable();
                $('#addVar').val('');
            }else{
                alert('Varian sudah ada');
            }
        });

        $(".varian-delete").click(function(){
            $(this).parent().remove();
            generateTable();
        })

        function clearVariant() {
            $('#list-variant').empty();
            generateTable();
        }

        function generateTable() {
            $('.tabel-varian-body').empty();
            $('.varian-type-input').each(function () {
                var value = $(this).val();
                $('.tabel-varian-body').append(
                    "<tr class='table-variant-wrapper'>"+
                    "	<td>"+
                    "		<div id='variant-name'>"+
                    "			<input type='text' class='form-control input-name' name='variant_name[]' value='"+ value + "' aria-label='name' aria-describedby='addon-wrapping' readonly>"+
                    "		</div>"+
                    "	</td>"+
                    "	<td>"+
                    "		<div class='variant-price-wrapper'>"+
                    "			<div class='input-group flex-nowrap'>"+
                    "				<span class='input-group-text' id='addon-wrapping'>Rp</span>"+
                    "				<input type='text' id='var-price' name='variant_price[]' value='0' class='form-control' aria-label='price' aria-describedby='addon-wrapping'>"+
                    "			</div>"+
                    "		</div>"+
                    "	</td>"+
                    "	<td>"+
                    "		<div class='variant-stock-wrapper'>"+
                    "			<div class='input-group flex-nowrap'>"+
                    "				<input type='text' class='form-control' name='variant_stock[]' value='0' aria-label='stock' aria-describedby='addon-wrapping'>"+
                    "			</div>"+
                    "		</div>"+
                    "	</td>"+
                    "	<td>"+
                    "		<div class='variant-weight'>"+
                    "			<div class='input-group flex-nowrap'>"+
                    "				<input type='text' class='form-control' name='variant_weight[]' value='0' aria-label='weight' aria-describedby='addon-wrapping'>"+
                    "				<span class='input-group-text' id='addon-wrapping'>gr</span>"+
                    "			</div>"+
                    "		</div>"+
                    "	</td>"+
                    "	<td>"+
                    "		<div class='variant-img'>"+
                    "			<div class='input-group flex-nowrap'>"+
                    "				<img id='imageVar' src='http://via.placeholder.com/50' style='border-radius:8px'/>"+
                    "				<input style='display:none' type='image' class='form-control form-image' aria-label='Username' aria-describedby='addon-wrapping'>"+
                    "			</div>"+
                    "		</div>"+
                    "	</td>"+
                    "	<td>"+
                    "		<div class='variant-status'>"+
                    "			<div class='form-check form-switch product-switch'>"+
                    "				<input class='form-check-input' type='checkbox' name='variant_status[]' id='variant-switch' checked>"+
                    "				<span>Aktif</span>"+
                    "			</div>"+
                    "		</div>"+
                    "	</td>"+
                    "</tr>"
                )
            });
            $(".varian-delete").click(function(){
                $(this).parent().remove();
                generateTable();
            })
        }


    });
</script>
<!-- End JS -->
@include('store.layouts.footer-copyright')
</body>
</html>

