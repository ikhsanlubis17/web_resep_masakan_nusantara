<div class="form-card mb-4">
    <div class="form-card-header">
        <h5 class="form-card-title">
            <i class="bi bi-clock me-2"></i>Detail Resep
        </h5>
    </div>
    <div class="form-card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <label for="prep_time" class="form-label">Waktu Persiapan (menit) <span class="text-danger">*</span></label>
                <input type="number" 
                       class="form-control @error('prep_time') is-invalid @enderror" 
                       id="prep_time" 
                       name="prep_time" 
                       value="{{ old('prep_time', $recipe->prep_time ?? '') }}" 
                       min="1" 
                       max="1440" 
                       placeholder="30" 
                       required>
                @error('prep_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col-md-3">
                <label for="cook_time" class="form-label">Waktu Memasak (menit) <span class="text-danger">*</span></label>
                <input type="number" 
                       class="form-control @error('cook_time') is-invalid @enderror" 
                       id="cook_time" 
                       name="cook_time" 
                       value="{{ old('cook_time', $recipe->cook_time ?? '') }}" 
                       min="1" 
                       max="1440" 
                       placeholder="60" 
                       required>
                @error('cook_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col-md-3">
                <label for="servings" class="form-label">Porsi <span class="text-danger">*</span></label>
                <input type="number" 
                       class="form-control @error('servings') is-invalid @enderror" 
                       id="servings" 
                       name="servings" 
                       value="{{ old('servings', $recipe->servings ?? '') }}" 
                       min="1" 
                       max="50" 
                       placeholder="4" 
                       required>
                @error('servings')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col-md-3">
                <label for="difficulty" class="form-label">Tingkat Kesulitan <span class="text-danger">*</span></label>
                <select class="form-select @error('difficulty') is-invalid @enderror" 
                        id="difficulty" 
                        name="difficulty" 
                        required>
                    <option value="">Pilih Tingkat</option>
                    <option value="Mudah" {{ old('difficulty', $recipe->difficulty ?? '') == 'Mudah' ? 'selected' : '' }}>Mudah</option>
                    <option value="Sedang" {{ old('difficulty', $recipe->difficulty ?? '') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                    <option value="Sulit" {{ old('difficulty', $recipe->difficulty ?? '') == 'Sulit' ? 'selected' : '' }}>Sulit</option>
                </select>
                @error('difficulty')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <!-- Total Time Display -->
        <div class="mt-3">
            <div class="time-display alert alert-info d-flex align-items-center">
                <i class="bi bi-info-circle me-2"></i>
                <span>Total waktu memasak: <strong id="totalTime">{{ isset($recipe) ? (($recipe->prep_time ?? 0) + ($recipe->cook_time ?? 0)) : 0 }} menit</strong></span>
            </div>
        </div>
    </div>
</div>
