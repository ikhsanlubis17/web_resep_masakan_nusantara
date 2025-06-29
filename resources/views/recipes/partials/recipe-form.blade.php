<div class="container">
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="recipe-form needs-validation" novalidate>
        @csrf
        @if($method === 'PUT')
            @method('PUT')
        @endif
        
        <div class="row g-4">
            <!-- Main Content -->
            <div class="col-lg-8">
                @include('recipes.partials.form-sections.basic-info')
                @include('recipes.partials.form-sections.recipe-details')
                @include('recipes.partials.form-sections.ingredients')
                @include('recipes.partials.form-sections.instructions')
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                @if($recipe && $recipe->image)
                    @include('recipes.partials.form-sections.current-image')
                @endif
                @include('recipes.partials.form-sections.image-upload')
                @include('recipes.partials.form-sections.category-tags')
                @include('recipes.partials.form-sections.action-buttons')
            </div>
        </div>
    </form>
</div>
