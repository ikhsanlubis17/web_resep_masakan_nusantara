@if($featuredRecipes->count() > 0)
<section class="featured-recipes-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5">
            <div class="section-badge d-inline-flex align-items-center mb-3">
                <i class="bi bi-star-fill me-2"></i>
                <span>Pilihan Editor</span>
            </div>
            <h2 class="section-title display-5 fw-bold mb-3">
                Resep Pilihan <span class="d-block text-gradient">Editor</span>
            </h2>
            <p class="section-description lead">
                Resep-resep terbaik yang telah dipilih khusus oleh tim editor kami
            </p>
        </div>
        
        <div class="row g-4">
            @foreach($featuredRecipes as $index => $recipe)
                <div class="col-lg-4 col-md-6">
                    <div class="featured-recipe-card animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s;">
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
                            
                            <div class="recipe-badges">
                                <span class="difficulty-badge badge-{{ strtolower($recipe->difficulty) }}">
                                    {{ $recipe->difficulty }}
                                </span>
                                <span class="featured-badge">
                                    <i class="bi bi-star-fill"></i>
                                    Featured
                                </span>
                            </div>
                        </div>
                        
                        <div class="recipe-content">
                            <div class="recipe-meta mb-2">
                                <div class="rating">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <span class="fw-medium">{{ number_format($recipe->rating, 1) }}</span>
                                </div>
                                <small class="author">oleh {{ $recipe->user->name }}</small>
                            </div>
                            
                            <h5 class="recipe-title">{{ $recipe->title }}</h5>
                            <p class="recipe-description">{{ Str::limit($recipe->description, 100) }}</p>
                            
                            <div class="recipe-stats mb-3">
                                <span class="stat-item">
                                    <i class="bi bi-clock"></i>
                                    {{ $recipe->total_time }} menit
                                </span>
                                <span class="stat-item">
                                    <i class="bi bi-people"></i>
                                    {{ $recipe->servings }} porsi
                                </span>
                            </div>
                            
                            <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-primary w-100">
                                <i class="bi bi-eye me-2"></i>
                                Lihat Resep
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('recipes.index', ['featured' => 1]) }}" class="btn btn-outline-primary btn-lg">
                <i class="bi bi-star me-2"></i>
                Lihat Semua Featured
            </a>
        </div>
    </div>
</section>
@endif
