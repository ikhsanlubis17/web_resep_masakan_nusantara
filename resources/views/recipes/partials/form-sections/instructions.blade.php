<div class="form-card mb-4">
    <div class="form-card-header">
        <h5 class="form-card-title">
            <i class="bi bi-list-ol me-2"></i>Cara Memasak
        </h5>
    </div>
    <div class="form-card-body">
        <label for="instructions" class="form-label">Langkah-langkah Memasak <span class="text-danger">*</span></label>
        <textarea class="form-control @error('instructions') is-invalid @enderror" 
                  id="instructions" 
                  name="instructions" 
                  rows="10" 
                  placeholder="Tulis setiap langkah dalam baris terpisah, contoh:&#10;1. Haluskan bumbu: bawang merah, bawang putih, cabai, jahe, kunyit&#10;2. Tumis bumbu halus hingga harum dan matang&#10;3. Masukkan daging, aduk hingga berubah warna&#10;4. Tambahkan santan, daun salam, dan serai" 
                  required>{{ old('instructions', $recipe->instructions ?? '') }}</textarea>
        @error('instructions')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div class="form-text">
            <i class="bi bi-info-circle me-1"></i>
            Tulis langkah-langkah secara detail dan berurutan agar mudah diikuti oleh pembaca.
        </div>
    </div>
</div>
