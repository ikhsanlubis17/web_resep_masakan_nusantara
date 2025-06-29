<section class="categories-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5">
            <div class="section-badge d-inline-flex align-items-center mb-3">
                <i class="bi bi-grid-3x3-gap-fill me-2"></i>
                <span>Kategori Populer</span>
            </div>
            <h2 class="section-title display-5 fw-bold mb-3">
                Jelajahi Kategori
                <span class="d-block text-gradient">Resep Favorit</span>
            </h2>
            <p class="section-description lead">
                Temukan resep sesuai selera Anda dari berbagai kategori masakan tradisional Indonesia
            </p>
        </div>
        
        <div class="row g-4">
            @forelse($categories as $index => $category)
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('categories.show', $category) }}" class="category-link">
                        <div class="category-card animate-fade-in-up" 
                             style="animation-delay: {{ $index * 0.1 }}s; background-image: url('{{ asset('images/categories/' . ($category->background_image ?? 'default.jpg')) }}');">
                            <div class="category-overlay"></div>
                            <div class="category-content">
                                <div class="category-icon">
                                    <i class="{{ $category->icon ?? 'bi-bowl-hot-fill' }}"></i>
                                </div>
                                <h5 class="category-title">{{ $category->name }}</h5>
                                <p class="category-count">{{ number_format($category->recipes_count) }}+ resep</p>
                                <div class="category-arrow">
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                @include('beranda.partials.default-categories')
            @endforelse
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('categories.index') }}" class="btn btn-outline-primary btn-lg">
                <i class="bi bi-grid-3x3-gap me-2"></i>
                Lihat Semua Kategori
            </a>
        </div>
    </div>
</section>
