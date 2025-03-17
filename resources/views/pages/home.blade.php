@extends('layouts.home')

@section('title')
    Home | Merchandise Anime
@endsection

@section('content')

<style>
    /* Neon Text Effect */
/* Neon Text Effect */
/* Neon Text Effect */
.neon-text {
    font-size: 4rem; /* Ukuran font yang lebih besar */
    color: #A1C6EA; /* Warna teks biru soft */
    text-transform: uppercase; /* Membuat teks kapital */
    text-align: center; /* Menyusun teks ke tengah */
    font-weight: bold; /* Menebalkan teks */
    text-shadow: 
        0 0 5px #9B59B6,   /* Soft Purple Neon Glow */
        0 0 10px #9B59B6,  /* Soft Purple Neon Glow */
        0 0 15px #9B59B6,  /* Soft Purple Neon Glow */
        0 0 20px #9B59B6,  /* Soft Purple Neon Glow */
        0 0 30px #9B59B6,  /* Soft Purple Neon Glow */
        0 0 40px #9B59B6,  /* Soft Purple Neon Glow */
        0 0 50px #9B59B6,  /* Soft Purple Neon Glow */
        0 0 60px #F5F5F5;  /* Soft White Neon Glow */
    animation: neon-animation 1.5s ease-in-out infinite alternate; /* Menambahkan animasi */
}

/* Animasi Neon */
@keyframes neon-animation {
    0% {
        text-shadow: 
            0 0 5px #9B59B6,   /* Soft Purple Neon Glow */
            0 0 10px #9B59B6, 
            0 0 15px #9B59B6, 
            0 0 20px #9B59B6, 
            0 0 30px #9B59B6, 
            0 0 40px #9B59B6, 
            0 0 50px #9B59B6,
            0 0 60px #F5F5F5;  /* Soft White Neon Glow */
    }
    50% {
        text-shadow: 
            0 0 10px #9B59B6,  /* Soft Purple Neon Glow */
            0 0 20px #9B59B6, 
            0 0 30px #9B59B6, 
            0 0 40px #9B59B6, 
            0 0 50px #9B59B6, 
            0 0 60px #9B59B6, 
            0 0 70px #F5F5F5;  /* Soft White Neon Glow */
    }
    100% {
        text-shadow: 
            0 0 5px #9B59B6,   /* Soft Purple Neon Glow */
            0 0 10px #9B59B6, 
            0 0 15px #9B59B6, 
            0 0 20px #9B59B6, 
            0 0 30px #9B59B6, 
            0 0 40px #9B59B6, 
            0 0 50px #9B59B6,
            0 0 60px #F5F5F5;  /* Soft White Neon Glow */
    }
}



