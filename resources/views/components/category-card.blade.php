<div class="col">
    <a href="{{ route('categories.show', $category) }}" class="text-decoration-none">
        <div class="category-card">
            <div class="category-icon">
                <i class="bi bi-{{ $category->icon ?? 'grid-3x3-gap-fill' }}"></i>
            </div>
            <h5>{{ $category->name }}</h5>
            <p>{{ $category->description }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="badge badge-success">{{ $category->recipes_count }} resep</span>
                <i class="bi bi-arrow-right"></i>
            </div>
        </div>
    </a>
</div>
