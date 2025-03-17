    <!-- Spinner Start -->

    <style>
        /* Custom styles for the dropdown menu */
.dropdown-menu {
    background-color: #F8BBD0; /* Light Pink Dropdown Background */
}

/* Custom hover effect for dropdown items */
.dropdown-item:hover {
    background-color: #F06292 !important; /* Lighter Pink Hover Color */
    color: white !important; /* Text color change on hover */
}

    </style>
    
    <div id="spinner"
        class="bg-white show w-100 vh-100 position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar" style="background-color: #7E57C2;"> <!-- Soft Purple Background -->
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3">
                        <i class="fas fa-map-marker-alt me-2" style="color: #F48FB1;"></i> <!-- Soft Pink Icon Color -->
                        <a href="#" class="text-white">Sempu, Banyuwangi</a>
                    </small>
                    <small class="me-3">
                        <i class="fas fa-envelope me-2" style="color: #F48FB1;"></i> <!-- Soft Pink Icon Color -->
                        <a href="#" class="text-white">MerchId@gmail.com</a>
                    </small>
                    
                </div>
                <div class="top-link pe-2">
                    <a href="#" class="text-white"><small class="mx-2 text-white">Privacy Policy</small>/</a>
                    <a href="#" class="text-white"><small class="mx-2 text-white">Terms of Use</small>/</a>
                    <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
                </div>
            </div>
        </div>
        
        <div class="container px-0">
            <nav class="bg-white navbar navbar-light navbar-expand-xl">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <h1 class="display-6" style="color: #64B5F6;">Merchandise Anime</h1> <!-- Soft Blue Color -->

                </a>
                <button class="px-3 py-2 navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="bg-white collapse navbar-collapse" id="navbarCollapse">
                    <div class="mx-auto navbar-nav">
                        <a href="{{ route('home') }}"
                            class="nav-item nav-link{{ request()->routeIs('home') ? ' active' : '' }}"
                            style="color: #64B5F6;">Home</a> <!-- Soft Blue -->
                        <a href="{{ route('shop') }}"
                            class="nav-item nav-link{{ request()->routeIs('shop') ? ' active' : '' }}"
                            style="color: #64B5F6;">Shop</a> <!-- Soft Blue -->
                        <a href="{{ route('contact') }}"
                            class="nav-item nav-link{{ request()->routeIs('contact') ? ' active' : '' }}"
                            style="color: #64B5F6;">Contact</a> <!-- Soft Blue -->
                    </div>
                </div>                

                    <div class="m-3 d-flex me-0">
                        @auth
                        <a href="{{ route('cart') }}" class="my-auto position-relative me-4">
                            @php
                                $user = Auth::user();
                                $carts = \App\Models\Cart::where('users_id', $user->id)->count();
                            @endphp
                            @if ($carts > 0)
                                <i class="fa fa-shopping-bag fa-2x" style="color: #81D4FA;"></i> <!-- Light Blue Color -->
                                <span class="px-1 position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                                    {{ $carts }}
                                </span>
                            @else
                                <i class="fa fa-shopping-bag fa-2x" style="color: #81D4FA;"></i> <!-- Light Blue Color -->
                                <span class="px-1 position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                                    0
                                </span>
                            @endif
                        </a>
                    @endauth
                    

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-user fa-2x" style="color: #81D4FA;"></i> <!-- Light Blue Icon -->
                        </a>
                        <div class="m-0 dropdown-menu" style="background-color: #F8BBD0; border-radius: 0;"> <!-- Light Pink Dropdown -->
                            @if (Route::has('login'))
                                <nav class="flex justify-end flex-1 -mx-3">
                                    @auth
                                        <x-dropdown-link :href="route('profile.edit')" class="dropdown-item">
                                            Hi, {{ Auth::user()->name }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('order')" class="dropdown-item">
                                            Order List
                                        </x-dropdown-link>
                        
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                        
                                            <x-dropdown-link :href="route('logout')" class="dropdown-item"
                                                onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}" class="dropdown-item">
                                            Log in
                                        </a>
                        
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="dropdown-item">
                                                Register
                                            </a>
                                        @endif
                                    @endauth
                                </nav>
                            @endif
                        </div>
                        
                    </div>
                    
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
