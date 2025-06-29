@extends('layouts.app')

@section('title', 'Pencarian Resep')

@section('content')
<div class="container py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="display-6 fw-bold mb-2">Pencarian Resep</h1>
                <p class="text-muted mb-0">
                    @if($query)
                        Hasil pencarian untuk "<strong>{{ $query }}</strong>"
                        @if($recipes->total() > 0)
                            - {{ number_format($recipes->total()) }} resep ditemukan
                        @endif
                    @else
                        Temukan resep favorit Anda dengan mudah
                    @endif
                </p>
            </div>
        </div>
    </div>

    <!-- Search Form -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('search') }}" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="q" class="form-label">Kata Kunci</label>
                    <input type="text" class="form-control" id="q" name="q" 
                           value="{{ $query }}" placeholder="Nama resep, bahan, atau tag...">
                </div>
                <div class="col-md-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select class="form-select" id="category" name="category">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $categoryId == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="difficulty" class="form-label">Tingkat Kesulitan</label>
                    <select class="form-select" id="difficulty" name="difficulty">
                        <option value="">Semua Tingkat</option>
                        <option value="Mudah" {{ $difficulty == 'Mudah' ? 'selected' : '' }}>Mudah</option>
                        <option value="Sedang" {{ $difficulty == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                        <option value="Sulit" {{ $difficulty == 'Sulit' ? 'selected' : '' }}>Sulit</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search me-1"></i>Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Search Results -->
    @if($recipes->count() > 0)
        <div class="row g-4">
            @foreach($recipes as $recipe)
                <div class="col-lg-4 col-md-6">
                    <div class="recipe-card">
                        <div class="position-relative">
                            <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" class="card-img-top">
                            
                            <!-- Image Overlay Badges -->
                            <div class="position-absolute top-0 start-0 end-0 p-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <!-- Left side - Category and Difficulty Badges (Stacked) -->
                                    <div class="d-flex flex-column gap-2">
                                        <!-- Category Badge -->
                                        <span class="badge bg-primary">{{ $recipe->category->name }}</span>
                                        <!-- Difficulty Badge -->
                                        <span class="badge {{ $recipe->difficulty === 'Mudah' ? 'badge-success' : ($recipe->difficulty === 'Sedang' ? 'badge-warning' : 'badge-danger') }}">
                                            {{ $recipe->difficulty }}
                                        </span>
                                    </div>
                                    
                                    <!-- Right side - Only Favorite Button -->
                                    @auth
                                        <button class="favorite-btn {{ $recipe->isFavoritedBy(auth()->user()) ? 'favorited' : '' }}" 
                                                onclick="toggleFavorite({{ $recipe->id }}, this)"
                                                style="background: rgba(0,0,0,0.6); border: none; border-radius: 50%; 
                                                       width: 44px; height: 44px; display: flex; align-items: center; 
                                                       justify-content: center; transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
                                                       cursor: pointer; position: relative; overflow: hidden;">
                                            <i class="bi bi-heart{{ $recipe->isFavoritedBy(auth()->user()) ? '-fill' : '' }} favorite-icon" 
                                               style="color: {{ $recipe->isFavoritedBy(auth()->user()) ? '#dc3545' : 'white' }}; 
                                                      font-size: 1.2rem; transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
                                                      transform-origin: center;"></i>
                                        </button>
                                    @endauth
                                </div>
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
                            
                            <!-- Title with Views Badge -->
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0 flex-grow-1 me-2">{{ $recipe->title }}</h5>
                                <span class="badge bg-secondary bg-opacity-75 flex-shrink-0">
                                    <i class="bi bi-eye me-1"></i>{{ number_format($recipe->views) }}
                                </span>
                            </div>
                            
                            <p class="card-text text-muted">{{ Str::limit($recipe->description, 100) }}</p>
                            
                            <div class="d-flex justify-content-between text-muted small mb-3">
                                <span><i class="bi bi-clock me-1"></i>{{ $recipe->total_time }} menit</span>
                                <span><i class="bi bi-people me-1"></i>{{ $recipe->servings }} porsi</span>
                                <span><i class="bi bi-heart me-1"></i>{{ $recipe->favorites_count }}</span>
                            </div>
                            
                            <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-primary w-100">
                                <i class="bi bi-eye me-1"></i>Lihat Resep
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $recipes->appends(request()->query())->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="bi bi-search display-1 text-muted"></i>
            </div>
            <h3 class="text-muted mb-3">
                @if($query || $categoryId || $difficulty)
                    Tidak Ada Resep Ditemukan
                @else
                    Mulai Pencarian Anda
                @endif
            </h3>
            <p class="text-muted mb-4">
                @if($query || $categoryId || $difficulty)
                    Tidak ada resep yang sesuai dengan kriteria pencarian Anda. Coba ubah kata kunci atau filter.
                @else
                    Masukkan kata kunci untuk mencari resep favorit Anda.
                @endif
            </p>
            @if($query || $categoryId || $difficulty)
                <a href="{{ route('search') }}" class="btn btn-outline-primary me-2">
                    <i class="bi bi-arrow-clockwise me-2"></i>Reset Pencarian
                </a>
            @endif
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="bi bi-house me-2"></i>Kembali ke Beranda
            </a>
        </div>
    @endif
</div>
@endsection