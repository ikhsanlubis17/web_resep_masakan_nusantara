<div class="container py-5">
    <div class="page-header mb-5">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="header-content animate-fade-in-up">
                    <div class="header-badge d-inline-flex align-items-center mb-3">
                        <i class="bi bi-grid-3x3-gap-fill me-2"></i>
                        <span>Jelajahi Kategori</span>
                    </div>
                    <h1 class="header-title display-5 fw-bold font-display mb-3">
                        Kategori Resep
                    </h1>
                    <p class="header-description lead mb-0">
                        Jelajahi resep berdasarkan kategori masakan favorit Anda dari seluruh Nusantara
                    </p>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <div class="header-stats d-flex align-items-center justify-content-lg-end gap-4">
                    <div class="stat-item text-center">
                        <div class="stat-number h4 fw-bold mb-0">{{ $categories->count() }}</div>
                        <small class="stat-label">Kategori</small>
                    </div>
                    <div class="stat-divider d-none d-sm-block"></div>
                    <div class="stat-item text-center">
                        <div class="stat-number h4 fw-bold mb-0">{{ number_format($categories->sum('recipes_count')) }}</div>
                        <small class="stat-label">Total Resep</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
