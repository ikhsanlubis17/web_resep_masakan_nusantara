<div class="container">
    <div class="statistics-section mb-5">
        <div class="row g-4">
            <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="stats-card animate-fade-in-up" style="animation-delay: 0.1s;">
                    <div class="stats-icon">
                        <i class="bi bi-journal-text"></i>
                    </div>
                    <div class="stats-content">
                        <h3 class="stats-number font-display">{{ number_format($categories->sum('recipes_count')) }}</h3>
                        <p class="stats-label">Total Resep</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="stats-card animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="stats-icon">
                        <i class="bi bi-grid-3x3-gap"></i>
                    </div>
                    <div class="stats-content">
                        <h3 class="stats-number font-display">{{ $categories->count() }}</h3>
                        <p class="stats-label">Kategori</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="stats-card animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="stats-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="stats-content">
                        <h3 class="stats-number font-display">2.5K+</h3>
                        <p class="stats-label">Chef Aktif</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="stats-card animate-fade-in-up" style="animation-delay: 0.4s;">
                    <div class="stats-icon">
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <div class="stats-content">
                        <h3 class="stats-number font-display">4.9</h3>
                        <p class="stats-label">Rating Rata-rata</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
