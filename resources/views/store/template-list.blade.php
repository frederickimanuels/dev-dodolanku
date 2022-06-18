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
                            <img class="card-img-top" src="{{asset('images/homepage/hyundai.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                            <span>{{ $template->name }}</span>
                            <button type="button" class="btn btn-primary">Pakai Desain</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                @for ($i = 0; $i < 3; $i++)
                    <div class="col-6">
                        <div class="card" style="width: 100%">
                            <img class="card-img-top" src="{{asset('images/homepage/hyundai.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                            <span>Ini Desain 1</span>
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