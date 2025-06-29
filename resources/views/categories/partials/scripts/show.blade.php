<script>
    // Enhanced favorite toggle function
    function toggleFavorite(recipeId, button) {
        // Prevent double-clicking
        if (button.classList.contains('processing')) return;
        button.classList.add('processing');
        
        const icon = button.querySelector('i');
        const originalClass = icon.className;
        
        // Add loading animation
        icon.className = 'bi bi-heart-pulse-fill';
        button.style.pointerEvents = 'none';
        
        fetch(`/recipes/${recipeId}/favorite`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Update button state
                if (data.favorited) {
                    button.classList.add('favorited');
                    icon.className = 'bi bi-heart-fill';
                    
                    // Show success toast
                    showToast('Resep ditambahkan ke favorit! ❤️', 'success');
                    
                    // Add celebration animation
                    button.classList.add('animate-bounce-gentle');
                    setTimeout(() => {
                        button.classList.remove('animate-bounce-gentle');
                    }, 1000);
                } else {
                    button.classList.remove('favorited');
                    icon.className = 'bi bi-heart';
                    showToast('Resep dihapus dari favorit', 'info');
                }
                
                // Update favorites count in the card
                const favoritesCountElement = button.closest('.recipe-card').querySelector('.favorites-count');
                if (favoritesCountElement) {
                    const currentCount = parseInt(favoritesCountElement.textContent) || 0;
                    const newCount = data.favorited ? currentCount + 1 : Math.max(0, currentCount - 1);
                    favoritesCountElement.textContent = newCount;
                    
                    // Add bounce animation to count
                    favoritesCountElement.parentElement.classList.add('animate-bounce-gentle');
                    setTimeout(() => {
                        favoritesCountElement.parentElement.classList.remove('animate-bounce-gentle');
                    }, 500);
                }
                
                // Update navbar favorites count if exists
                const navFavCount = document.querySelector('.nav-link .badge');
                if (navFavCount) {
                    const currentCount = parseInt(navFavCount.textContent) || 0;
                    const newCount = data.favorited ? currentCount + 1 : Math.max(0, currentCount - 1);
                    navFavCount.textContent = newCount;
                    navFavCount.classList.add('animate-bounce-gentle');
                    setTimeout(() => {
                        navFavCount.classList.remove('animate-bounce-gentle');
                    }, 1000);
                }
            } else {
                icon.className = originalClass;
                showToast(data.message || 'Terjadi kesalahan. Silakan coba lagi.', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            icon.className = originalClass;
            
            // Show appropriate error message
            if (error.message.includes('401') || error.message.includes('Unauthorized')) {
                showToast('Silakan login terlebih dahulu untuk menambah favorit', 'warning');
                setTimeout(() => {
                    window.location.href = '/login';
                }, 2000);
            } else {
                showToast('Terjadi kesalahan. Silakan coba lagi.', 'error');
            }
        })
        .finally(() => {
            // Remove processing state
            button.style.pointerEvents = 'auto';
            setTimeout(() => {
                button.classList.remove('processing');
            }, 600);
        });
    }
    
    // Initialize page functionality
    $(document).ready(function() {
        // Initialize animations
        initializeAnimations();
        
        // Add form enhancements
        enhanceFilterForm();
        
        // Add view toggle functionality
        initializeViewToggle();
        
        // Add loading states
        addLoadingStates();
    });
    
    function initializeAnimations() {
        // Stagger animation for recipe cards
        $('.recipe-card').each(function(index) {
            $(this).css('animation-delay', (index * 0.1) + 's');
            $(this).addClass('animate-fade-in-up');
        });
        
        // Intersection Observer for scroll animations
        if ('IntersectionObserver' in window) {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in-up');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            
            // Observe recipe cards for animation
            document.querySelectorAll('.recipe-card').forEach(el => {
                observer.observe(el);
            });
        }
    }
    
    function enhanceFilterForm() {
        const filterForm = document.querySelector('.filter-form');
        if (!filterForm) return;
        
        // Add real-time search with debounce
        const searchInput = filterForm.querySelector('#search');
        if (searchInput) {
            let searchTimeout;
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    // Auto-submit form after 1 second of no typing
                    if (this.value.length >= 3 || this.value.length === 0) {
                        filterForm.submit();
                    }
                }, 1000);
            });
        }
        
        // Enhanced form submission
        filterForm.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('.filter-btn');
            if (submitBtn) {
                const originalHtml = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="bi bi-arrow-clockwise spin me-1"></i>Memfilter...';
                submitBtn.disabled = true;
                
                // Reset after delay (form will submit)
                setTimeout(() => {
                    submitBtn.innerHTML = originalHtml;
                    submitBtn.disabled = false;
                }, 2000);
            }
        });
    }
    
    function initializeViewToggle() {
        const viewButtons = document.querySelectorAll('.view-btn');
        const recipesGrid = document.getElementById('recipesGrid');
        
        if (!viewButtons.length || !recipesGrid) return;
        
        viewButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const view = this.dataset.view;
                
                // Update active button
                viewButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                // Update grid layout
                if (view === 'list') {
                    recipesGrid.classList.remove('row');
                    recipesGrid.classList.add('list-view');
                    recipesGrid.querySelectorAll('.recipe-item').forEach(item => {
                        item.className = 'recipe-item col-12 mb-3';
                    });
                } else {
                    recipesGrid.classList.remove('list-view');
                    recipesGrid.classList.add('row');
                    recipesGrid.querySelectorAll('.recipe-item').forEach(item => {
                        item.className = 'recipe-item col-lg-4 col-md-6';
                    });
                }
            });
        });
    }
    
    function addLoadingStates() {
        // Add loading states for recipe links
        document.querySelectorAll('.recipe-card a, .overlay-btn').forEach(link => {
            link.addEventListener('click', function() {
                const card = this.closest('.recipe-card');
                if (card) {
                    card.style.opacity = '0.7';
                    card.style.pointerEvents = 'none';
                    
                    // Reset after navigation (fallback)
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.pointerEvents = 'auto';
                    }, 3000);
                }
            });
        });
        
        // Add loading states for action buttons
        document.querySelectorAll('.btn').forEach(btn => {
            if (!btn.classList.contains('filter-btn') && !btn.classList.contains('favorite-btn')) {
                btn.addEventListener('click', function() {
                    const originalHtml = this.innerHTML;
                    this.innerHTML = '<i class="bi bi-arrow-clockwise spin me-2"></i>Memuat...';
                    this.disabled = true;
                    
                    // Reset after navigation (fallback)
                    setTimeout(() => {
                        this.innerHTML = originalHtml;
                        this.disabled = false;
                    }, 3000);
                });
            }
        });
    }
    
    // Add CSS for list view and animations
    const additionalStyles = `
        .list-view .recipe-card {
            display: flex;
            flex-direction: row;
            height: auto;
        }
        
        .list-view .recipe-image-wrapper {
            width: 200px;
            flex-shrink: 0;
        }
        
        .list-view .recipe-image {
            height: 150px;
        }
        
        .list-view .recipe-content {
            flex: 1;
            padding: 1.5rem;
        }
        
        @media (max-width: 768px) {
            .list-view .recipe-card {
                flex-direction: column;
            }
            
            .list-view .recipe-image-wrapper {
                width: 100%;
            }
            
            .list-view .recipe-image {
                height: 200px;
            }
        }
        
        .spin {
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    `;
    
    // Add styles to head
    const styleSheet = document.createElement('style');
    styleSheet.textContent = additionalStyles;
    document.head.appendChild(styleSheet);
    </script>
    