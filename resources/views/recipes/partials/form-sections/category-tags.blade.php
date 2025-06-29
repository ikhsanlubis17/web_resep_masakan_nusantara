<div class="form-card mb-4">
    <div class="form-card-header">
        <h5 class="form-card-title">
            <i class="bi bi-tags me-2"></i>Kategori & Tag
        </h5>
    </div>
    <div class="form-card-body">
        <div class="mb-3">
            <label for="category_id" class="form-label">Provinsi Asal <span class="text-danger">*</span></label>
            <select class="form-select @error('category_id') is-invalid @enderror" 
                    id="category_id" 
                    name="category_id" 
                    required>
                <option value="">Pilih Provinsi</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                            {{ old('category_id', $recipe->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="tags" class="form-label">Tag</label>
            <input type="text" 
                   class="form-control @error('tags') is-invalid @enderror" 
                   id="tags" 
                   name="tags" 
                   value="{{ old('tags', $recipe->tags ?? '') }}" 
                   placeholder="pedas, tradisional, khas daerah">
            @error('tags')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">
                <i class="bi bi-info-circle me-1"></i>
                Pisahkan dengan koma. Contoh: pedas, tradisional, khas daerah
            </div>
        </div>
    </div>
</div>
