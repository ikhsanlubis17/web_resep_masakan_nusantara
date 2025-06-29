<div class="container">
    <section class="cta-section py-5">
        <div class="cta-content text-center">
            <div class="cta-icon mb-4">
                <i class="bi bi-search"></i>
            </div>
            <h4 class="cta-title font-display mb-3">
                Tidak Menemukan Kategori yang Dicari?
            </h4>
            <p class="cta-description mb-4">
                Gunakan fitur pencarian untuk menemukan resep spesifik atau jelajahi semua resep yang tersedia
            </p>
            <div class="cta-actions d-flex flex-column flex-sm-row gap-3 justify-content-center">
                <a href="{{ route('search') }}" class="btn btn-primary cta-btn">
                    <i class="bi bi-search me-2"></i>
                    Cari Resep
                </a>
                <a href="{{ route('recipes.index') }}" class="btn btn-outline-primary cta-btn">
                    <i class="bi bi-grid-3x3-gap me-2"></i>
                    Lihat Semua Resep
                </a>
            </div>
        </div>
    </section>
</div>
