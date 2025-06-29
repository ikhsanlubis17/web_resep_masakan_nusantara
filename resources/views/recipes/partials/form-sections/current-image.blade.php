<div class="form-card mb-4">
    <div class="form-card-header">
        <h5 class="form-card-title">
            <i class="bi bi-image me-2"></i>Foto Saat Ini
        </h5>
    </div>
    <div class="form-card-body">
        <div class="current-image-wrapper">
            <img src="{{ $recipe->image_url }}" 
                 alt="{{ $recipe->title }}" 
                 class="current-image">
            <div class="current-image-overlay">
                <p class="overlay-text">Upload foto baru untuk mengganti gambar ini</p>
            </div>
        </div>
    </div>
</div>
