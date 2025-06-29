@if($categories->count() > 0)
<div class="container">
    <div class="categories-grid-section mb-5">
        <div class="row g-4">
            @foreach($categories as $index => $category)
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <a href="{{ route('categories.show', $category) }}" class="category-link">
                        <div class="category-card animate-fade-in-up" 
                             style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="category-background" 
                                 style="background-image: url('{{ asset('images/categories/' . ($category->background_image ?? 'default.jpg')) }}');"></div>
                            <div class="category-overlay"></div>
                            <div class="category-content">
                                <div class="category-icon">
                                    <i class="{{ $category->icon ?? 'bi-bowl-hot-fill' }}"></i>
                                </div>
                                <h5 class="category-title font-display">{{ $category->name }}</h5>
                                <p class="category-description">
                                    {{ $category->description ?? 'Koleksi resep ' . strtolower($category->name) . ' yang autentik dan lezat' }}
                                </p>
                                <div class="category-footer">
                                    <div class="recipe-count">
                                        <span class="count-number">{{ number_format($category->recipes_count) }}</span>
                                        <span class="count-label">resep</span>
                                    </div>
                                    <div class="category-arrow">
                                        <i class="bi bi-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@else
    @include('categories.partials.empty-state')
@endif
