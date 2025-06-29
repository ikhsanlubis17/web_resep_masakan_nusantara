<div class="container">
    <div class="filter-section mb-4">
        <div class="filter-card">
            <div class="filter-header mb-3">
                <h5 class="filter-title mb-0">
                    <i class="bi bi-funnel me-2"></i>
                    Filter & Pencarian
                </h5>
            </div>
            <form method="GET" action="{{ route('categories.show', $category) }}" class="filter-form">
                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label for="search" class="form-label">Cari Resep</label>
                        <div class="search-input-wrapper">
                            <i class="bi bi-search search-icon"></i>
                            <input type="text" 
                                   class="form-control search-input" 
                                   id="search" 
                                   name="search" 
                                   value="{{ request('search') }}" 
                                   placeholder="Nama resep atau bahan...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="difficulty" class="form-label">Tingkat Kesulitan</label>
                        <select class="form-select" id="difficulty" name="difficulty">
                            <option value="">Semua Tingkat</option>
                            <option value="Mudah" {{ request('difficulty') == 'Mudah' ? 'selected' : '' }}>Mudah</option>
                            <option value="Sedang" {{ request('difficulty') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                            <option value="Sulit" {{ request('difficulty') == 'Sulit' ? 'selected' : '' }}>Sulit</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="sort" class="form-label">Urutkan</label>
                        <select class="form-select" id="sort" name="sort">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Terpopuler</option>
                            <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Rating Tertinggi</option>
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nama A-Z</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100 filter-btn">
                            <i class="bi bi-search me-1"></i>
                            Filter
                        </button>
                    </div>
                </div>
                
                @if(request()->hasAny(['search', 'difficulty', 'sort']))
                    <div class="filter-actions mt-3">
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-x-circle me-1"></i>
                            Reset Filter
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
