<div class="my-recipe-card h-100 animate-fade-in-up" style="animation-delay: {{ ($index ?? 0) * 0.1 }}s;">
    <div class="recipe-image-wrapper">
        <img src="{{ $recipe->image_url ?? '/placeholder.svg' }}" 
             alt="{{ $recipe->title }}" 
             class="recipe-image">
        
        <div class="recipe-badges">
            <span class="status-badge badge-{{ $recipe->status === 'published' ? 'published' : 'draft' }}">
                {{ $recipe->status === 'published' ? 'Dipublikasikan' : 'Draft' }}
            </span>
            <span class="difficulty-badge badge-{{ strtolower($recipe->difficulty ?? 'sedang') }}">
                {{ $recipe->difficulty ?? 'Sedang' }}
            </span>
        </div>
        
        <div class="recipe-overlay">
            <a href="{{ route('recipes.show', $recipe) }}" class="overlay-btn">
                <i class="bi bi-eye"></i>
            </a>
        </div>
    </div>
    
    <div class="recipe-content">
        <h5 class="recipe-title">
            <a href="{{ route('recipes.show', $recipe) }}" class="title-link">
                {{ Str::limit($recipe->title, 45) }}
            </a>
        </h5>
        
        <div class="recipe-meta mb-2">
            <small class="category-date">
                {{ $recipe->category->name ?? 'Umum' }} | {{ $recipe->created_at->format('d M Y') }}
            </small>
        </div>
        
        <p class="recipe-description">{{ Str::limit($recipe->description, 70) }}</p>
        
        <div class="recipe-stats mb-3">
            <div class="stat-item">
                <i class="bi bi-eye"></i> {{ $recipe->views }}
            </div>
            <div class="stat-item">
                <i class="bi bi-heart"></i> {{ $recipe->favorites_count }}
            </div>
            <div class="stat-item">
                <i class="bi bi-star-fill text-warning"></i> {{ number_format($recipe->rating ?? 4.5, 1) }}
            </div>
        </div>
        
        <div class="recipe-actions d-flex gap-2">
            <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-sm btn-outline-warning flex-fill">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <button type="button" 
                    class="btn btn-sm btn-outline-danger flex-fill" 
                    onclick="confirmDelete('{{ $recipe->id }}', '{{ $recipe->title }}')">
                <i class="bi bi-trash"></i> Hapus
            </button>
        </div>
    </div>
</div>
