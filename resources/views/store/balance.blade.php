<?php $data=[
    'title' => 'Saldo Penjualan',
    'description' => 'Halaman saldo penjualan @Dodolanku.id',
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
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span>{{ session('status') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form method="POST" action="{{ route('store.balance.withdraw') }}">
            @csrf
            <h1>Saldo Toko</h1>
            <input type="hidden" name="withdrawal_amount" value="{{ $store->currentBalance()->first() ? $store->currentBalance()->first()->value : 0 }}">

            <div class="break-line-3"></div>

            <div class="form-container-content">
                <h3>Informasi Produk</h3>
                <div class="container">
                    <div class="upload-form-content">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label form-upload-label">Saldo Tersedia</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="Rp {{ $store->currentBalance()->first() ? number_format( $store->currentBalance()->first()->value,0,',','.') : 0 }}" disabled="disabled">
                            </div>
                            
                        
                            <div class="button-save-product col-sm-2" style="margin-top:0!important;">
                                <button type="submit" class="btn btn-success">Tarik Saldo</button>
                            </div>
                            @error('withdrawal_amount')
                                <p class="help-block text-danger">Saldo minimum penarikan Rp 10.000</p>
                            @enderror
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="break-line-3"></div>

            <div class="form-container-content">
                <h3>History Saldo</h3>
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
                            <label class="col-sm-2 col-form-label form-upload-label">
                                Tanggal
                            </label>
                            <div class="col-sm-2 col-form-label form-upload-label">
                                No Referensi
                            </div>
                            <div class="col-sm-2 col-form-label form-upload-label">
                                Perubahan
                            </div>
                            <div class="col-sm-2 col-form-label form-upload-label">
                                Saldo Akhir
                            </div>
                            <div class="col-sm-4 col-form-label form-upload-label">
                                Keterangan
                            </div>
                        </div>
                        @if(count($balances) == 0)

                        @else
                        @foreach ($balances as $balance)
                        <div class="form-group row" id="product-stock-container">
                            <label class="col-sm-2" style="padding-top: 5px">
                                {{ $balance->created_at }}
                            </label>
                            <div class="col-sm-2" style="padding-top: 5px">
                                {{ $balance->pivot->reference_no }}
                            </div>
                            <div class="col-sm-2" style="padding-top: 5px">
                                {{ $balance->pivot->change > 0 ? '+' : '-'}}
                                    Rp {{ number_format( abs($balance->pivot->change),0,',','.') }}
                                {{-- @if( $balance->withdrawals()->first() )
                                    @if($balance->withdrawals()->first()->is_accept == 1)
                                        (Diterima)
                                    @elseif($balance->withdrawals()->first()->is_accept === 0)
                                        (Ditolak)
                                    @else
                                        (Pending)
                                    @endif
                                @endif --}}
                            </div>
                            <div class="col-sm-2" style="padding-top: 5px">
                               Rp {{ number_format( $balance->value,0,',','.') }}
                            </div>
                            <div class="col-sm-4" style="padding-top: 5px">
                                @if( $balance->withdrawals()->first() )
                                    @if($balance->withdrawals()->first()->is_accept == 1)
                                        (Diterima)
                                    @elseif($balance->withdrawals()->first()->is_accept === 0)
                                        (Ditolak)
                                    @else
                                        (Pending)
                                    @endif
                                @else
                                aa
                                @endif
                             </div>
                        </div>
                        @endforeach
                        @endif
                        {!! $balances->links() !!}
                    </div>
                </div>
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

