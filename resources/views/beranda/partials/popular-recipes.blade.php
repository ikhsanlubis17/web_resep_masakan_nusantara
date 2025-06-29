@if($popularRecipes->count() > 0)
<section class="popular-recipes-section py-5">
    <div class="container">
        <div class="section-header d-flex justify-content-between align-items-end mb-5">
            <div>
                <div class="section-badge d-inline-flex align-items-center mb-3">
                    <i class="bi bi-trending-up me-2"></i>
                    <span>Trending</span>
                </div>
                <h2 class="section-title display-6 fw-bold mb-2">Trending Minggu Ini</h2>
                <p class="section-description">Resep paling populer yang sedang banyak dicoba</p>
            </div>
            <a href="{{ route('recipes.index', ['sort' => 'popular']) }}" 
               class="btn btn-primary d-none d-md-block">
                Lihat Semua
            </a>
        </div>
        
        <div class="row g-4">
            @foreach($popularRecipes as $index => $recipe)
                <div class="col-lg-3 col-md-6">
                    <div class="popular-recipe-card animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
                        <div class="recipe-image-wrapper">
                            <img src="{{ $recipe->image_url }}" 
                                 alt="{{ $recipe->title }}" 
                                 class="recipe-image">
                            
                            @auth
                                <button class="favorite-btn {{ $recipe->isFavoritedBy(auth()->user()) ? 'favorited' : '' }}" 
                                        onclick="toggleFavorite({{ $recipe->id }}, this)"
                                        title="{{ $recipe->isFavoritedBy(auth()->user()) ? 'Hapus dari favorit' : 'Tambah ke favorit' }}">
                                    <i class="bi bi-heart{{ $recipe->isFavoritedBy(auth()->user()) ? '-fill' : '' }}"></i>
                                </button>
                            @endauth
                            
                            <div class="trending-rank">
                                <span class="rank-number">#{{ $index + 1 }}</span>
                            </div>
                            
                            <div class="recipe-overlay">
                                <a href="{{ route('recipes.show', $recipe) }}" class="overlay-btn">
                                    <i class="bi bi-play-fill"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="recipe-content">
                            <div class="recipe-header">
                                <h6 class="recipe-title">{{ $recipe->title }}</h6>
                                <div class="views-badge">
                                    <i class="bi bi-eye"></i>
                                    {{ number_format($recipe->views) }}
                                </div>
                            </div>
                            
                            <div class="recipe-rating mb-2">
                                <i class="bi bi-star-fill text-warning"></i>
                                <span class="rating-value">{{ number_format($recipe->rating, 1) }}</span>
                                <span class="rating-count">({{ $recipe->favorites_count }})</span>
                            </div>
                            
                            <div class="recipe-stats">
                                <span class="stat-item">
                                    <i class="bi bi-clock"></i>
                                    {{ $recipe->total_time }}m
                                </span>
                                <span class="stat-item">
                                    <i class="bi bi-people"></i>
                                    {{ $recipe->servings }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-4 d-md-none">
            <a href="{{ route('recipes.index', ['sort' => 'popular']) }}" class="btn btn-primary">
                Lihat Semua Trending
            </a>
        </div>
    </div>
</section>
@endif
