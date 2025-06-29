<div class="recipe-actions d-flex gap-3 mb-5">
    @auth
        @if($recipe->user_id === auth()->id())
        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-warning">
            <i class="bi bi-pencil me-2"></i>Edit Resep
        </a>
        <form method="POST" action="{{ route('recipes.destroy', $recipe) }}" 
              onsubmit="return confirm('Yakin ingin menghapus resep ini?')" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">
                <i class="bi bi-trash me-2"></i>Hapus
            </button>
        </form>
        @endif
    @endauth
    
    <button class="btn btn-outline-primary" onclick="shareRecipe()">
        <i class="bi bi-share me-2"></i>Bagikan
    </button>
    
    <button class="btn btn-outline-secondary" onclick="printRecipe()">
        <i class="bi bi-printer me-2"></i>Cetak
    </button>
</div>
