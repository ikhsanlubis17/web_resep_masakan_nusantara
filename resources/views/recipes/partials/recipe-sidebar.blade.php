<!-- Author Card -->
<div class="sidebar-card mb-4 text-center">
    <div class="sidebar-card-body">
        <img src="{{ $recipe->user->avatar_url ?? '/placeholder.svg?height=80&width=80' }}" 
             alt="{{ $recipe->user->name }}"
             class="author-avatar rounded-circle mb-3">
        <h6 class="card-title">{{ $recipe->user->name }}</h6>
        <p class="text-muted small">Chef & Food Enthusiast</p>
        
        <div class="row g-2">
            <div class="col-4">
                <div class="fw-bold">{{ $recipe->user->recipes()->published()->count() }}</div>
                <small class="text-muted">Resep</small>
            </div>
            <div class="col-4">
                <div class="fw-bold">{{ number_format($recipe->user->recipes()->sum('views')) }}</div>
                <small class="text-muted">Views</small>
            </div>
            <div class="col-4">
                <div class="fw-bold">4.8</div>
                <small class="text-muted">Rating</small>
            </div>
        </div>
    </div>
</div>

<!-- Related Recipes -->
@if(isset($relatedRecipes) && $relatedRecipes->count() > 0)
<div class="sidebar-card">
    <div class="sidebar-card-header">
        <h6 class="sidebar-card-title mb-0">Resep Serupa</h6>
    </div>
    <div class="sidebar-card-body p-0">
        @foreach($relatedRecipes as $related)
        <div class="related-recipe-item d-flex p-3">
            <img src="{{ $related->image_url }}" alt="{{ $related->title }}" 
                 class="related-recipe-image rounded me-3">
            <div class="flex-grow-1">
                <h6 class="mb-1">
                    <a href="{{ route('recipes.show', $related) }}" class="text-decoration-none">
                        {{ Str::limit($related->title, 40) }}
                    </a>
                </h6>
                <div class="small text-muted">
                    <i class="bi bi-clock me-1"></i>{{ $related->total_time }} menit
                    <i class="bi bi-star-fill text-warning ms-2 me-1"></i>{{ number_format($related->rating, 1) }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
