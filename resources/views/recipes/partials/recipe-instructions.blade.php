<div class="recipe-section instructions-card mb-5">
    <div class="recipe-section-header">
        <h5 class="recipe-section-title">
            <i class="bi bi-list-ol me-2"></i>Cara Memasak
        </h5>
    </div>
    <div class="recipe-section-body">
        @foreach(explode("\n", $recipe->instructions) as $index => $instruction)
            @if(trim($instruction))
            <div class="instruction-step d-flex mb-4">
                <div class="step-number flex-shrink-0 me-3">
                    <div class="step-circle">
                        <span class="fw-bold">{{ $index + 1 }}</span>
                    </div>
                </div>
                <div class="step-content flex-grow-1">
                    <p class="mb-0">{{ trim($instruction) }}</p>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
