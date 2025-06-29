<div class="container">
    @if($recipes->count() > 0)
        <div class="recipes-grid-section">
            <div class="recipes-header mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="recipes-title mb-0">
                        Ditemukan {{ number_format($recipes->total()) }} resep
                    </h3>
                    <div class="view-toggle d-none d-md-flex">
                        <button class="btn btn-outline-secondary btn-sm view-btn active" data-view="grid">
                            <i class="bi bi-grid-3x3-gap"></i>
                        </button>
                        <button class="btn btn-outline-secondary btn-sm view-btn ms-2" data-view="list">
                            <i class="bi bi-list"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="recipes-grid row g-4" id="recipesGrid">
                @foreach($recipes as $index => $recipe)
                    <div class="col-lg-4 col-md-6 recipe-item">
                        @include('categories.partials.recipe-card', ['recipe' => $recipe, 'index' => $index])
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="pagination-wrapper d-flex justify-content-center mt-5">
                {{ $recipes->appends(request()->query())->links() }}
            </div>
        </div>
    @else
        @include('categories.partials.no-recipes')
    @endif
</div>
