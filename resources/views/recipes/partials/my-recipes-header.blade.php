<div class="container py-5">
    <div class="my-recipes-header">
        <div class="row mb-4 align-items-center">
            <div class="col-md-8">
                <div class="header-content animate-fade-in-up">
                    <div class="header-badge d-inline-flex align-items-center mb-3">
                        <i class="bi bi-journal-text me-2"></i>
                        <span>Koleksi Pribadi</span>
                    </div>
                    <h1 class="header-title display-6 fw-bold mb-2">Resep Saya</h1>
                    <p class="header-description">Kelola dan lihat semua resep yang telah Anda buat</p>
                </div>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <div class="header-stats d-flex justify-content-md-end align-items-center gap-4 flex-wrap">
                    <div class="stat-item text-center">
                        <div class="stat-number h5 fw-bold mb-0">{{ $recipes->total() }}</div>
                        <small class="stat-label">Total Resep</small>
                    </div>
                    <a href="{{ route('recipes.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i>Tambah Resep
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
