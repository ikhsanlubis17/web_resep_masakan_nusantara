<div class="no-recipes-section text-center py-5">
    <div class="no-recipes-container">
        <div class="no-recipes-icon mb-4">
            <i class="bi bi-search"></i>
        </div>
        <h3 class="no-recipes-title mb-3">Tidak Ada Resep Ditemukan</h3>
        <p class="no-recipes-description mb-4">
            @if(request()->hasAny(['search', 'difficulty', 'sort']))
                Tidak ada resep yang sesuai dengan filter Anda. Coba ubah kriteria pencarian.
            @else
                Belum ada resep dalam kategori {{ $category->name }}. Jadilah yang pertama berkontribusi!
            @endif
        </p>
        <div class="no-recipes-actions d-flex gap-3 justify-content-center flex-wrap">
            @if(request()->hasAny(['search', 'difficulty', 'sort']))
                <a href="{{ route('categories.show', $category) }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-clockwise me-2"></i>
                    Reset Filter
                </a>
            @endif
            @auth
                <a href="{{ route('recipes.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>
                    Tambah Resep
                </a>
            @else
                <a href="{{ route('register') }}" class="btn btn-primary">
                    <i class="bi bi-person-plus me-2"></i>
                    Bergabung Sekarang
                </a>
            @endauth
        </div>
    </div>
</div>
