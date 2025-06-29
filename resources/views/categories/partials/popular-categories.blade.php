<div class="container">
    <div class="popular-categories-section mb-5">
        <div class="section-header text-center mb-5">
            <div class="section-badge d-inline-flex align-items-center mb-3">
                <i class="bi bi-trending-up me-2"></i>
                <span>Terpopuler</span>
            </div>
            <h2 class="section-title display-6 fw-bold font-display mb-3">
                Kategori Terpopuler
            </h2>
            <p class="section-description lead">
                Kategori dengan resep terbanyak dan paling banyak dicari oleh komunitas kami
            </p>
        </div>
        
        <div class="row g-4">
            @foreach($categories->sortByDesc('recipes_count')->take(3) as $index => $category)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="popular-category-card animate-fade-in-up" 
                         style="animation-delay: {{ $index * 0.1 }}s;">
                        <div class="popular-rank">
                            <span class="rank-number">#{{ $index + 1 }}</span>
                        </div>
                        <div class="popular-category-content">
                            <div class="popular-category-icon">
                                <i class="{{ $category->icon ?? 'bi-bowl-hot-fill' }}"></i>
                            </div>
                            <h5 class="popular-title font-display">{{ $category->name }}</h5>
                            <p class="popular-description">
                                {{ $category->description ?? 'Koleksi resep ' . strtolower($category->name) . ' yang autentik' }}
                            </p>
                            <div class="popular-stats">
                                <div class="stat-highlight">
                                    <span class="highlight-number">{{ number_format($category->recipes_count) }}</span>
                                    <span class="highlight-label">resep tersedia</span>
                                </div>
                            </div>
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-outline-primary popular-btn">
                                <i class="bi bi-arrow-right me-2"></i>
                                Jelajahi Resep
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
