<style>
    /* Responsive Design */
    @media (max-width: 1200px) {
        .container {
            max-width: 100%;
            padding: 0 2rem;
        }
    }
    
    @media (max-width: 992px) {
        .hero-section {
            padding: 100px 0 80px;
            text-align: center;
        }
        
        .hero-section h1 {
            font-size: 3rem;
        }
        
        .stats-card {
            min-height: 160px;
            padding: 1.5rem;
        }
        
        .category-card {
            min-height: 260px;
            padding: 2rem 1.5rem;
        }
    }
    
    @media (max-width: 768px) {
        .hero-section {
            padding: 80px 0 60px;
        }
        
        .hero-section h1 {
            font-size: 2.5rem;
        }
        
        .hero-section p {
            font-size: 1rem;
        }
        
        .search-form {
            flex-direction: column;
            gap: 1rem;
            padding: 1.5rem;
        }
        
        .search-form input {
            width: 100%;
            text-align: center;
            padding: 1.25rem;
        }
        
        .search-form button {
            width: 100%;
            justify-content: center;
            padding: 1.25rem;
        }
        
        .recipe-card img {
            height: 200px;
        }
        
        .recipe-card .card-body {
            padding: 1.25rem;
        }
        
        .category-card {
            min-height: 240px;
            padding: 1.5rem;
        }
        
        .category-card .category-icon {
            width: 70px;
            height: 70px;
        }
        
        .category-card .category-icon i {
            font-size: 1.75rem;
        }
        
        .stats-card {
            min-height: 140px;
            padding: 1.25rem;
        }
        
        .stats-card h3 {
            font-size: 2rem;
        }
        
        .page-header {
            padding: 2rem;
            text-align: center;
        }
        
        .navbar-brand {
            font-size: 1.25rem;
        }
        
        .brand-icon {
            width: 36px;
            height: 36px;
        }
        
        .brand-icon i {
            font-size: 1rem;
        }
        
        .navbar-toggler i {
            color: var(--text-primary);
        }
    }
    
    @media (max-width: 576px) {
        .container {
            padding: 0 1rem;
        }
        
        .hero-section {
            padding: 60px 0 40px;
        }
        
        .hero-section h1 {
            font-size: 2rem;
        }
        
        .recipe-card img {
            height: 180px;
        }
        
        .category-card {
            min-height: 220px;
            padding: 1.25rem;
        }
        
        .category-card .category-icon {
            width: 60px;
            height: 60px;
        }
        
        .category-card .category-icon i {
            font-size: 1.5rem;
        }
        
        .stats-card {
            min-height: 120px;
            padding: 1rem;
        }
        
        .stats-card h3 {
            font-size: 1.75rem;
        }
        
        .footer {
            padding: 3rem 0 1.5rem;
        }
        
        .brand-text {
            display: none;
        }
        
        .search-form {
            padding: 1.25rem;
        }
        
        .dropdown-menu {
            min-width: 280px;
            padding: 1rem;
        }
        
        .dropdown-item {
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
        }
        
        .back-to-top-btn {
            width: 48px;
            height: 48px;
            margin: 1rem;
        }
        
        .toast-container-custom {
            margin-top: 100px;
            padding: 1rem;
        }
    }
    
    /* Print Styles */
    @media print {
        .navbar,
        .footer,
        .back-to-top-btn,
        .toast-container-custom {
            display: none !important;
        }
        
        body {
            background: white !important;
            color: black !important;
        }
        
        .card {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
        }
    }
    
    /* High Contrast Mode */
    @media (prefers-contrast: high) {
        :root {
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.3);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.4);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.4);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.4);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        
        .btn {
            border: 2px solid currentColor;
        }
        
        .card {
            border: 2px solid var(--border-primary);
        }
    }
    
    /* Reduced Motion */
    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
            scroll-behavior: auto !important;
        }
        
        .animate-fade-in-up,
        .animate-slide-in-right,
        .animate-bounce-gentle {
            animation: none;
        }
    }
    </style>
    