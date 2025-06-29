<div class="form-card mb-4">
    <div class="form-card-header">
        <h5 class="form-card-title">
            <i class="bi bi-info-circle me-2"></i>Informasi Dasar
        </h5>
    </div>
    <div class="form-card-body">
        <div class="row g-3">
            <div class="col-12">
                <label for="title" class="form-label">Nama Resep <span class="text-danger">*</span></label>
                <input type="text" 
                       class="form-control @error('title') is-invalid @enderror" 
                       id="title" 
                       name="title" 
                       value="{{ old('title', $recipe->title ?? '') }}" 
                       placeholder="Contoh: Rendang Daging Sapi Padang" 
                       required 
                       maxlength="255">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text text-end" id="titleCounter">255 karakter tersisa</div>
            </div>
            
            <div class="col-12">
                <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" 
                          name="description" 
                          rows="4" 
                          placeholder="Ceritakan tentang resep ini, asal daerah, keunikan, atau tips khusus..." 
                          required>{{ old('description', $recipe->description ?? '') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
