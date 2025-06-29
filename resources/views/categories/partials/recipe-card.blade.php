<div class="recipe-card animate-fade-in-up" style="animation-delay: {{ ($index ?? 0) * 0.1 }}s;">
    <div class="recipe-image-wrapper">
        <img src="{{ $recipe->image_url }}" 
             alt="{{ $recipe->title }}" 
             class="recipe-image"
             loading="lazy">
        
        <div class="recipe-badges">
            <span class="difficulty-badge badge-{{ strtolower($recipe->difficulty) }}">
                {{ $recipe->difficulty }}
            </span>
        </div>
        
        @auth
            <button class="favorite-btn {{ $recipe->isFavoritedBy(auth()->user()) ? 'favorited' : '' }}" 
                    onclick="toggleFavorite({{ $recipe->id }}, this)"
                    title="{{ $recipe->isFavoritedBy(auth()->user()) ? 'Hapus dari favorit' : 'Tambah ke favorit' }}">
                <i class="bi bi-heart{{ $recipe->isFavoritedBy(auth()->user()) ? '-fill' : '' }}"></i>
            </button>
        @endauth
        
        <div class="recipe-overlay">
            <a href="{{ route('recipes.show', $recipe) }}" class="overlay-btn">
                <i class="bi bi-eye"></i>
            </a>
        </div>
    </div>
    
    <div class="recipe-content">
        <div class="recipe-meta mb-2">
            <div class="rating">
                <i class="bi bi-star-fill text-warning"></i>
                <span class="rating-value">{{ number_format($recipe->rating, 1) }}</span>
            </div>
            <div class="views-badge">
                <i class="bi bi-eye"></i>
                {{ number_format($recipe->views) }}
            </div>
        </div>
        
        <h5 class="recipe-title">{{ $recipe->title }}</h5>
        <p class="recipe-description">{{ Str::limit($recipe->description, 100) }}</p>
        
        <div class="recipe-stats mb-3">
            <span class="stat-item">
                <i class="bi bi-clock"></i>
                {{ $recipe->total_time }}m
            </span>
            <span class="stat-item">
                <i class="bi bi-people"></i>
                {{ $recipe->servings }}
            </span>
            <span class="stat-item">
                <i class="bi bi-heart"></i>
                <span class="favorites-count">{{ $recipe->favorites_count }}</span>
            </span>
        </div>
        
        <div class="recipe-footer">
            <small class="recipe-author">oleh {{ $recipe->user->name }}</small>
            <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-primary btn-sm">
                Lihat Resep
            </a>
        </div>
    </div>
</div>
