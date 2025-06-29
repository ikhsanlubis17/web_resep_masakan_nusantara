<div class="col">
    <div class="recipe-card position-relative">
        @auth
            <button class="favorite-btn {{ $recipe->isFavoritedBy(auth()->user()) ? 'favorited' : '' }}" 
                    onclick="toggleFavorite({{ $recipe->id }}, this)"
                    title="{{ $recipe->isFavoritedBy(auth()->user()) ? 'Hapus dari favorit' : 'Tambah ke favorit' }}">
                <i class="bi bi-{{ $recipe->isFavoritedBy(auth()->user()) ? 'heart-fill' : 'heart' }}"></i>
            </button>
        @endauth
        
        <img src="{{ $recipe->image_url }}" 
             class="card-img-top" 
             alt="{{ $recipe->title }}"
             loading="lazy">
        
        <div class="card-body">
            <h5 class="card-title">{{ $recipe->title }}</h5>
            <p class="card-text">{{ Str::limit($recipe->description, 100) }}</p>
            
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex align-items-center text-muted small">
                    <i class="bi bi-clock me-1"></i>
                    <span>{{ $recipe->cooking_time }} menit</span>
                </div>
                <div class="d-flex align-items-center text-muted small">
                    <i class="bi bi-people me-1"></i>
                    <span>{{ $recipe->servings }} porsi</span>
                </div>
            </div>
            
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <span class="badge badge-primary me-2">{{ $recipe->category->name }}</span>
                    <small class="text-muted">
                        <i class="bi bi-heart-fill me-1"></i>
                        <span class="favorites-count-{{ $recipe->id }}">{{ $recipe->favorites_count }}</span>
                    </small>
                </div>
                <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-eye me-1"></i>
                    Lihat Resep
                </a>
            </div>
        </div>
    </div>
</div>