</style>
    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="mx-auto input-group w-75 d-flex">
                        <input type="search" class="p-3 form-control" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="p-3 input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Hero Start -->
    <div class="py-5 mb-5 container-fluid hero-header" style="background-image: url('{{ asset('img/humma.png') }}');">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-3" style="color: #000000;">Welcome Wibu !!!</h4> <!-- Light Purple Color -->
                    <h1 class="mb-5 display-3 neon-text">Merchandise All Anime</h1> <!-- Light Blue Color -->
                    <div class="mx-auto position-relative">
                        <input class="px-4 py-3 border-2 form-control border-secondary w-75 rounded-pill" type="number" placeholder="Search"
                            style="background: linear-gradient(45deg, #D1A6FF, #FFB6C1); border: none; color: white;">
                        <button type="submit"
                            class="px-4 py-3 text-white border-2 btn btn-primary border-secondary position-absolute rounded-pill h-100"
                            style="top: 0; right: 25%; background: linear-gradient(45deg, #D1A6FF, #FFB6C1); border: none;">
                            Submit Now
                        </button>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <!-- First carousel item with light blue background -->
                            <div class="rounded carousel-item active" style="background-color: #81D4FA;"> <!-- Light Blue -->
                                <img src="img/one piece.jpg" class="rounded img-fluid w-100 h-100 bg-secondary" alt="First slide">
                                <a href="#" class="px-4 py-2 text-white rounded btn">One Piece</a>
                            </div>
                            <!-- Second carousel item with light blue background -->
                            <div class="rounded carousel-item" style="background-color: #81D4FA;"> <!-- Light Blue -->
                                <img src="img/naruto.jpg" class="rounded img-fluid w-100 h-100" alt="Second slide">
                                <a href="#" class="px-4 py-2 text-white rounded btn">Naruto</a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Hero End -->


    <!-- Featurs Section Start -->
    <div class="py-5 container-fluid featurs">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 text-center rounded featurs-item" style="background: linear-gradient(135deg, #C3A8E0, #F8BBD0, #81D4FA);">
                        <!-- Set the background color to light purple for the icon circle -->
                        <div class="mx-auto mb-5 featurs-icon btn-square rounded-circle" style="background-color: #C3A8E0;">
                            <i class="text-white fas fa-car-side fa-3x" style="color: #F8BBD0;"></i> <!-- Pink Icon -->
                        </div>
                        <div class="text-center featurs-content">
                            <h5>Free Shipping</h5>
                            <p class="mb-0">Free on order over $300</p>
                        </div>
                    </div>
                </div>                
                
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 text-center rounded featurs-item" style="background: linear-gradient(135deg, #C3A8E0, #F8BBD0, #81D4FA);">
                        <div class="mx-auto mb-5 featurs-icon btn-square rounded-circle" style="background-color: #C3A8E0;">
                            <i class="text-white fas fa-user-shield fa-3x" style="color: #F8BBD0;"></i> <!-- Pink Icon -->
                        </div>
                        <div class="text-center featurs-content">
                            <h5>Security Payment</h5>
                            <p class="mb-0">100% security payment</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 text-center rounded featurs-item" style="background: linear-gradient(135deg, #C3A8E0, #F8BBD0, #81D4FA);">
                        <div class="mx-auto mb-5 featurs-icon btn-square rounded-circle" style="background-color: #C3A8E0;">
                            <i class="text-white fas fa-exchange-alt fa-3x" style="color: #F8BBD0;"></i> <!-- Pink Icon -->
                        </div>
                        <div class="text-center featurs-content">
                            <h5>30 Day Return</h5>
                            <p class="mb-0">30 day money guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 text-center rounded featurs-item" style="background: linear-gradient(135deg, #C3A8E0, #F8BBD0, #81D4FA);">
                        <div class="mx-auto mb-5 featurs-icon btn-square rounded-circle" style="background-color: #C3A8E0;">
                            <i class="text-white fa fa-phone-alt fa-3x" style="color: #F8BBD0;"></i> <!-- Pink Icon -->
                        </div>
                        <div class="text-center featurs-content">
                            <h5>24/7 Support</h5>
                            <p class="mb-0">Support every time fast</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Featurs Section End -->


    <!-- Fruits Shop Start-->
    <div class="py-5 container-fluid fruite" > <!-- Gradient Background -->
        <div class="container py-5">
            <div class="text-center tab-class">
                <div class="row g-4">
                    <div class="mb-4 col-lg-6 text-start">
                        <h1 style="color: #64B5F6;">Our Anime Products</h1> <!-- Light Purple Color for Title -->
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="p-0 tab-pane fade show active">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    @foreach ($products as $product)
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <a href="{{ route('shop-detail', $product->id) }}">
                                                <div class="rounded position-relative fruite-item" style="background: linear-gradient(135deg, #81D4FA, #F8BBD0, #C3A8E0);"> <!-- Gradient Background for Items -->
                                                    <div class="fruite-img">
                                                        <img src="{{ Storage::url($product->photos) }}" class="img-fluid w-100 rounded-top" alt="">
                                                    </div>
                                                    <div class="px-3 py-1 text-white rounded bg-purple position-absolute" style="top: 10px; left: 10px; background-color: #9C6CB7;">
                                                        {{ $product->category ? $product->category->name : 'Uncategorized' }}
                                                    </div>
                                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom" style="border-color: #9C6CB7;">
                                                        <h4 style="color: #9C6CB7;">{{ $product->name }}</h4> <!-- Soft Purple Text for Product Name -->
                                                        <p style="color: #9C6CB7;">{{ $product->thumb_description }}</p> <!-- Soft Purple Text for Description -->
                                                        <div class="d-flex justify-content-center flex-lg-wrap">
                                                            <a href="{{ route('shop-detail', $product->id) }}" class="px-3 border btn border-secondary rounded-pill text-white" style="border-color: #9C6CB7; background: linear-gradient(45deg, #81D4FA, #F8BBD0, #C3A8E0);">
                                                                Detail
                                                            </a> <!-- Button with Gradient Background and Light Purple Border -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Fruits Shop End-->


    <!-- Featurs Start -->
    <div class="py-5 container-fluid service">
        <div class="container py-5">
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="border rounded service-item" style="background-color: #B3D8FF; border-color: #B3D8FF;">
                            <img src="img/hutao.jpg" class="img-fluid rounded-top w-100" alt="">
                            <div class="px-4 rounded-bottom">
                                <div class="p-4 text-center rounded service-content" style="background-color: #F8BBD0;">
                                    <h5 class="text-white">Keychain Hutao</h5>
                                    <h3 class="mb-0" style="color: #FF80AB;">20% OFF</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="border rounded service-item" style="background-color: #D1C4E9; border-color: #D1C4E9;">
                            <img src="img/nami.jpg" class="img-fluid rounded-top w-100" alt="">
                            <div class="px-4 rounded-bottom">
                                <div class="p-4 text-center rounded service-content" style="background-color: #FFCCE6;">
                                    <h5 class="text-white">Nami Shoes</h5>
                                    <h3 class="mb-0" style="color: #FF80AB;">Pink Colour</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#">
                        <div class="border rounded service-item" style="background-color: #AED6F1; border-color: #AED6F1;">
                            <img src="img/rimurut.jpg" class="img-fluid rounded-top w-100" alt="">
                            <div class="px-4 rounded-bottom">
                                <div class="p-4 text-center rounded service-content" style="background-color: #FFB3C1;">
                                    <h5 class="text-white">T-shirt Rimuru</h5>
                                    <h3 class="mb-0" style="color: #FF80AB;">Discount $30</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Featurs End -->


    <!-- Vesitable Shop Start-->
    <div class="py-5 container-fluid vesitable" > <!-- Gradient Background -->
        <div class="container py-5">
            <h1 class="mb-0" style="color:#64B5F6;">Anime Products</h1> <!-- Light Purple Color for Title -->
            <div class="owl-carousel vegetable-carousel justify-content-center">
                @foreach ($products as $product)
                    <div class="border rounded position-relative vesitable-item" style="background: linear-gradient(135deg, #81D4FA, #F8BBD0, #C3A8E0);"> <!-- Gradient Background for each item -->
                        <div class="vesitable-img">
                            <img src="{{ Storage::url($product->photos) }}" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="px-3 py-1 text-white rounded bg-purple position-absolute" style="top: 10px; right: 10px;"> <!-- Purple Category Badge -->
                            <div class="px-3 py-1 text-white rounded bg-purple position-absolute" style="top: 10px; left: 10px; background-color: #9C6CB7;">
                                {{ $product->category ? $product->category->name : 'Uncategorized' }}
                            </div>
                        </div>
                        <div class="p-4 rounded-bottom">
                            <h4>
                                <a style="color: #9C6CB7 !important" href="{{ route('shop-detail', $product->id) }}">{{ $product->name }}</a> <!-- Light Purple Color for Product Name -->
                            </h4>
                            <p style="color: #9C6CB7;">{{ $product->thumb_description }}</p> <!-- Light Purple Text for Description -->
                            <div class="d-flex justify-content-center flex-lg-wrap">
                                <a href="{{ route('shop-detail', $product->id) }}" class="px-3 border btn border-secondary rounded-pill text-white" style="border-color: #9C6CB7; background: linear-gradient(45deg, #81D4FA, #F8BBD0, #C3A8E0);">
                                    Detail
                                </a> <!-- Button with Gradient and Light Purple Border -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- Vesitable Shop End -->


    <!-- Banner Section Start-->
    <div class="my-5 container-fluid banner" style="background: linear-gradient(to bottom, #C3A8E0, #F8BBD0);"> <!-- Gradient: Top Light Purple, Bottom Light Pink -->
        <div class="container py-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="py-4">
                        <h1 class="text-white display-3">Ori brand product</h1>
                        <p class="mb-4 fw-normal display-3 text-dark">in Our Store</p>
                        <p class="mb-4 text-dark">The generated Lorem Ipsum is therefore always free from repetition
                            injected humour, or non-characteristic words etc.</p>
                            <a href="#"
                            class="px-5 py-3 border-2 banner-btn btn rounded-pill text-white" 
                            style="background-color: #64B5F6; border-color: #64B5F6;">BUY</a>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="img/anyap.png" class="rounded img-fluid w-100" alt="">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded-circle position-absolute"
                            style="width: 140px; height: 140px; top: 0; left: 0;">
                            <h1 style="font-size: 100px;">1</h1>
                            <div class="d-flex flex-column">
                                <span class="mb-0 h2">5$</span>
                                <span class="mb-0 h4 text-muted">Pcs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Banner Section End -->


    <!-- Bestsaler Product Start -->
    <div class="py-5 container-fluid">
        <div class="container py-5">
            <div class="mx-auto mb-5 text-center" style="max-width: 700px;">
                <h1 class="display-4">Bestseller Products</h1>
                <p>Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks
                    reasonable.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/yuri.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Keychain Yuuri</a>
                                <div class="my-3 d-flex">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                                <h4 class="mb-3">Rp 20.000</h4>
                                <a href="#" class="px-3 border btn border-secondary rounded-pill text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/raiden.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Keychain Raiden</a>
                                <div class="my-3 d-flex">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">Rp 20.000</h4>
                                <a href="#" class="px-3 border btn border-secondary rounded-pill text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/rimuruf.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Rimuru Figure</a>
                                <div class="my-3 d-flex">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">Rp 85.000</h4>
                                <a href="#" class="px-3 border btn border-secondary rounded-pill text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/luffytshirt.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">T-shirt Luffy</a>
                                <div class="my-3 d-flex">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                                <h4 class="mb-3">Rp 65.000</h4>
                                <a href="#" class="px-3 border btn border-secondary rounded-pill text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/sasuke.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Handbag Sasuke</a>
                                <div class="my-3 d-flex">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">Rp 156.000</h4>
                                <a href="#" class="px-3 border btn border-secondary rounded-pill text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="img/sakura.jpg" class="img-fluid rounded-circle w-100" alt="">
                            </div>
                            <div class="col-6">
                                <a href="#" class="h5">Handbag Sakura</a>
                                <div class="my-3 d-flex">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">Rp 170.000</h4>
                                <a href="#" class="px-3 border btn border-secondary rounded-pill text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="img/anya.jpg" class="rounded img-fluid" alt="">
                        <div class="py-4">
                            <a href="#" class="h5">Anya Figure</a>
                            <div class="my-3 d-flex justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="mb-3">Rp 78.000</h4>
                            <a href="#" class="px-3 border btn border-secondary rounded-pill text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="img/yor.jpg" class="rounded img-fluid" alt="">
                        <div class="py-4">
                            <a href="#" class="h5">Yor Shoes</a>
                            <div class="my-3 d-flex justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                            <h4 class="mb-3">Rp 300.000</h4>
                            <a href="#" class="px-3 border btn border-secondary rounded-pill text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="img/ayato.jpg" class="rounded img-fluid" alt="">
                        <div class="py-4">
                            <a href="#" class="h5">T-shirt Ayato</a>
                            <div class="my-3 d-flex justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4 class="mb-3">Rp 80.000</h4>
                            <a href="#" class="px-3 border btn border-secondary rounded-pill text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="text-center">
                        <img src="img/haikyuhoodie.jpg" class="rounded img-fluid" alt="">
                        <div class="py-2">
                            <a href="#" class="h5">Hoodie Haikyuu</a>
                            <div class="my-3 d-flex justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                            <h4 class="mb-3">Rp 90.000</h4>
                            <a href="#" class="px-3 border btn border-secondary rounded-pill text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bestsaler Product End -->


    <!-- Fact Start -->
    <div class="py-5 container-fluid">
        <div class="container">
            <div class="p-5 rounded bg-light">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="p-5 bg-white rounded counter">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>satisfied customers</h4>
                            <h1>1963</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="p-5 bg-white rounded counter">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>quality of service</h4>
                            <h1>99%</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="p-5 bg-white rounded counter">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>quality certificates</h4>
                            <h1>33</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="p-5 bg-white rounded counter">
                            <i class="fa fa-users text-secondary"></i>
                            <h4>Available Products</h4>
                            <h1>789</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact Start -->


    <!-- Tastimonial Start -->
    <div class="py-5 container-fluid testimonial">
        <div class="container py-5">
            <div class="text-center testimonial-header">
                <h4 class="text-primary">Our Testimonial</h4>
                <h1 class="mb-5 display-5 text-dark">Our Client Saying!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="p-4 rounded testimonial-item img-border-radius bg-light">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                            style="bottom: 30px; right: 0;"></i>
                        <div class="pb-4 mb-4 border-bottom border-secondary">
                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                                industry's standard dummy text ever since the 1500s,
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="rounded bg-secondary">
                                <img src="img/testimonial-1.jpg" class="rounded img-fluid"
                                    style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="ms-4 d-block">
                                <h4 class="text-dark">Ayaa Hiiragi</h4>
                                <p class="pb-3 m-0">Kuliner</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 rounded testimonial-item img-border-radius bg-light">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                            style="bottom: 30px; right: 0;"></i>
                        <div class="pb-4 mb-4 border-bottom border-secondary">
                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                                industry's standard dummy text ever since the 1500s,
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="rounded bg-secondary">
                                <img src="img/testimonial-1.jpg" class="rounded img-fluid"
                                    style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="ms-4 d-block">
                                <h4 class="text-dark">Mae mazuka</h4>
                                <p class="pb-3 m-0">TNI</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 rounded testimonial-item img-border-radius bg-light">
                    <div class="position-relative">
                        <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                            style="bottom: 30px; right: 0;"></i>
                        <div class="pb-4 mb-4 border-bottom border-secondary">
                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                                industry's standard dummy text ever since the 1500s,
                            </p>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap">
                            <div class="rounded bg-secondary">
                                <img src="img/testimonial-1.jpg" class="rounded img-fluid"
                                    style="width: 100px; height: 100px;" alt="">
                            </div>
                            <div class="ms-4 d-block">
                                <h4 class="text-dark">Yuurie</h4>
                                <p class="pb-3 m-0">Mommy</p>
                                <div class="d-flex pe-5">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tastimonial End -->
@endsection