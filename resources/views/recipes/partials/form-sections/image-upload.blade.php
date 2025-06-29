<div class="form-card mb-4">
    <div class="form-card-header">
        <h5 class="form-card-title">
            <i class="bi bi-image me-2"></i>{{ isset($recipe) && $recipe->image ? 'Ganti Foto' : 'Upload Foto' }}
        </h5>
    </div>
    <div class="form-card-body">
        <div class="mb-3">
            <label for="image" class="form-label">{{ isset($recipe) && $recipe->image ? 'Foto Baru' : 'Upload Foto' }}</label>
            <div class="image-upload-wrapper">
                <input type="file" 
                       class="form-control @error('image') is-invalid @enderror" 
                       id="image" 
                       name="image" 
                       accept="image/*">
                <div class="upload-hint">
                    <i class="bi bi-cloud-upload"></i>
                    <span>Klik untuk upload atau drag & drop</span>
                </div>
            </div>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">
                <i class="bi bi-info-circle me-1"></i>
                Format: JPG, PNG, GIF. Maksimal 2MB. Foto yang menarik akan meningkatkan minat pembaca.
            </div>
        </div>
        
        <!-- Image Preview -->
        <div id="imagePreview" class="d-none">
            <div class="preview-container">
                <img id="previewImg" src="/placeholder.svg" alt="Preview" class="preview-image">
                <button type="button" class="preview-remove-btn" onclick="removeImage()">
                    <i class="bi bi-x"></i>
                </button>
            </div>
        </div>
    </div>
</div>
