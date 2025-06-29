<div class="container py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <div class="header-content animate-fade-in-up">
                    <div class="header-badge d-inline-flex align-items-center mb-3">
                        <i class="bi bi-collection me-2"></i>
                        <span>Koleksi Resep</span>
                    </div>
                    <h1 class="header-title display-6 fw-bold mb-2">Semua Resep</h1>
                    <p class="header-description mb-0">
                        Jelajahi {{ number_format($recipes->total()) }} resep masakan tradisional Indonesia
                    </p>
                </div>
            </div>
            <div class="col-auto">
                <div class="header-actions">
                    @auth
                        <a href="{{ route('recipes.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Resep
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-outline-primary">
                            <i class="bi bi-person-plus me-2"></i>Bergabung
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
