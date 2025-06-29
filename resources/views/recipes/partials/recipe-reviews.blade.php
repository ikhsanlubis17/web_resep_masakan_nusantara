<!-- Reviews Section -->
@auth
    @if(!$userReview)
    <div class="recipe-section review-card mb-5">
        <div class="recipe-section-header">
            <h5 class="recipe-section-title">
                <i class="bi bi-star me-2"></i>Berikan Rating & Ulasan
            </h5>
        </div>
        <div class="recipe-section-body">
            <form action="{{ route('reviews.store') }}" method="POST" class="review-form" id="reviewForm">
                @csrf
                <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                
                <div class="mb-3">
                    <label class="form-label">Rating <span class="text-danger">*</span></label>
                    <div class="star-rating-container">
                        <div class="star-rating" id="starRating">
                            <span class="star" data-rating="1">★</span>
                            <span class="star" data-rating="2">★</span>
                            <span class="star" data-rating="3">★</span>
                            <span class="star" data-rating="4">★</span>
                            <span class="star" data-rating="5">★</span>
                        </div>
                        <span class="rating-text" id="ratingText">Pilih rating</span>
                    </div>
                    <input type="hidden" name="rating" id="ratingInput" value="0" required>
                    <div class="invalid-feedback" id="ratingError" style="display: none;">Silakan pilih rating</div>
                    @error('rating')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="comment" class="form-label">Ulasan</label>
                    <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror" 
                              rows="4" placeholder="Tulis ulasan Anda tentang resep ini...">{{ old('comment') }}</textarea>
                    @error('comment')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary" id="submitReview">
                    <i class="bi bi-send me-2"></i>Kirim Ulasan
                </button>
            </form>
        </div>
    </div>
    @else
    <!-- User already has review section remains the same -->
    <div class="recipe-section review-card mb-5">
        <div class="recipe-section-header">
            <h5 class="recipe-section-title">
                <i class="bi bi-star me-2"></i>Ulasan Anda
            </h5>
        </div>
        <div class="recipe-section-body">
            <div class="user-review-display">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <div class="review-rating text-warning mb-2">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="bi {{ $i <= $userReview->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                            @endfor
                            <span class="ms-2 text-muted">{{ $userReview->rating }}/5</span>
                        </div>
                        @if($userReview->comment)
                        <p class="mb-0">{{ $userReview->comment }}</p>
                        @endif
                        <small class="text-muted">Ditulis pada {{ $userReview->created_at->format('d M Y') }}</small>
                    </div>
                    <div class="review-actions">
                        <button type="button" class="btn btn-sm btn-outline-primary me-2" onclick="editReview()">
                            <i class="bi bi-pencil"></i> Edit
                        </button>
                        <form method="POST" action="{{ route('reviews.destroy', $userReview) }}" class="d-inline" 
                              onsubmit="return confirm('Yakin ingin menghapus ulasan Anda?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Form (Hidden by default) -->
            <div id="editReviewForm" style="display: none;">
                <form action="{{ route('reviews.update', $userReview) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Rating <span class="text-danger">*</span></label>
                        <div class="star-rating-container">
                            <div class="star-rating" id="editStarRating">
                                <span class="star active" data-rating="1">★</span>
                                <span class="star active" data-rating="2">★</span>
                                <span class="star active" data-rating="3">★</span>
                                <span class="star active" data-rating="4">★</span>
                                <span class="star active" data-rating="5">★</span>
                            </div>
                        </div>
                        <input type="hidden" name="rating" id="editRatingInput" value="{{ $userReview->rating }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editComment" class="form-label">Ulasan</label>
                        <textarea name="comment" id="editComment" class="form-control" 
                                  rows="4" placeholder="Tulis ulasan Anda tentang resep ini...">{{ $userReview->comment }}</textarea>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check me-2"></i>Simpan Perubahan
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="cancelEdit()">
                            <i class="bi bi-x me-2"></i>Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
@else
<div class="recipe-section review-card mb-5">
    <div class="recipe-section-header">
        <h5 class="recipe-section-title">
            <i class="bi bi-star me-2"></i>Rating & Ulasan
        </h5>
    </div>
    <div class="recipe-section-body text-center">
        <p class="text-muted mb-3">Silakan login untuk memberikan rating dan ulasan</p>
        <a href="{{ route('login') }}" class="btn btn-primary">
            <i class="bi bi-box-arrow-in-right me-2"></i>Login
        </a>
    </div>
</div>
@endauth

