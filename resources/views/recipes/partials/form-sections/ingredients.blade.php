<div class="form-card mb-4">
    <div class="form-card-header">
        <h5 class="form-card-title">
            <i class="bi bi-list-ul me-2"></i>Bahan-bahan
        </h5>
    </div>
    <div class="form-card-body">
        <label for="ingredients" class="form-label">Daftar Bahan <span class="text-danger">*</span></label>
        <textarea class="form-control @error('ingredients') is-invalid @enderror" 
                  id="ingredients" 
                  name="ingredients" 
                  rows="8" 
                  placeholder="Tulis setiap bahan dalam baris terpisah, contoh:&#10;- 500g daging sapi, potong kotak&#10;- 2 lembar daun salam&#10;- 3 batang serai, memarkan&#10;- 400ml santan kental" 
                  required>{{ old('ingredients', $recipe->ingredients ?? '') }}</textarea>
        @error('ingredients')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div class="form-text">
            <i class="bi bi-info-circle me-1"></i>
            Tulis setiap bahan dalam baris terpisah. Sertakan takaran yang jelas untuk hasil terbaik.
        </div>
    </div>
</div>
