<script>
    document.addEventListener('DOMContentLoaded', function () {
        initializeRecipeShow();
    });
    
    function initializeRecipeShow() {
        initializeStarRating();
        initializeFavoriteButton();
        initializeShareFunctionality();
        initializePrintFunctionality();
        initializeIngredientChecking();
        initializeScrollAnimations();
        initializeReviewForm();
        
        // Show flash messages
        @if(session('success'))
            showToast('{{ session('success') }}', 'success');
        @endif
        
        @if(session('error'))
            showToast('{{ session('error') }}', 'error');
        @endif
        
        @if($errors->any())
            @foreach($errors->all() as $error)
                showToast('{{ $error }}', 'error');
            @endforeach
        @endif
    }
    
    function initializeStarRating(selector = '.star-rating', inputSelector = '#ratingInput') {
        document.querySelectorAll(selector).forEach(starRating => {
            const stars = starRating.querySelectorAll('.star-input');
            const input = document.querySelector(inputSelector);
            
            if (!input) return;
    
            // Initialize stars
            stars.forEach((star, index) => {
                // Remove any existing event listeners
                star.replaceWith(star.cloneNode(true));
            });
    
            // Re-select stars after cloning
            const newStars = starRating.querySelectorAll('.star-input');
    
            newStars.forEach((star, index) => {
                // Mouse over effect
                star.addEventListener('mouseover', function() {
                    highlightStars(index + 1, newStars);
                });
    
                // Click to select rating
                star.addEventListener('click', function() {
                    const rating = index + 1;
                    starRating.dataset.selected = rating;
                    input.value = rating;
                    highlightStars(rating, newStars);
                    
                    // Hide error message
                    const errorDiv = document.getElementById('ratingError');
                    if (errorDiv) {
                        errorDiv.style.display = 'none';
                    }
                    
                    // Animation effect
                    this.style.transform = 'scale(1.3)';
                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                    }, 200);
    
                    console.log('Rating selected:', rating); // Debug log
                });
    
                // Mouse leave - restore selected state
                star.addEventListener('mouseleave', function() {
                    const selected = parseInt(starRating.dataset.selected) || 0;
                    highlightStars(selected, newStars);
                });
            });
    
            // Mouse leave from entire star container
            starRating.addEventListener('mouseleave', function() {
                const selected = parseInt(this.dataset.selected) || 0;
                highlightStars(selected, newStars);
            });
        });
    }
    
    function highlightStars(rating, stars) {
        stars.forEach((star, i) => {
            // Remove all classes first
            star.classList.remove('bi-star', 'bi-star-fill', 'active');
            
            if (i < rating) {
                star.classList.add('bi-star-fill', 'active');
                star.style.color = '#ffc107';
            } else {
                star.classList.add('bi-star');
                star.style.color = '#ddd';
            }
        });
    }
    
    function initializeReviewForm() {
        const form = document.getElementById('reviewForm');
        if (!form) return;
    
        form.addEventListener('submit', function (e) {
            const ratingInput = document.getElementById('ratingInput');
            const rating = parseInt(ratingInput.value);
            
            if (!rating || rating < 1 || rating > 5) {
                e.preventDefault();
                const errorDiv = document.getElementById('ratingError');
                if (errorDiv) {
                    errorDiv.style.display = 'block';
                    errorDiv.textContent = 'Silakan pilih rating dari 1-5 bintang';
                }
                
                const starRating = document.querySelector('.star-rating');
                if (starRating) {
                    starRating.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
                
                showToast('Silakan pilih rating terlebih dahulu', 'warning');
                return false;
            }
    
            const submitBtn = document.getElementById('submitReview');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Mengirim...';
            }
        });
    }
    
    function initializeFavoriteButton() {
        window.toggleFavorite = function (recipeId, button) {
            if (!button || button.classList.contains('processing')) return;
    
            button.classList.add('processing');
            const icon = button.querySelector('.favorite-icon');
            const isFavorited = button.classList.contains('favorited');
    
            // Toggle UI immediately
            button.classList.toggle('favorited');
            if (isFavorited) {
                icon.classList.remove('bi-heart-fill');
                icon.classList.add('bi-heart');
            } else {
                icon.classList.remove('bi-heart');
                icon.classList.add('bi-heart-fill');
            }
    
            fetch(`/recipes/${recipeId}/favorite`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    const message = data.favorited ? 'Resep ditambahkan ke favorit! ❤️' : 'Resep dihapus dari favorit';
                    const type = data.favorited ? 'success' : 'info';
                    showToast(message, type);
                    
                    // Update favorites count if element exists
                    const favoritesCount = document.querySelector('.favorites-count');
                    if (favoritesCount && data.favorites_count !== undefined) {
                        favoritesCount.textContent = `${data.favorites_count} favorit`;
                    }
                } else {
                    throw new Error(data.message || 'Terjadi kesalahan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Revert UI changes
                button.classList.toggle('favorited');
                if (button.classList.contains('favorited')) {
                    icon.classList.remove('bi-heart');
                    icon.classList.add('bi-heart-fill');
                } else {
                    icon.classList.remove('bi-heart-fill');
                    icon.classList.add('bi-heart');
                }
                
                if (error.message.includes('401') || error.message.includes('Unauthorized')) {
                    showToast('Silakan login terlebih dahulu untuk menambah favorit', 'warning');
                    setTimeout(() => window.location.href = '/login', 2000);
                } else {
                    showToast('Terjadi kesalahan. Silakan coba lagi.', 'error');
                }
            })
            .finally(() => {
                setTimeout(() => {
                    button.classList.remove('processing');
                }, 500);
            });
        };
    }
    
    function initializeShareFunctionality() {
        window.shareRecipe = function () {
            const title = document.querySelector('.recipe-title')?.textContent || 'Resep Lezat';
            const description = document.querySelector('.recipe-description')?.textContent || 'Lihat resep lezat ini!';
            
            if (navigator.share) {
                navigator.share({
                    title: title,
                    text: description.substring(0, 100) + '...',
                    url: window.location.href
                }).catch(err => {
                    console.log('Error sharing:', err);
                    fallbackShare();
                });
            } else {
                fallbackShare();
            }
        };
    
        function fallbackShare() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                showToast('Link resep berhasil disalin!', 'success');
            }).catch(() => {
                // Fallback for older browsers
                const textArea = document.createElement('textarea');
                textArea.value = window.location.href;
                textArea.style.position = 'fixed';
                textArea.style.left = '-999999px';
                textArea.style.top = '-999999px';
                document.body.appendChild(textArea);
                textArea.focus();
                textArea.select();
                
                try {
                    document.execCommand('copy');
                    showToast('Link resep berhasil disalin!', 'success');
                } catch (err) {
                    showToast('Gagal menyalin link', 'error');
                }
                
                document.body.removeChild(textArea);
            });
        }
    }
    
    function initializePrintFunctionality() {
        window.printRecipe = function () {
            const printStyles = `
                <style media="print">
                    body * { visibility: hidden; }
                    .recipe-content, .recipe-content * { visibility: visible; }
                    .recipe-content { position: absolute; left: 0; top: 0; width: 100%; }
                    .favorite-btn, .recipe-actions, .review-form, .sidebar-card { display: none !important; }
                    .recipe-image-main { max-height: 300px; }
                    .recipe-section { break-inside: avoid; margin-bottom: 1rem; }
                </style>
            `;
            
            const head = document.head || document.getElementsByTagName('head')[0];
            const style = document.createElement('style');
            style.innerHTML = printStyles;
            head.appendChild(style);
            
            window.print();
            
            setTimeout(() => {
                if (head.contains(style)) {
                    head.removeChild(style);
                }
            }, 1000);
        };
    }
    
    function initializeIngredientChecking() {
        document.querySelectorAll('.ingredient-item').forEach(item => {
            item.addEventListener('click', function () {
                this.classList.toggle('checked');
                const icon = this.querySelector('.ingredient-check');
                if (this.classList.contains('checked')) {
                    icon.classList.remove('bi-check-circle');
                    icon.classList.add('bi-check-circle-fill');
                } else {
                    icon.classList.remove('bi-check-circle-fill');
                    icon.classList.add('bi-check-circle');
                }
            });
        });
    }
    
    function initializeScrollAnimations() {
        if ('IntersectionObserver' in window) {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
    
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
    
            document.querySelectorAll('.recipe-section, .info-card, .sidebar-card').forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(20px)';
                section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(section);
            });
        }
    }
    
    function showToast(message, type = 'info') {
        // Remove existing toasts
        document.querySelectorAll('.toast-notification').forEach(toast => toast.remove());
        
        const toast = document.createElement('div');
        toast.className = `toast-notification toast-${type}`;
        toast.innerHTML = `
            <div class="toast-content">
                <i class="bi bi-${getToastIcon(type)} me-2"></i>
                <span>${message}</span>
            </div>
        `;
        
        toast.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${getToastColor(type)};
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 9999;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            max-width: 350px;
            font-weight: 500;
        `;
        
        document.body.appendChild(toast);
        
        setTimeout(() => toast.style.transform = 'translateX(0)', 100);
        
        setTimeout(() => {
            toast.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (document.body.contains(toast)) {
                    document.body.removeChild(toast);
                }
            }, 300);
        }, 4000);
    }
    
    function getToastIcon(type) {
        const icons = {
            success: 'check-circle-fill',
            error: 'exclamation-triangle-fill',
            warning: 'exclamation-circle-fill',
            info: 'info-circle-fill'
        };
        return icons[type] || icons.info;
    }
    
    function getToastColor(type) {
        const colors = {
            success: '#198754',
            error: '#dc3545',
            warning: '#fd7e14',
            info: '#0dcaf0'
        };
        return colors[type] || colors.info;
    }
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
    </script>
    
    <style>
    .star-input {
        cursor: pointer !important;
        font-size: 1.5rem !important;
        color: #ddd !important;
        transition: all 0.2s ease !important;
        user-select: none !important;
        pointer-events: auto !important;
    }
    
    .star-input:hover {
        transform: scale(1.1) !important;
        color: #ffc107 !important;
    }
    
    .star-input.active {
        color: #ffc107 !important;
    }
    
    .star-rating {
        gap: 0.25rem !important;
        display: flex !important;
    }
    </style>
    