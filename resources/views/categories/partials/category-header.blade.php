<div class="container py-5">
    <div class="category-header-section">
        <div class="row align-items-center">
            <div class="col">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('categories.index') }}">Kategori</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $category->name }}</li>
                    </ol>
                </nav>
                
                <div class="category-info d-flex align-items-center mb-4">
                    <div class="category-hero-icon me-4">
                        <i class="{{ $category->icon ?? 'bi-collection' }}"></i>
                    </div>
                    <div class="category-details">
                        <h1 class="category-hero-title display-6 fw-bold mb-2">{{ $category->name }}</h1>
                        <p class="category-hero-description mb-3">
                            {{ $category->description ?? 'Koleksi resep ' . strtolower($category->name) }}
                        </p>
                        <div class="category-meta d-flex align-items-center gap-4 flex-wrap">
                            <span class="meta-item">
                                <i class="bi bi-journal-text me-1"></i>
                                {{ number_format($recipes->total()) }} resep
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-people me-1"></i>
                                {{ number_format($recipes->total() * 150) }}+ views
                            </span>
                            <span class="meta-item">
                                <i class="bi bi-star-fill text-warning me-1"></i>
                                4.8 rating rata-rata
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="category-actions">
                    @auth
                        <a href="{{ route('recipes.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>
                            Tambah Resep
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-outline-primary">
                            <i class="bi bi-person-plus me-2"></i>
                            Bergabung
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
