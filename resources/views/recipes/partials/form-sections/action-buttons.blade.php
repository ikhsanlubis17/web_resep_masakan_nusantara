<div class="form-card">
    <div class="form-card-body">
        <div class="action-buttons d-grid gap-3">
            <button type="submit" class="btn btn-primary btn-lg submit-btn">
                <i class="bi bi-check-circle me-2"></i>
                {{ isset($recipe) ? 'Simpan Perubahan' : 'Publikasikan Resep' }}
            </button>
            
            <a href="{{ isset($recipe) ? route('recipes.show', $recipe) : route('my-recipes') }}" 
               class="btn btn-outline-secondary">
                <i class="bi bi-x-circle me-2"></i>
                Batal
            </a>
        </div>
        
        <hr class="my-3">
        
        <div class="info-box">
            <i class="bi bi-info-circle me-2"></i>
            <div>
                <strong>{{ isset($recipe) ? 'Info:' : 'Tips:' }}</strong> 
                {{ isset($recipe) ? 'Perubahan akan langsung tersimpan setelah Anda klik "Simpan Perubahan".' : 'Resep akan langsung dipublikasikan setelah disimpan. Pastikan semua informasi sudah benar dan lengkap.' }}
            </div>
        </div>
    </div>
</div>
