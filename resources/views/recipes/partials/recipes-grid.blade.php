<div class="container">
    @if($recipes->count() > 0)
        <div class="recipes-grid-section">
            <div class="row g-4">
                @foreach($recipes as $index => $recipe)
                    <div class="col-lg-4 col-md-6">
                        @include('recipes.partials.recipe-card', ['recipe' => $recipe, 'index' => $index])
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="pagination-wrapper d-flex justify-content-center mt-5">
                {{ $recipes->appends(request()->query())->links() }}
            </div>
        </div>
    @else
        @include('recipes.partials.no-recipes')
    @endif
</div>
