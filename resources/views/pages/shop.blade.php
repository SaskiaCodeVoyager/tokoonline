@extends('layouts.home')

@section('title')
    Shop | Merchandise Anime
@endsection

@section('content')

<style>
    /* Mengubah bentuk input pencarian dan memberi warna biru dan pink soft */
    .input-group {
        background-color: #fce4ec; /* Background pink lembut */
        border-radius: 50px; /* Membuat input lebih rounded */
        overflow: hidden; /* Menjaga border tetap rapi */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan untuk tampilan modern */
    }

    .form-control {
        border: 2px solid #5c6bc0; /* Border biru soft */
        border-radius: 50px; /* Membuat input lebih rounded */
        color: #5c6bc0; /* Teks berwarna biru soft */
        background-color: #fce4ec; /* Latar belakang pink lembut */
        font-size: 16px; /* Ukuran font lebih besar untuk kenyamanan */
    }

    .input-group-text {
        background-color: #5c6bc0; /* Background biru soft */
        border: none; /* Menghapus border */
        color: #fff; /* Warna icon menjadi putih */
        border-radius: 50px; /* Membuat bagian ikon lebih rounded */
        cursor: pointer; /* Memberikan efek pointer */
    }

    .input-group-text i {
        font-size: 18px; /* Ukuran ikon lebih besar */
    }

    /* Hover effect pada icon */
    .input-group-text:hover {
        background-color: #f48fb1; /* Warna ikon saat hover menjadi pink lembut */
    }

    /* Efek fokus pada input */
    .form-control:focus {
        border-color: #f48fb1; /* Border berwarna pink lembut saat fokus */
        box-shadow: 0 0 10px rgba(244, 143, 177, 0.5); /* Efek glow berwarna pink lembut */
    }

    .form-select-sm {
        background-color: #fce4ec; /* Latar belakang pink lembut */
        border: 2px solid #5c6bc0; /* Border biru soft */
        border-radius: 50px; /* Membuat select lebih rounded */
        color: #5c6bc0; /* Teks berwarna biru soft */
        font-size: 16px; /* Ukuran font lebih besar untuk kenyamanan */
        padding: 12px 20px; /* Menambah padding agar lebih besar */
        transition: all 0.3s ease; /* Transisi halus saat hover atau focus */
    }

    .form-select-sm:focus {
        border-color: #f48fb1; /* Border berwarna pink lembut saat fokus */
        box-shadow: 0 0 10px rgba(244, 143, 177, 0.5); /* Efek glow berwarna pink lembut */
    }

    /* Menyesuaikan tampilan label dan container */
    .py-3.mb-4 {
        background-color: #fce4ec; /* Background pink lembut */
        border-radius: 50px; /* Membuat kontainer lebih rounded */
        padding: 20px; /* Menambah padding */
    }

    label {
        color: #5c6bc0; /* Warna label biru soft */
        font-size: 16px;
        font-weight: 500;
    }

    /* Menyesuaikan tampilan untuk tombol select (me-3 margin) */
    .me-3 {
        margin-right: 0; /* Menghapus margin kanan untuk mengatur jarak dengan elemen lain */
    }

    .fruite-categorie li {
        background-color: #f3e5f5; /* Warna latar belakang ungu lembut */
        border-radius: 10px; /* Membuat sudut lebih bulat */
        margin-bottom: 12px; /* Menambah jarak antar item */
        padding: 12px 16px; /* Menambah padding untuk kenyamanan */
        transition: all 0.3s ease; /* Transisi halus saat hover */
    }

    .fruite-categorie li:hover {
        background-color: #d1c4e9; /* Ubah latar belakang menjadi lebih gelap saat hover */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Efek bayangan saat hover */
    }

    /* Mengubah gaya teks pada nama produk */
    .fruite-name a {
        color: #6a1b9a; /* Warna teks ungu */
        font-size: 18px; /* Ukuran font lebih besar untuk keterbacaan */
        font-weight: bold; /* Menebalkan teks */
        text-decoration: none; /* Menghilangkan garis bawah */
        transition: color 0.3s ease; /* Transisi warna teks saat hover */
    }

    .fruite-name a:hover {
        color: #ab47bc; /* Warna ungu lebih cerah saat hover */
    }

    /* Mengubah tampilan jumlah produk */
    .fruite-name span {
        color: #8e24aa; /* Warna ungu lembut untuk jumlah */
        font-size: 16px; /* Ukuran font jumlah produk */
        font-weight: 500; /* Berat font lebih ringan */
    }

    /* Menambahkan ikon apel dengan warna yang lebih cerah */
    .fruite-name i {
        color: #ab47bc; /* Ikon apel dengan warna ungu cerah */
        font-size: 22px; /* Ukuran ikon lebih besar */
    }

    /* Menambahkan header dengan warna ungu */
    h4 {
        color: #6a1b9a; /* Warna header ungu */
        font-size: 24px; /* Ukuran font header lebih besar */
        font-weight: bold;
        margin-bottom: 20px; /* Memberikan jarak bawah yang lebih besar */
    }

    .form-range {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        width: 100%;
        height: 10px; /* Mengatur tinggi slider */
        border-radius: 10px;
        background: linear-gradient(to right, #ec407a, #f48fb1); /* Warna pink gradasi */
        outline: none;
        transition: background 0.3s ease;
    }

    /* Gaya saat slider di-hover */
    .form-range:hover {
        background: linear-gradient(to right, #f48fb1, #ec407a); /* Warna gradasi terbalik saat hover */
    }

    /* Gaya thumb pada slider (bagian yang digeser) */
    .form-range::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 15px;
        height: 15px;
        border-radius: 50%; /* Membuat thumb berbentuk bulat */
        background-color: #ec407a; /* Warna pink untuk thumb */
        cursor: pointer;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease;
    }

    .form-range::-moz-range-thumb {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #ec407a;
        cursor: pointer;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease;
    }

    .form-range::-ms-thumb {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #ec407a;
        cursor: pointer;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease;
    }

    /* Gaya untuk output nilai harga */
    output {
        display: block;
        margin-top: 10px;
        font-size: 18px;
        font-weight: bold;
        color: #ec407a; /* Warna pink untuk teks output */
        text-align: center;
    }

    .col-lg-12 h4 {
        color: #4fa3f7; /* Warna biru soft untuk judul */
        font-weight: bold;
    }

    /* Gaya untuk tiap produk */
    .product-item {
        display: flex;
        align-items: center;
        justify-content: start;
        background-color: #e7f2ff; /* Biru soft background */
        border-radius: 20px; /* Bentuk yang lebih unik */
        padding: 10px;
        margin-bottom: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Bayangan lembut untuk efek 3D */
        transition: all 0.3s ease; /* Transisi yang halus saat hover */
    }

    .product-item:hover {
        background-color: #cce7ff; /* Mengubah warna latar belakang saat hover */
        transform: scale(1.05); /* Memberikan efek zoom saat hover */
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2); /* Menambah bayangan saat hover */
    }

    /* Gaya gambar produk */
    .product-item .product-image {
        width: 75px;
        height: 90px;
        border-radius: 10px;
        overflow: hidden;
    }

    .product-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Gaya teks produk */
    .product-item .product-text {
        margin-left: 20px;
        font-family: 'Arial', sans-serif;
    }

    .product-item .product-text h6 {
        font-size: 1.1rem;
        font-weight: bold;
        color: #1e3c73; /* Warna teks produk biru tua */
        margin-bottom: 10px;
    }

    .product-item .product-rating i {
        color: #ffbb33; /* Warna bintang rating */
    }

    .product-item .product-price h5 {
        font-size: 1.2rem;
        font-weight: bold;
        color: #1e3c73; /* Warna harga biru tua */
    }

    .product-item .product-price h5.text-danger {
        color: #e74c3c; /* Warna diskon merah */
    }

    /* Gaya tombol "View More" */
    .view-more-btn {
        background-color: #4fa3f7; /* Biru soft untuk tombol */
        color: white;
        padding: 12px 20px;
        border-radius: 50px; /* Membuat tombol lebih melengkung */
        font-size: 1rem;
        font-weight: bold;
        border: none;
        transition: background-color 0.3s ease;
    }

    .view-more-btn:hover {
        background-color: #2c80cc; /* Biru lebih gelap saat hover */
    }

    /* Membuat bentuk hati di sekitar slider */
    
