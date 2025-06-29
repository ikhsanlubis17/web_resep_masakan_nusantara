<script>
    $(document).ready(function() {
        // Initialize animations
        initializeAnimations();
        
        // Add hover effects
        addHoverEffects();
        
        // Add smooth scrolling
        addSmoothScrolling();
        
        // Add loading states
        addLoadingStates();
    });
    
    function initializeAnimations() {
        // Stagger animation for category cards
        $('.category-card').each(function(index) {
            $(this).css('animation-delay', (index * 0.1) + 's');
            $(this).addClass('animate-fade-in-up');
        });
        
        // Stagger animation for stats cards
        $('.stats-card').each(function(index) {
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
            
            // Observe elements for animation
            document.querySelectorAll('.popular-category-card').forEach(el => {
                observer.observe(el);
            });
        }
    }
    
    function addHoverEffects() {
        // Enhanced hover effects for category cards
        $('.category-card').hover(
            function() {
                $(this).addClass('hover-lift');
                $(this).find('.category-icon').addClass('animate-bounce-gentle');
            },
            function() {
                $(this).removeClass('hover-lift');
                $(this).find('.category-icon').removeClass('animate-bounce-gentle');
            }
        );
        
        // Enhanced hover effects for popular category cards
        $('.popular-category-card').hover(
            function() {
                $(this).find('.popular-category-icon').addClass('animate-bounce-gentle');
            },
            function() {
                $(this).find('.popular-category-icon').removeClass('animate-bounce-gentle');
            }
        );
        
        // Stats card hover effects
        $('.stats-card').hover(
            function() {
                $(this).find('.stats-icon').addClass('animate-bounce-gentle');
            },
            function() {
                $(this).find('.stats-icon').removeClass('animate-bounce-gentle');
            }
        );
    }
    
    function addSmoothScrolling() {
        // Smooth scroll for anchor links
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            const target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 140
                }, 800, 'easeInOutCubic');
            }
        });
    }
    
    function addLoadingStates() {
        // Add loading states for category links
        $('.category-link, .popular-btn, .cta-btn').on('click', function() {
            const $element = $(this);
            const originalHtml = $element.html();
            
            // Add loading state
            if ($element.hasClass('btn')) {
                $element.html('<i class="bi bi-arrow-clockwise spin me-2"></i>Memuat...');
            } else {
                $element.addClass('loading-shimmer');
            }
            
            $element.prop('disabled', true);
            
            // Reset after navigation (fallback)
            setTimeout(() => {
                if ($element.hasClass('btn')) {
                    $element.html(originalHtml);
                } else {
                    $element.removeClass('loading-shimmer');
                }
                $element.prop('disabled', false);
            }, 3000);
        });
    }
    
    // Add shimmer loading effect
    const shimmerStyle = `
        @keyframes shimmer {
            0% { background-position: -200px 0; }
            100% { background-position: calc(200px + 100%) 0; }
        }
        
        .loading-shimmer {
            background: linear-gradient(90deg, var(--green-50) 25%, var(--green-100) 50%, var(--green-50) 75%);
            background-size: 200px 100%;
            animation: shimmer 1.5s infinite;
        }
        
        [data-theme="dark"] .loading-shimmer {
            background: linear-gradient(90deg, var(--bg-secondary) 25%, var(--bg-tertiary) 50%, var(--bg-secondary) 75%);
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
    styleSheet.textContent = shimmerStyle;
    document.head.appendChild(styleSheet);
    </script>
    