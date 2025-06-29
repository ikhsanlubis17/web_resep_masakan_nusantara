<div class="container">
    @if($recipes->count() > 0)
        <div class="my-recipes-grid">
            <div class="row g-4">
                @foreach($recipes as $index => $recipe)
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                        @include('recipes.partials.my-recipe-card', ['recipe' => $recipe, 'index' => $index])
                    </div>
                @endforeach
            </div>
            
            <div class="pagination-wrapper d-flex justify-content-center mt-4">
                {{ $recipes->links('pagination::bootstrap-4') }}
            </div>
        </div>
    @else
        @include('recipes.partials.empty-my-recipes')
    @endif
</div>
