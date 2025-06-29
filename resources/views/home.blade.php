@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<style>
    @keyframes zoomOutBackground {
        0% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
        }
    }

    .hero-section {
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: "";
        position: absolute;
        inset: 0;
        background: url('/images/bg_home.jpg') no-repeat center center/cover;
        animation: zoomOutBackground 8s ease-out forwards;
        z-index: 0;
        will-change: transform;
    }

    .hero-section > .container {
        position: relative;
        z-index: 1;
    }

    .search-form-blur {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border-radius: 0.75rem;
        padding: 0.5rem 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        width: 100%;
        max-width: 320px;
    }

    .search-form-blur input {
        background: transparent;
        border: none;
        color: white;
        flex-grow: 1;
    }

    .search-form-blur input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .search-form-blur input:focus {
        outline: none;
    }

    .search-form-blur .btn {
        background-color: #fbbf24;
        color: #000;
    }

    .category-card {
        height: 220px;
        border-radius: 1rem;
        padding: 1.5rem;
        color: #fff;
        background-size: cover;
        background-position: center;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .category-card::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.3); /* semi gelap untuk kontras */
        backdrop-filter: blur(2px);
        z-index: 0;
    }

    .category-card > * {
        position: relative;
        z-index: 1;
    }

    .category-icon {
    background: rgba(255, 255, 255, 0.1); /* Semi transparan */
    backdrop-filter: blur(10px); /* Efek blur */
    -webkit-backdrop-filter: blur(10px); /* Safari */
    border-radius: 1rem;
    padding: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 64px;
    height: 64px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .category-card h5,
    .category-card p {
    color: #fff !important;
</style>

<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Kolom Kiri -->
            <div class="col-lg-8">
                <div class="animate-fade-in-up text-white">
                    <!-- Tagline -->
                    <div class="d-inline-flex align-items-center bg-white bg-opacity-10 rounded-pill px-4 py-2 mb-4">
                        <i class="bi bi-trending-up me-2"></i>
                        <span class="fw-medium">Platform Resep #1 di Indonesia</span>
                    </div>

                    <!-- Judul -->
                    <h1 class="display-3 fw-bold mb-4">
                        Jelajahi Cita Rasa
                        <span class="d-block text-gradient" style="background: linear-gradient(135deg, #fbbf24, #f59e0b); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Nusantara</span>
                    </h1>

                    <!-- Paragraf + Search Form Responsive -->
                    <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center gap-3 mb-4 flex-wrap">
                        <p class="lead mb-0 flex-grow-1" style="max-width: 100%;">
                            Temukan ribuan resep masakan tradisional Indonesia dari berbagai daerah. 
                            Dari Sabang sampai Merauke, cita rasa autentik ada di ujung jari Anda.
                        </p>

                        <form class="search-form-blur" action="{{ route('search') }}" method="GET">
                            <input type="text" name="q" placeholder="Cari resep favorit Anda...">
                            <button type="submit" class="btn">
                                <i class="bi bi-search me-1"></i> Cari
                            </button>
                        </form>
                    </div>

                    <!-- Stats -->
                    <div class="row g-4 mt-3 text-white">
                        <div class="col-4 text-center">
                            <div class="h2 fw-bold mb-1">{{ number_format($featuredRecipes->count() * 3333) }}+</div>
                            <small class="text-white-50">Resep</small>
                        </div>
                        <div class="col-4 text-center">
                            <div class="h2 fw-bold mb-1">{{ number_format($featuredRecipes->count() * 16666) }}+</div>
                            <small class="text-white-50">Pengguna</small>
                        </div>
                        <div class="col-4 text-center">
                            <div class="h2 fw-bold mb-1 d-flex align-items-center justify-content-center">
                                4.9 <i class="bi bi-star-fill text-warning ms-1" style="font-size: 0.8rem;"></i>
                            </div>
                            <small class="text-white-50">Rating</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">
                Jelajahi Kategori
                <span class="d-block text-gradient">Resep Favorit</span>
            </h2>
            <p class="lead text-muted">Temukan resep sesuai selera Anda dari berbagai kategori masakan tradisional Indonesia</p>
        </div>
        <div class="row g-4">
            @forelse($categories as $category)
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('categories.show', $category) }}" class="text-decoration-none">
                    <div class="category-card"
                         style="background-image: url('{{ asset('images/categories/' . ($category->background_image ?? 'default.jpg')) }}');">
                        <div class="category-icon">
                            <i class="{{ $category->icon ?? 'bi-bowl-hot-fill' }}"></i>
                        </div>
                        <h5>{{ $category->name }}</h5>
                        <p class="text-white-50">{{ number_format($category->recipes_count) }}+ resep</p>
                    </div>
                </a>
            </div>                        
            @empty
                <div class="col-lg-4 col-md-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-bowl-hot-fill"></i></div>
                        <h5>Makanan Utama</h5>
                        <p class="text-muted">2,500+ resep</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-cup-hot-fill"></i></div>
                        <h5>Minuman</h5>
                        <p class="text-muted">800+ resep</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-cookie"></i></div>
                        <h5>Camilan</h5>
                        <p class="text-muted">1,200+ resep</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Featured Recipes -->
