<?php $data=[
    'title' => 'Ubah Template Toko',
    'description' => 'Daftar pesanan toko @Dodolanku.id',
    'keywords' => 'cart, online shop, business, haul',
    'author' => 'Dodolanku.id',
]; ?>

@include('store.layouts.header')

@include('layouts.navbar-home')

<section id="templates">
    <div class="container templates-wrapper">
        <h1>Pilih Template Anda</h1>
        <p>Tersedia beberapa template yang sesuai dengan tema dari toko anda</p>
        <div class="container">
            <div class="row">
                {{-- <div class="col-6 template-selection-label">
                    <label for="template">Kategori Template</label>
                </div>
                <div class="col-6 template-selection">
                    <form action="/action_page.php">
                        <select name="template" id="template-selection-inner">
                            <option value="volvo">All</option>
                            <option value="saab">Desain Jadul</option>
                            <option value="opel">Desain Kekinian</option>
                            <option value="audi">Desain Modern</option>
                        </select>
                    </form>
                </div> --}}
            </div>
        </div>
        <div class="container">
            <div class="row template-list">
                @foreach($templates as $template)
                    <div class="col-6">
                        <div class="card" style="width: 100%">
                            <img class="card-img-top" src="{{ asset('images/template/'. $template->code.'/preview.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                            <span>{{ $template->name }}</span>
                            <button type="button" class="btn btn-success" disabled="disabled">Terpakai</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                @for ($i = 0; $i < 1; $i++)
                    <div class="col-6">
                        <div class="card" style="width: 100%">
                            <img class="card-img-top" src="{{asset('images/homepage/template-coming-soon.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                            <span>Template Coming Soon</span>
                            <button type="button" class="btn btn-primary" disabled="disabled">Coming soon</button>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')