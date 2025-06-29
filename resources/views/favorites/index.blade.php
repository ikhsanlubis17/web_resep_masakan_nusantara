@extends('layouts.app')

@section('title', 'Resep Favorit')

@section('content')
<div class="container py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="display-6 fw-bold mb-2">Resep Favorit</h1>
                <p class="text-muted mb-0">
                    @if($favorites->total() > 0)
                        {{ number_format($favorites->total()) }} resep yang Anda sukai
                    @else
                        Belum ada resep favorit
                    @endif
                </p>
            </div>
            <div class="col-auto">
                <a href="{{ route('recipes.index') }}" class="btn btn-primary">
                    <i class="bi bi-search me-2"></i>Jelajahi Resep
                </a>
            </div>
        </div>
    </div>

    @if($favorites->count() > 0)
        <div class="row g-4">
            @foreach($favorites as $favorite)
                @php $recipe = $favorite->recipe @endphp
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

                            <!-- Category Badge dan Difficulty Badge di bawahnya -->
                            <div class="position-absolute top-0 start-0 m-3">
                                <a href="{{ route('categories.show', $recipe->category) }}" class="badge bg-primary text-decoration-none">
                                    {{ $recipe->category->name }}
                                </a>
                                <div class="mt-2">
                                    <span class="badge 
                                        {{ $recipe->difficulty === 'Mudah' ? 'bg-success' : 
                                           ($recipe->difficulty === 'Sedang' ? 'bg-warning text-dark' : 'bg-danger') }}">
                                        {{ $recipe->difficulty }}
                                    </span>
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
                            
                            <h5 class="card-title">{{ $recipe->title }}</h5>
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
            {{ $favorites->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="bi bi-heart display-1 text-muted"></i>
            </div>
            <h3 class="text-muted mb-3">Belum Ada Resep Favorit</h3>
            <p class="text-muted mb-4">
                Mulai jelajahi resep dan klik tombol ❤️ untuk menambahkan ke favorit Anda.
            </p>
            <div class="d-flex gap-2 justify-content-center">
                <a href="{{ route('recipes.index') }}" class="btn btn-primary">
                    <i class="bi bi-search me-2"></i>Jelajahi Resep
                </a>
                <a href="{{ route('categories.index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-grid-3x3-gap me-2"></i>Lihat Kategori
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
