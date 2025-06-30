<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand font-display" href="{{ route('home') }}">
            <div class="brand-icon">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Nusantara Flavours" class="img-fluid" style="height: 40px;">
            </div>            
            <div class="brand-text d-none d-sm-block">
                <div class="brand-title">Nusantara Flavours</div>
                <div class="brand-subtitle">Cita Rasa Nusantara</div>
            </div>
        </a>
        
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <i class="bi bi-list fs-4"></i>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="bi bi-house-door-fill"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                        <i class="bi bi-grid-3x3-gap-fill"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('search') ? 'active' : '' }}" href="{{ route('search') }}">
                        <i class="bi bi-search"></i>
                        <span>Pencarian</span>
                    </a>
                </li>
            </ul>
            
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                <!-- Theme Toggle -->
                <li class="nav-item">
                    <button class="nav-link btn border-0 bg-transparent theme-toggle" id="themeToggle" title="Toggle Theme">
                        <i class="bi bi-sun-fill theme-icon-light"></i>
                        <i class="bi bi-moon-fill theme-icon-dark d-none"></i>
                    </button>
                </li>
                
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i>
                                <span>Masuk</span>
                            </a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-primary ms-2" href="{{ route('register') }}">
                                <i class="bi bi-person-plus-fill"></i>
                                <span>Daftar</span>
                            </a>
                        </li>
                    @endif
                @else
                    @include('layouts.partials.user-menu')
                @endguest
            </ul>
        </div>
    </div>
</nav>