@if($featuredRecipes->count() > 0)
<section class="py-5" style="background: linear-gradient(135deg, #fef7f0 0%, #fff5f5 100%);">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Resep Pilihan <span class="d-block text-gradient">Editor</span></h2>
            <p class="lead text-muted">Resep-resep terbaik yang telah dipilih khusus oleh tim editor kami</p>
        </div>
        <div class="row g-4">
            @foreach($featuredRecipes as $recipe)
                <div class="col-lg-4 col-md-6">
                    <div class="recipe-card">
                        <div class="position-relative">
                            <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" class="card-img-top">
                            @auth
                                <button class="favorite-btn {{ $recipe->isFavoritedBy(auth()->user()) ? 'favorited' : '' }}" 
                                        onclick="toggleFavorite({{ $recipe->id }}, this)"
                                        style="background: rgba(0,0,0,0.6); border: none; border-radius: 50%; 
                                               width: 44px; height: 44px; display: flex; align-items: center; 
                                               justify-content: center; transition: all 0.2s ease; cursor: pointer;
                                               position: absolute; top: 12px; right: 12px;">
                                    <i class="bi bi-heart{{ $recipe->isFavoritedBy(auth()->user()) ? '-fill' : '' }} favorite-icon" 
                                       style="color: {{ $recipe->isFavoritedBy(auth()->user()) ? '#dc3545' : 'white' }}; 
                                              font-size: 1.2rem; transition: all 0.2s ease;"></i>
                                </button>
                            @endauth
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge {{ $recipe->difficulty === 'Mudah' ? 'badge-success' : ($recipe->difficulty === 'Sedang' ? 'badge-warning' : 'badge-danger') }}">
                                    {{ $recipe->difficulty }}
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-star-fill text-warning me-1"></i>
                                    <span class="fw-medium">{{ number_format($recipe->rating, 1) }}</span>
                                </div>
                                <small class="text-muted">oleh {{ $recipe->user->name }}</small>
                            </div>
                            <h5 class="card-title">{{ $recipe->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($recipe->description, 100) }}</p>
                            <div class="d-flex justify-content-between text-muted small mb-3">
                                <span><i class="bi bi-clock me-1"></i>{{ $recipe->total_time }} menit</span>
                                <span><i class="bi bi-people me-1"></i>{{ $recipe->servings }} porsi</span>
                            </div>
                            <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-primary w-100">Lihat Resep</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('recipes.index') }}" class="btn btn-outline-primary btn-lg">Lihat Semua Resep Pilihan</a>
        </div>
    </div>
</section>
@endif

