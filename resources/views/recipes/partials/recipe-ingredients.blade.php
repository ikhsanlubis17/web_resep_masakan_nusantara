<div class="recipe-section ingredients-card mb-5">
    <div class="recipe-section-header">
        <h5 class="recipe-section-title">
            <i class="bi bi-list-ul me-2"></i>Bahan-bahan
        </h5>
    </div>
    <div class="recipe-section-body">
        @foreach(explode("\n", $recipe->ingredients) as $ingredient)
            @if(trim($ingredient))
            <div class="ingredient-item d-flex align-items-center mb-3">
                <i class="ingredient-check bi bi-check-circle text-success me-3"></i>
                <span>{{ trim($ingredient) }}</span>
            </div>
            @endif
        @endforeach
    </div>
</div>
