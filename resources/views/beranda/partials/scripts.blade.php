<script>
    // Enhanced favorite toggle with better UX
    function toggleFavorite(recipeId, button) {
        const icon = button.querySelector('i');
        const originalClass = icon.className;
        
        // Add loading state
        icon.className = 'bi bi-heart-pulse-fill';
        button.style.pointerEvents = 'none';
        
        fetch(`/recipes/${recipeId}/toggle-favorite`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.favorited) {
                icon.className = 'bi bi-heart-fill';
                button.classList.add('favorited');
                
                // Show success toast
                showToast('Resep ditambahkan ke favorit! ❤️', 'success');
                
                // Add celebration animation
                button.style.animation = 'heartbeat 1s ease-in-out';
                setTimeout(() => {
                    button.style.animation = '';
                }, 1000);
            } else {
                icon.className = 'bi bi-heart';
                button.classList.remove('favorited');
                showToast('Resep dihapus dari favorit', 'info');
            }
            
            // Update favorites count in navbar if exists
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
        })
        .catch(error => {
            console.error('Error:', error);
            icon.className = originalClass;
            
            // Show error message
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
            button.style.pointerEvents = 'auto';
        });
    }
    
    // Enhanced search form with better validation
    document.addEventListener('DOMContentLoaded', function() {
        const searchForms = document.querySelectorAll('.hero-search-form, .search-form');
        
        searchForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const input = form.querySelector('input[name="q"]');
                const button = form.querySelector('button[type="submit"]');
                
                if (!input.value.trim()) {
                    e.preventDefault();
                    input.focus();
                    input.style.borderColor = '#ef4444';
                    showToast('Masukkan kata kunci pencarian', 'warning');
                    
                    setTimeout(() => {
                        input.style.borderColor = '';
                    }, 3000);
                    return;
                }
                
                // Add loading state
                const originalHtml = button.innerHTML;
                button.innerHTML = '<i class="bi bi-arrow-clockwise spin me-2"></i>Mencari...';
                button.disabled = true;
                
                // Reset after delay (form will submit)
                setTimeout(() => {
                    button.innerHTML = originalHtml;
                    button.disabled = false;
                }, 2000);
            });
        });
        
        // Add smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Add intersection observer for animations
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
        
        // Observe elements for animation
        document.querySelectorAll('.category-card, .featured-recipe-card, .popular-recipe-card').forEach(el => {
            observer.observe(el);
        });
        
        // Add hover effects for recipe cards
        document.querySelectorAll('.featured-recipe-card, .popular-recipe-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Add parallax effect to hero background
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const heroBackground = document.querySelector('.hero-background');
            
            if (heroBackground && scrolled < window.innerHeight) {
                heroBackground.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });
        
        // Add loading states for CTA buttons
        document.querySelectorAll('.cta-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const originalHtml = this.innerHTML;
                this.innerHTML = '<i class="bi bi-arrow-clockwise spin me-2"></i>Memuat...';
                this.disabled = true;
                
                // Re-enable after navigation (fallback)
                setTimeout(() => {
                    this.innerHTML = originalHtml;
                    this.disabled = false;
                }, 3000);
            });
        });
    });
    
    // Add CSS for spin animation
    const style = document.createElement('style');
    style.textContent = `
        .spin {
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            25% { transform: scale(1.1); }
            50% { transform: scale(1); }
            75% { transform: scale(1.05); }
        }
    `;
    document.head.appendChild(style);
    </script>
    