</style>

    <!-- Single Page Header start -->
    <div class="py-5 container-fluid page-header" style="background-image: url('{{ asset('img/image.png') }}');">
        <h1 class="text-center display-6" style="color: white;">Shop</h1>
<ol class="mb-0 breadcrumb justify-content-center">
    <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: white;">Home</a></li>
    <li class="breadcrumb-item"><a href="#" style="color: white;">Pages</a></li>
    <li class="breadcrumb-item active" style="color: white;">Shop</li>
</ol>

    </div>
    
       
    <!-- Fruits Shop Start-->
    <div class="py-5 container-fluid fruite">
        <div class="container py-5">
            <h1 class="mb-4" style="color: #64B5F6;">Merchandise Anime</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="mx-auto input-group w-100 d-flex">
                                <input type="search" class="p-3 form-control" placeholder="keywords" aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="p-3 input-group-text"><i class="fa fa-search"></i></span>
                            </div>                            
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="py-3 mb-4 rounded bg-light ps-3 d-flex justify-content-between">
                                <label for="fruits">Default Sorting:</label>
                                <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3" form="fruitform">
                                    <option value="volvo">Nothing</option>
                                    <option value="saab">Popularity</option>
                                    <option value="opel">Organic</option>
                                    <option value="audi">Fantastic</option>
                                </select>
                            </div>                            
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 style="color:#a13df8;">Favorite Products</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            @foreach ($products as $item)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="#"><i class="fas fa-apple-alt me-2"></i>{{$item->name}}</a>
                                                        <span>({{$item->quantity}})</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>                                
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 style="color: #a13df8;">Price</h4>
                                        <div class="heart-shape"></div>
                                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput"
                                            min="0" max="500" value="0" oninput="amount.value=rangeInput.value">
                                        <output id="amount" name="amount" min-value="0" max-value="500"
                                            for="rangeInput">0</output>
                                    </div>
                                </div>                                
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 style="color:#a13df8;">Categories</h4>
                                        @foreach ($categories as $item)
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-{{$item->id}}" name="Categories-{{$item->id}}"
                                                    value="Beverages">
                                                <label for="Categories-{{$item->id}}"> {{$item->name}}</label>
                                            </div>
                                         @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h4 class="mb-3">Featured products</h4>
                                    @foreach ($products as $item)
                                        <div class="product-item">
                                            <div class="product-image rounded me-4">
                                                <img src={{ Storage::url($item->photos) }} class="rounded img-fluid" alt="">
                                            </div>
                                            <div class="product-text">
                                                <h6 class="mb-2">{{$item->name}}</h6>
                                                <div class="mb-2 d-flex product-rating">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="mb-2 d-flex product-price">
                                                    <h5 class="fw-bold me-2">Rp.{{ number_format($item->price)}}</h5>
                                                    <h5 class="text-danger fw-normal">-5%</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="my-4 d-flex justify-content-center">
                                        <a href="{{route('shop')}}" class="view-more-btn w-100">View More</a>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="position-relative">
                                        <img src="img/banner-fruits.jpg" class="rounded img-fluid w-100" alt="">
                                        <div class="position-absolute"
                                            style="top: 50%; right: 10px; transform: translateY(-50%);">
                                            <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                @foreach ($products as $item)
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <a href="{{ route('shop-detail', $item->id) }}"
                                            class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ Storage::url($item->photos) }}"
                                                    class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="px-3 py-1 text-white rounded bg-secondary position-absolute"
                                                style="top: 10px; left: 10px;">{{ $item->category->name }}</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>{{ $item->name }}</h4>
                                                <small class="mb-1 text-dark fw-bold">Rp.{{ number_format($item->price) }}
                                                    / kg</small>
                                                <p style="color: #747d88 !important">{!! $item->thumb_description !!}</p>
                                                <div class="d-flex justify-content-center flex-lg-wrap">
                                                    <button type="submit"
                                                        class="x-4 py-2 mb-4 border btn border-secondary rounded-pill text-primary">
                                                        Detail
                                                    </button>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                                <div class="text-center">
                                    {{$products->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
@endsection