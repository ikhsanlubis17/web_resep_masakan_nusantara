<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb custom-breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">
                <i class="bi bi-house-door me-1"></i>Beranda
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('categories.show', $recipe->category) }}">
                {{ $recipe->category->name }}
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            {{ Str::limit($recipe->title, 30) }}
        </li>
    </ol>
</nav>
