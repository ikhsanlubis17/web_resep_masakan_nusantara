<div class="container py-5">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb custom-breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">
                                <i class="bi bi-house-door me-1"></i>Beranda
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('my-recipes') }}">
                                <i class="bi bi-journal-text me-1"></i>Resep Saya
                            </a>
                        </li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </nav>
                
                <div class="header-content animate-fade-in-up">
                    <div class="header-badge d-inline-flex align-items-center mb-3">
                        <i class="bi bi-plus-circle me-2"></i>
                        <span>Buat Resep</span>
                    </div>
                    <h1 class="header-title display-5 fw-bold font-display mb-3">
                        {{ $title }}
                    </h1>
                    <p class="header-description lead mb-0">
                        {{ $subtitle }}
                    </p>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <div class="header-actions">
                    @if(isset($recipe))
                        <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-eye me-2"></i>Lihat Resep
                        </a>
                    @else
                        <a href="{{ route('my-recipes') }}" class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-arrow-left me-2"></i>Kembali ke Resep Saya
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
