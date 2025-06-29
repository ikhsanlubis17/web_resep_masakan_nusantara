<div class="row g-4 mb-5">
    <div class="col-md-6">
        <div class="info-card">
            <div class="info-card-header">
                <h5 class="info-card-title">
                    <i class="bi bi-clock me-2"></i>Waktu Memasak
                </h5>
            </div>
            <div class="info-card-body text-center">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="h4 fw-bold text-primary">{{ $recipe->prep_time }}</div>
                        <small class="text-muted">Persiapan</small>
                    </div>
                    <div class="col-6">
                        <div class="h4 fw-bold text-primary">{{ $recipe->cook_time }}</div>
                        <small class="text-muted">Memasak</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="info-card">
            <div class="info-card-header">
                <h5 class="info-card-title">
                    <i class="bi bi-info-circle me-2"></i>Informasi
                </h5>
            </div>
            <div class="info-card-body text-center">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="h4 fw-bold text-primary">{{ $recipe->servings }}</div>
                        <small class="text-muted">Porsi</small>
                    </div>
                    <div class="col-6">
                        <div class="h4 fw-bold text-primary">{{ $recipe->favorites_count }}</div>
                        <small class="text-muted">Favorit</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
