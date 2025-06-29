<script>
    // CSRF Token Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    // Theme Management
    class ThemeManager {
        constructor() {
            this.theme = localStorage.getItem('theme') || 'light';
            this.init();
        }
    
        init() {
            this.setTheme(this.theme);
            this.bindEvents();
        }
    
        setTheme(theme) {
            this.theme = theme;
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
            this.updateThemeIcon();
        }
    
        toggleTheme() {
            const newTheme = this.theme === 'light' ? 'dark' : 'light';
            this.setTheme(newTheme);
            this.showThemeToast();
        }
    
        updateThemeIcon() {
            const lightIcon = document.querySelector('.theme-icon-light');
            const darkIcon = document.querySelector('.theme-icon-dark');
            
            if (this.theme === 'dark') {
                lightIcon?.classList.add('d-none');
                darkIcon?.classList.remove('d-none');
            } else {
                lightIcon?.classList.remove('d-none');
                darkIcon?.classList.add('d-none');
            }
        }
    
        showThemeToast() {
            const message = this.theme === 'dark' ? 
                'Mode gelap diaktifkan 🌙' : 
                'Mode terang diaktifkan ☀️';
            showToast(message, 'info');
        }
    
        bindEvents() {
            const themeToggle = document.getElementById('themeToggle');
            if (themeToggle) {
                themeToggle.addEventListener('click', () => this.toggleTheme());
            }
    
            // Listen for system theme changes
            if (window.matchMedia) {
                const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
                mediaQuery.addEventListener('change', (e) => {
                    if (!localStorage.getItem('theme')) {
                        this.setTheme(e.matches ? 'dark' : 'light');
                    }
                });
            }
        }
    }
    
    // Initialize theme manager
    const themeManager = new ThemeManager();
    
    // Enhanced Navbar Scroll Effect
    $(window).scroll(function() {
        const scrollTop = $(this).scrollTop();
        const navbar = $('.navbar');
        const backToTop = $('#backToTop');
        
        if (scrollTop > 80) {
            navbar.addClass('scrolled');
            backToTop.removeClass('d-none').addClass('animate-fade-in-up');
        } else {
            navbar.removeClass('scrolled');
            backToTop.addClass('d-none').removeClass('animate-fade-in-up');
        }
    });
    
    // Back to Top Button with smooth animation
    $('#backToTop').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 1000, 'easeInOutCubic');
    });
    
    // Enhanced Favorite Toggle Function
    function toggleFavorite(recipeId, button) {
        const $button = $(button);
        const $icon = $button.find('i');
        const originalClass = $icon.attr('class');
        
        // Add loading state with animation
        $icon.attr('class', 'bi bi-heart-pulse-fill animate-pulse');
        $button.prop('disabled', true).addClass('loading');
        
        $.ajax({
            url: `/recipes/${recipeId}/favorite`,
            method: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    if (response.favorited) {
                        $button.addClass('favorited');
                        $icon.attr('class', 'bi bi-heart-fill');
                        showToast(response.message || 'Resep ditambahkan ke favorit! ❤️', 'success');
                        
                        // Celebration animation
                        $button.addClass('animate-bounce-gentle');
                        setTimeout(() => $button.removeClass('animate-bounce-gentle'), 2000);
                    } else {
                        $button.removeClass('favorited');
                        $icon.attr('class', 'bi bi-heart');
                        showToast(response.message || 'Resep dihapus dari favorit', 'info');
                    }
                    
                    // Update favorites count
                    $(`.favorites-count-${recipeId}`).text(response.favorites_count);
                    
                    // Update navbar favorites count with animation
                    const navFavCount = $('.nav-link .badge');
                    if (navFavCount.length) {
                        const currentCount = parseInt(navFavCount.text()) || 0;
                        const newCount = response.favorited ? currentCount + 1 : Math.max(0, currentCount - 1);
                        navFavCount.addClass('animate-bounce-gentle').text(newCount);
                        setTimeout(() => navFavCount.removeClass('animate-bounce-gentle'), 1000);
                    }
                } else {
                    $icon.attr('class', originalClass);
                    showToast(response.message || 'Terjadi kesalahan. Silakan coba lagi.', 'error');
                }
            },
            error: function(xhr) {
                $icon.attr('class', originalClass);
                
                let message = 'Terjadi kesalahan. Silakan coba lagi.';
                
                if (xhr.status === 401) {
                    message = 'Silakan login terlebih dahulu untuk menambah favorit';
                    showToast(message, 'warning');
                    // Redirect to login after 3 seconds
                    setTimeout(() => {
                        window.location.href = '/login';
                    }, 3000);
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                    showToast(message, 'error');
                } else {
                    showToast(message, 'error');
                }
            },
            complete: function() {
                $button.prop('disabled', false).removeClass('loading');
            }
        });
    }
    
    // Enhanced Toast Notification System
    function showToast(message, type = 'success') {
        const icons = {
            success: 'check-circle-fill',
            error: 'exclamation-triangle-fill',
            warning: 'exclamation-circle-fill',
            info: 'info-circle-fill'
        };
        
        const colors = {
            success: 'success',
            error: 'danger',
            warning: 'warning',
            info: 'info'
        };
        
        const toastId = 'toast-' + Date.now();
        const toastHtml = `
            <div id="${toastId}" class="toast align-items-center text-bg-${colors[type]} border-0 animate-slide-in-right" role="alert" style="box-shadow: var(--shadow-xl);">
                <div class="d-flex">
                    <div class="toast-body fw-semibold d-flex align-items-center">
                        <i class="bi bi-${icons[type]} me-3 fs-5"></i>
                        <span>${message}</span>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        `;
        
        $('#toast-container').append(toastHtml);
        
        const toastElement = document.getElementById(toastId);
        const toast = new bootstrap.Toast(toastElement, {
            autohide: true,
            delay: type === 'error' ? 10000 : 6000
        });
        
        toast.show();
        
        // Remove toast element after it's hidden
        toastElement.addEventListener('hidden.bs.toast', function() {
            $(this).remove();
        });
    }
    
    // Enhanced Search Form with validation and loading
    $('.search-form').on('submit', function(e) {
        const input = $(this).find('input[type="search"], input[type="text"]');
        const button = $(this).find('button[type="submit"]');
        
        if (input.val().trim() === '') {
            e.preventDefault();
            input.focus().addClass('is-invalid');
            showToast('Masukkan kata kunci pencarian', 'warning');
            
            setTimeout(() => input.removeClass('is-invalid'), 3000);
            return;
        }
        
        // Add loading state
        const originalHtml = button.html();
        button.html('<i class="bi bi-arrow-clockwise spin me-2"></i>Mencari...').prop('disabled', true);
        
        // Reset button after delay (for demo)
        setTimeout(() => {
            button.html(originalHtml).prop('disabled', false);
        }, 2000);
    });
    
    // Enhanced Form Validation and Loading States
    $('form').on('submit', function(e) {
        const $form = $(this);
        const $submitBtn = $form.find('button[type="submit"]');
        
        // Skip if it's search form (already handled above)
        if ($form.hasClass('search-form')) return;
        
        if ($submitBtn.length && !$submitBtn.prop('disabled')) {
            const originalHtml = $submitBtn.html();
            $submitBtn.html('<i class="bi bi-arrow-clockwise spin me-2"></i>Memproses...').prop('disabled', true);
            
            // Re-enable after 30 seconds as fallback
            setTimeout(() => {
                $submitBtn.html(originalHtml).prop('disabled', false);
            }, 30000);
        }
    });
    
    // Auto-hide alerts with smooth animation
    setTimeout(function() {
        $('.alert').each(function() {
            const $alert = $(this);
            $alert.fadeOut(1000, function() {
                $alert.slideUp(500, function() {
                    $alert.remove();
                });
            });
        });
    }, 8000);
    
    // Initialize tooltips and popovers
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl, {
            trigger: 'hover focus'
        });
    });
    
    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
    
    // Smooth scroll for anchor links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        const target = $(this.getAttribute('href'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 140
            }, 1000, 'easeInOutCubic');
        }
    });
    
    // Enhanced card hover effects
    $('.recipe-card, .category-card').hover(
        function() {
            $(this).find('img').addClass('scale-110');
        },
        function() {
            $(this).find('img').removeClass('scale-110');
        }
    );
    
    // Lazy loading for images (if supported)
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    img.classList.add('loaded');
                    imageObserver.unobserve(img);
                }
            });
        });
    
        document.querySelectorAll('img[data-src]').forEach(function(img) {
            imageObserver.observe(img);
        });
    }
    
    // Add custom easing function for jQuery animations
    $.easing.easeInOutCubic = function (x, t, b, c, d) {
        if ((t/=d/2) < 1) return c/2*t*t*t + b;
        return c/2*((t-=2)*t*t + 2) + b;
    };
    
    // Mobile menu toggle enhancement
    $('.navbar-toggler').on('click', function() {
        $(this).find('i').toggleClass('bi-list bi-x');
    });
    
    // Enhanced dropdown animations
    $('.dropdown').on('show.bs.dropdown', function() {
        $(this).find('.dropdown-menu').addClass('animate-fade-in-up');
    });
    
    $('.dropdown').on('hide.bs.dropdown', function() {
        $(this).find('.dropdown-menu').removeClass('animate-fade-in-up');
    });
    
    // Initialize page with fade-in animation
    $(document).ready(function() {
        $('body').addClass('animate-fade-in-up');
        
        // Add entrance animations to elements
        $('.recipe-card, .category-card, .stats-card').each(function(index) {
            $(this).css('animation-delay', (index * 0.1) + 's');
            $(this).addClass('animate-fade-in-up');
        });
    });
    
    // Newsletter subscription
    $('.newsletter-signup button').on('click', function() {
        const email = $(this).siblings('input[type="email"]').val();
        if (email && email.includes('@')) {
            showToast('Terima kasih! Anda telah berlangganan newsletter kami.', 'success');
            $(this).siblings('input[type="email"]').val('');
        } else {
            showToast('Masukkan alamat email yang valid', 'warning');
        }
    });
    
    // Add keyboard navigation support
    $(document).on('keydown', function(e) {
        // ESC key to close modals/dropdowns
        if (e.key === 'Escape') {
            $('.dropdown-menu').removeClass('show');
            $('.modal').modal('hide');
        }
        
        // Ctrl/Cmd + K for search focus
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            $('.search-form input').focus();
        }
        
        // Ctrl/Cmd + D for theme toggle
        if ((e.ctrlKey || e.metaKey) && e.key === 'd') {
            e.preventDefault();
            themeManager.toggleTheme();
        }
    });
    
    // Performance optimization: Debounce scroll events
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // Apply debounce to scroll handler
    $(window).scroll(debounce(function() {
        const scrollTop = $(this).scrollTop();
        const navbar = $('.navbar');
        const backToTop = $('#backToTop');
        
        if (scrollTop > 80) {
            navbar.addClass('scrolled');
            backToTop.removeClass('d-none').addClass('animate-fade-in-up');
        } else {
            navbar.removeClass('scrolled');
            backToTop.addClass('d-none').removeClass('animate-fade-in-up');
        }
    }, 10));
    
    // Accessibility improvements
    $(document).ready(function() {
        // Add focus indicators for keyboard navigation
        $('a, button, input, select, textarea').on('focus', function() {
            $(this).addClass('keyboard-focus');
        }).on('blur', function() {
            $(this).removeClass('keyboard-focus');
        });
        
        // Announce theme changes to screen readers
        const announcer = $('<div>', {
            'aria-live': 'polite',
            'aria-atomic': 'true',
            'class': 'sr-only'
        }).appendTo('body');
        
        // Update announcer when theme changes
        const originalToggleTheme = themeManager.toggleTheme;
        themeManager.toggleTheme = function() {
            originalToggleTheme.call(this);
            const message = this.theme === 'dark' ? 
                'Switched to dark mode' : 
                'Switched to light mode';
            announcer.text(message);
        };
    });
    </script>
    