<!-- Popular Recipes -->
@if($popularRecipes->count() > 0)
<section class="py-5 bg-white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-gradient-primary rounded-3 p-2 me-3">
                        <i class="bi bi-trending-up text-white"></i>
                    </div>
                    <h2 class="display-6 fw-bold mb-0">Trending Minggu Ini</h2>
                </div>
                <p class="text-muted">Resep paling populer yang sedang banyak dicoba</p>
            </div>
            <a href="{{ route('recipes.index') }}" class="btn btn-primary d-none d-md-block">Lihat Semua</a>
        </div>
        <div class="row g-4">
            @foreach($popularRecipes as $index => $recipe)
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                            @auth
                                <button class="favorite-btn {{ $recipe->isFavoritedBy(auth()->user()) ? 'favorited' : '' }}" 
                                        onclick="toggleFavorite({{ $recipe->id }}, this)"
                                        style="background: rgba(0,0,0,0.6); border: none; border-radius: 50%; 
                                               width: 44px; height: 44px; display: flex; align-items: center; 
                                               justify-content: center; transition: all 0.2s ease; cursor: pointer;
                                               position: absolute; top: 12px; right: 12px;">
                                    <i class="bi bi-heart{{ $recipe->isFavoritedBy(auth()->user()) ? '-fill' : '' }} favorite-icon" 
                                       style="color: {{ $recipe->isFavoritedBy(auth()->user()) ? '#dc3545' : 'white' }}; 
                                              font-size: 1.2rem; transition: all 0.2s ease;"></i>
                                </button>
                            @endauth
                            <div class="position-absolute top-0 start-0 m-2">
                                <span class="badge bg-gradient-primary">#{{ $index + 1 }}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <h6 class="card-title fw-bold mb-0">{{ $recipe->title }}</h6>
                                <span class="badge bg-dark bg-opacity-75 ms-2" style="white-space: nowrap;">
                                    <i class="bi bi-eye me-1"></i>{{ number_format($recipe->views) }}
                                </span>
                            </div>                            
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-star-fill text-warning me-1"></i>
                                <span class="small fw-medium">{{ number_format($recipe->rating, 1) }}</span>
                                <span class="small text-muted ms-1">({{ $recipe->favorites_count }} ulasan)</span>
                            </div>
                            <div class="d-flex justify-content-between text-muted small">
                                <span><i class="bi bi-clock me-1"></i>{{ $recipe->total_time }} menit</span>
                                <span><i class="bi bi-people me-1"></i>{{ $recipe->servings }} porsi</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4 d-md-none">
            <a href="{{ route('recipes.index') }}" class="btn btn-primary">Lihat Semua Trending</a>
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="py-5" style="background: linear-gradient(135deg, #f97316 0%, #dc2626 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="text-white fw-bold mb-2">Siap Berbagi Resep Anda?</h3>
                <p class="text-white opacity-90 mb-0">Bergabunglah dengan ribuan chef dan food enthusiast lainnya dalam melestarikan cita rasa Nusantara</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                @auth
                    <a href="{{ route('recipes.create') }}" class="btn btn-light btn-lg">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Resep
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-light btn-lg">
                        <i class="bi bi-person-plus me-2"></i>Daftar Sekarang
                    </a>
                @endauth
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
function toggleFavorite(recipeId, button) {
    fetch(`/recipes/${recipeId}/toggle-favorite`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    }).then(res => res.json())
      .then(data => {
          const icon = button.querySelector('.favorite-icon');
          if (data.favorited) {
              icon.classList.remove('bi-heart');
              icon.classList.add('bi-heart-fill');
              icon.style.color = '#dc3545';
          } else {
              icon.classList.remove('bi-heart-fill');
              icon.classList.add('bi-heart');
              icon.style.color = 'white';
          }
      }).catch(err => console.error('Gagal toggle favorit:', err));
}
</script>
@endsection
