<script>
    function confirmDelete(recipeId, recipeTitle) {
        document.getElementById('recipeTitle').textContent = recipeTitle;
        document.getElementById('deleteForm').action = `/recipes/${recipeId}`;
        
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }
    
    // Initialize page functionality
    $(document).ready(function() {
        // Initialize animations
        initializeAnimations();
        
        // Add hover effects
        addHoverEffects();
        
        // Add loading states
        addLoadingStates();
    });
    
    function initializeAnimations() {
        // Stagger animation for recipe cards
        $('.my-recipe-card').each(function(index) {
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
            document.querySelectorAll('.my-recipe-card').forEach(el => {
                observer.observe(el);
            });
        }
    }
    
    function addHoverEffects() {
        // Enhanced hover effects for recipe cards
        $('.my-recipe-card').hover(
            function() {
                $(this).find('.recipe-image').addClass('scale-110');
            },
            function() {
                $(this).find('.recipe-image').removeClass('scale-110');
            }
        );
    }
    
    function addLoadingStates() {
        // Add loading states for action buttons
        document.querySelectorAll('.btn').forEach(btn => {
            if (!btn.classList.contains('btn-danger')) {
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
        
        // Add loading state for delete form
        document.getElementById('deleteForm')?.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                const originalHtml = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="bi bi-arrow-clockwise spin me-1"></i>Menghapus...';
                submitBtn.disabled = true;
            }
        });
    }
    
    // Add CSS for animations and effects
    const additionalStyles = `
        .scale-110 {
            transform: scale(1.1);
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
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
    