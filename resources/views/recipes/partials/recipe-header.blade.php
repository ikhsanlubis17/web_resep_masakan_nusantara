<div class="recipe-header mb-5">
    <div class="position-relative mb-4">
        <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}" 
             class="recipe-image-main img-fluid rounded-3 shadow-lg w-100" 
             style="height: 400px; object-fit: cover;">
        
        @auth
        <button class="favorite-btn {{ $recipe->isFavoritedBy(auth()->user()) ? 'favorited' : '' }}" 
                onclick="toggleFavorite({{ $recipe->id }}, this)">
            <i class="bi bi-heart{{ $recipe->isFavoritedBy(auth()->user()) ? '-fill' : '' }} favorite-icon"></i>
        </button>
        @endauth
        
        <!-- Recipe Stats Overlay -->
        <div class="recipe-stats-overlay">
            <div class="row g-3 text-white">
                <div class="col-6 col-md-3 text-center">
                    <i class="bi bi-clock-fill d-block mb-1"></i>
                    <small>{{ $recipe->total_time }} menit</small>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <i class="bi bi-people-fill d-block mb-1"></i>
                    <small>{{ $recipe->servings }} porsi</small>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <i class="bi bi-star-fill d-block mb-1"></i>
                    <small>{{ number_format($recipe->rating, 1) }} rating</small>
                </div>
                <div class="col-6 col-md-3 text-center">
                    <i class="bi bi-eye-fill d-block mb-1"></i>
                    <small class="favorites-count">{{ number_format($recipe->views) }} views</small>
                </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <h1 class="recipe-title display-5 fw-bold mb-3">{{ $recipe->title }}</h1>
            <p class="recipe-description lead text-muted">{{ $recipe->description }}</p>
        </div>
        <div class="text-end">
            <span class="badge difficulty-badge fs-6 mb-2">{{ $recipe->difficulty }}</span>
            <div class="small text-muted">
                <i class="bi bi-person-circle me-1"></i> oleh <strong>{{ $recipe->user->name }}</strong>
            </div>
            <div class="small text-muted">
                <i class="bi bi-calendar3 me-1"></i> {{ $recipe->created_at->format('d M Y') }}
            </div>
        </div>
    </div>
    
    @if($recipe->tags)
    <div class="mb-4">
        @foreach($recipe->tags_array as $tag)
        <span class="badge bg-light text-dark me-2 mb-2">#{{ trim($tag) }}</span>
        @endforeach
    </div>
    @endif
</div>
