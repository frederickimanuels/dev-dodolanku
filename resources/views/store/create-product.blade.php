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
                            <input type="text" class="form-control" id="product-category" value="Skip dulu">
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
                            <input type="text" class="form-control" id="product-category" value="Skip dulu">
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
                <div class="product-varian-content">
                    <div class="row">
                        <label>Tipe Varian</label>
                        <div class="col-3">
                            <select class="form-select form-select-varian" id="selection-variant" aria-label="Default select example">
                                <option selected value="0">...</option>
                                <option >Sobek</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-add-varian">Add</button>
                        </div>
                        <div class="col-8">
                            <div class="varian-wrapper-1">
                                <div href="" class="varian-type">
                                    <span>Penyok Dikit</span>
                                    <a href="" class="varian-delete">
                                        <i class="fa-solid fa-x fa-x-varian"></i>
                                    </a>
                                </div>
                                <div href="" class="varian-type">
                                    <span>Sobek</span>
                                    <a href="" class="varian-delete">
                                        <i class="fa-solid fa-x fa-x-varian"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label>Warna</label>
                        <div class="col-3">
                            <select class="form-select form-select-varian" id="selection-color" aria-label="Default select example">
                                <option selected value="0">...</option>
                                <option>Polkadot</option>
                                <option>Biru Maroon</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <!-- <button type="button" class="btn btn-add-varian" data-target="#exampleModal">Add</button> -->
                            <button type="button" class="btn btn-add-varian" data-toggle="modal" data-target="#exampleModal">
                            Add
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Varian Warna</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="form-control" value="1" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                                    <button type="button" class="btn btn-primary">Simpan</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="varian-wrapper-1">
                                <div href="" class="varian-type">
                                    <span>Biru</span>
                                    <a href="" class="varian-delete">
                                        <i class="fa-solid fa-x fa-x-varian"></i>
                                    </a>
                                </div>
                                <div href="" class="varian-type">
                                    <span>Polkadot</span>
                                    <a href="" class="varian-delete">
                                        <i class="fa-solid fa-x fa-x-varian"></i>
                                    </a>
                                </div>
                                <div href="" class="varian-type">
                                    <span>Biru Maroon</span>
                                    <a href="" class="varian-delete">
                                        <i class="fa-solid fa-x fa-x-varian"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="add-new-variant">
                        <button type="button" class="btn btn-primary" onclick="addField()">Tambah Varian</button>
                    </div>
                    <div class="tabel-varian">
                        <h4>Tabel Varian</h4>
                        <table class="table" id="variantTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">VARIAN</th>
                                    <th scope="col">HARGA</th>
                                    <th scope="col">STOK</th>
                                    <th scope="col">BERAT</th>
                                    <th scope="col">GAMBAR</th>
                                    <th scope="col">STATUS</th>
                                </tr>
                            </thead>
                            <tbody id="TableParent" >
                                <tr id="0" class="table-variant-wrapper" hidden>
                                    <th scope="row" >
                                        <input class="table-checkbox"  type="checkbox" aria-label="Checkbox for following text input">
                                    </th>
                                    <td>
                                        <div id="variant-name">
                                            <input type="text" class="form-control input-name" value="Empty" aria-label="Username" aria-describedby="addon-wrapping" readonly>
                                        </div>
                                    </td>
                                    <td id="0">
                                        <div class="variant-price-wrapper">
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">Rp</span>
                                                <input type="text" id="var-price" class="form-control" value="2.390.000" aria-label="Username" aria-describedby="addon-wrapping">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="variant-stock-wrapper">
                                            <div class="input-group flex-nowrap">
                                                <input type="text" class="form-control" value="1" aria-label="Username" aria-describedby="addon-wrapping">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="variant-weight">
                                            <div class="input-group flex-nowrap">
                                                <input type="text" class="form-control" value="300" aria-label="Username" aria-describedby="addon-wrapping">
                                                <span class="input-group-text" id="addon-wrapping">gr</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="variant-img">
                                            <div class="input-group flex-nowrap">
                                                <img id="imageVar" src="http://via.placeholder.com/50" style="border-radius:8px"/>
                                                <input style="display:none" type="image" class="form-control form-image" aria-label="Username" aria-describedby="addon-wrapping">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="variant-status">
                                            <div class="form-check form-switch product-switch">
                                                <input class="form-check-input" type="checkbox" id="variant-switch" checked>
                                                <span>Aktif</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="product-varian-btn">
                    <a href="">
                        <i class="fa-solid fa-plus"></i>
                        <span>Tambah</span>
                    </a>
                </div> -->
            </div>
            <!-- <div class="break-line-3" style="margin: 0px;border:30px solid #E5E5E5;"></div> -->
        </form>
    </div>
</section>


@include('store.layouts.js')
<!-- Add Js Here -->
<script>
    $(document).ready(function(){
        $('#imageVar').click(function(){
        console.log("asuu");
        $('.form-image').click()
    })
    });
  

    function addField(){
        // get main table body
        var tableBody = document.getElementById('variantTable').children[1].children[0];
        var Table = document.getElementById('TableParent');
        var colName = document.getElementById("variant-name");
        var select1 = document.getElementById("selection-variant");
        var select1Val = select1.value;
        var select2 = document.getElementById("selection-color");
        var select2Val = select2.value;
        var variantName;
        if(select1Val== 0 && select2Val== 0)
        {
            variantName="Kosonngngg"   
        }else if(select1Val!= 0 && select2Val== 0)
        {
            variantName=select1Val  
        }else if(select1Val== 0 && select2Val!= 0)
        {
            variantName=select2Val  
        }else if(select1Val!= 0 && select2Val!= 0)
        {
            variantName = select1Val+"~"+select2Val;

        }
        console.log(variantName);




        // var test3 = document.getElementById("variant-name");
        // test3.setAttribute("value","aadasdasd");
      
        // get existing rows
        var rows = tableBody.children.length;
        var count = Table.children.length;
        console.log(count);

        // clone the last row (which contains the last table)
        var newRow = tableBody.cloneNode(true);

        // get the new row table
        var newTable = newRow;

        // change the table id
        newTable.setAttribute('id', count);
        newTable.children[1].children[0].children[0].setAttribute('value',variantName);
        newTable.children[2].children[0].children[0].children[1].setAttribute('id',variantName);
        newTable.children[3].children[0].children[0].children[0].setAttribute('id',variantName);
        newTable.children[4].children[0].children[0].children[0].setAttribute('id',variantName);
        newTable.children[5].children[0].children[0].children[1].setAttribute('id',variantName);
        newTable.children[6].children[0].children[0].children[0].setAttribute('id',variantName);


        newTable.removeAttribute("hidden");


        // var cells = newTable;
        // for (var i=0; i<cells.length; i++) {
        //     cells[i].children[1].value = "";
        // }

        // append the new row to the main table body
        Table.appendChild(newRow);
        }
       
</script>

<!-- End JS -->
@include('store.layouts.footer-copyright')
</body>
</html>