<!-- Rest of the reviews display section remains the same -->
@if($recipe->reviews && $recipe->reviews->count() > 0)
<div class="recipe-section review-card mb-5">
    <div class="recipe-section-header">
        <h5 class="recipe-section-title">
            <i class="bi bi-chat-dots me-2"></i>Ulasan Pengguna ({{ $recipe->reviews->count() }})
        </h5>
    </div>
    <div class="recipe-section-body">
        <!-- Rating Summary -->
        <div class="rating-summary mb-4 p-3 bg-light rounded">
            <div class="row align-items-center">
                <div class="col-md-4 text-center">
                    <div class="average-rating">
                        <span class="display-4 fw-bold text-warning">{{ number_format($recipe->rating, 1) }}</span>
                        <div class="rating-stars text-warning">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="bi {{ $i <= round($recipe->rating) ? 'bi-star-fill' : 'bi-star' }}"></i>
                            @endfor
                        </div>
                        <small class="text-muted">dari {{ $recipe->reviews->count() }} ulasan</small>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="rating-breakdown">
                        @for($i = 5; $i >= 1; $i--)
                        @php
                            $count = $recipe->reviews->where('rating', $i)->count();
                            $percentage = $recipe->reviews->count() > 0 ? ($count / $recipe->reviews->count()) * 100 : 0;
                        @endphp
                        <div class="d-flex align-items-center mb-1">
                            <span class="me-2">{{ $i }}</span>
                            <i class="bi bi-star-fill text-warning me-2"></i>
                            <div class="progress flex-grow-1 me-2" style="height: 8px;">
                                <div class="progress-bar bg-warning" style="width: {{ $percentage }}%"></div>
                            </div>
                            <small class="text-muted">{{ $count }}</small>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews List -->
        <div class="reviews-list">
            @foreach($recipe->reviews as $review)
            <div class="review-item border-bottom pb-3 mb-3">
                <div class="review-header d-flex justify-content-between align-items-start mb-2">
                    <div class="d-flex align-items-center">
                        <img src="{{ $review->user->avatar_url ?? '/placeholder.svg?height=40&width=40' }}" 
                             alt="{{ $review->user->name }}"
                             class="review-avatar rounded-circle me-3"
                             style="width: 40px; height: 40px; object-fit: cover;">
                        <div>
                            <strong class="review-author">{{ $review->user->name }}</strong>
                            <div class="review-rating text-warning">
                                @for($i = 1; $i <= 5; $i++)
                                <i class="bi {{ $i <= $review->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                @endfor
                                <span class="ms-1 text-muted small">{{ $review->rating }}/5</span>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">{{ $review->created_at->format('d M Y') }}</small>
                </div>
                
                @if($review->comment)
                <div class="review-content">
                    <p class="mb-0">{{ $review->comment }}</p>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<script>
// Inline script untuk memastikan langsung ter-load
(function() {
    function initStarRating() {
        // Main rating form
        const starRating = document.getElementById('starRating');
        const ratingInput = document.getElementById('ratingInput');
        const ratingText = document.getElementById('ratingText');
        
        if (starRating && ratingInput) {
            const stars = starRating.querySelectorAll('.star');
            let currentRating = 0;
            
            stars.forEach((star, index) => {
                const rating = index + 1;
                
                // Click event
                star.addEventListener('click', function() {
                    currentRating = rating;
                    ratingInput.value = rating;
                    updateStars(stars, rating);
                    updateRatingText(rating);
                    
                    // Hide error
                    const errorDiv = document.getElementById('ratingError');
                    if (errorDiv) {
                        errorDiv.style.display = 'none';
                    }
                });
                
                // Hover events
                star.addEventListener('mouseenter', function() {
                    updateStars(stars, rating);
                });
                
                star.addEventListener('mouseleave', function() {
                    updateStars(stars, currentRating);
                });
            });
        }
        
        // Edit rating form
        const editStarRating = document.getElementById('editStarRating');
        const editRatingInput = document.getElementById('editRatingInput');
        
        if (editStarRating && editRatingInput) {
            const editStars = editStarRating.querySelectorAll('.star');
            let editCurrentRating = parseInt(editRatingInput.value) || 0;
            
            // Initialize edit stars
            updateStars(editStars, editCurrentRating);
            
            editStars.forEach((star, index) => {
                const rating = index + 1;
                
                star.addEventListener('click', function() {
                    editCurrentRating = rating;
                    editRatingInput.value = rating;
                    updateStars(editStars, rating);
                });
                
                star.addEventListener('mouseenter', function() {
                    updateStars(editStars, rating);
                });
                
                star.addEventListener('mouseleave', function() {
                    updateStars(editStars, editCurrentRating);
                });
            });
        }
    }
    
    function updateStars(stars, rating) {
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }
    
    function updateRatingText(rating) {
        const ratingText = document.getElementById('ratingText');
        if (ratingText) {
            const texts = {
                1: 'Sangat Buruk',
                2: 'Buruk', 
                3: 'Biasa',
                4: 'Bagus',
                5: 'Sangat Bagus'
            };
            ratingText.textContent = texts[rating] || 'Pilih rating';
        }
    }
    
    // Form validation
    function initFormValidation() {
        const form = document.getElementById('reviewForm');
        if (form) {
            form.addEventListener('submit', function(e) {
                const ratingInput = document.getElementById('ratingInput');
                const rating = parseInt(ratingInput.value);
                
                if (!rating || rating < 1 || rating > 5) {
                    e.preventDefault();
                    const errorDiv = document.getElementById('ratingError');
                    if (errorDiv) {
                        errorDiv.style.display = 'block';
                        errorDiv.textContent = 'Silakan pilih rating dari 1-5 bintang';
                    }
                    
                    // Scroll to rating
                    const starRating = document.getElementById('starRating');
                    if (starRating) {
                        starRating.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    
                    return false;
                }
                
                // Disable submit button
                const submitBtn = document.getElementById('submitReview');
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Mengirim...';
                }
            });
        }
    }
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            initStarRating();
            initFormValidation();
        });
    } else {
        initStarRating();
        initFormValidation();
    }
})();

function editReview() {
    document.querySelector('.user-review-display').style.display = 'none';
    document.getElementById('editReviewForm').style.display = 'block';
}

function cancelEdit() {
    document.querySelector('.user-review-display').style.display = 'block';
    document.getElementById('editReviewForm').style.display = 'none';
}
</script>
