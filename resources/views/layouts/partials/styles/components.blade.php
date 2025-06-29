<style>
    /* Enhanced Navbar */
    .navbar {
        /* background: rgba(255, 255, 255, 0.95) !important; */
        backdrop-filter: blur(20px) saturate(180%);
        -webkit-backdrop-filter: blur(20px) saturate(180%);
        border-bottom: 1px solid var(--border-primary);
        box-shadow: var(--shadow-sm);
        transition: all var(--transition-normal);
        padding: 1rem 0;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1050;
    }
    
    [data-theme="dark"] .navbar {
        background: rgba(26, 26, 26, 0.95) !important;
        border-bottom-color: var(--border-primary);
    }
    
    .navbar.scrolled {
        background: rgba(255, 255, 255, 0.98) !important;
        box-shadow: var(--shadow-lg);
        padding: 0.75rem 0;
        border-bottom-color: var(--border-secondary);
    }
    
    [data-theme="dark"] .navbar.scrolled {
        background: rgba(26, 26, 26, 0.98) !important;
    }
    
    .navbar-brand {
        font-weight: 700;
        font-size: 1.5rem;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        transition: all var(--transition-normal);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
    }
    
    .navbar-brand:hover {
        transform: scale(1.02);
    }
    
    .brand-icon {
        width: 42px;
        height: 42px;
        background: var(--primary-gradient);
        border-radius: var(--radius-xl);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: var(--shadow-md);
        transition: all var(--transition-normal);
        position: relative;
        overflow: hidden;
    }
    
    .brand-icon::before {
        content: '';
        position: absolute;
        top: -2px;
        right: -2px;
        width: 12px;
        height: 12px;
        background: var(--cream);
        border-radius: 50%;
        opacity: 0.9;
        animation: pulse-glow 2s infinite;
    }
    
    .brand-icon i {
        color: white;
        font-size: 1.125rem;
        z-index: 2;
        position: relative;
    }
    
    .brand-text {
        display: flex;
        flex-direction: column;
    }
    
    .brand-title {
        font-size: 1.25rem;
        font-weight: 700;
        line-height: 1.2;
    }
    
    .brand-subtitle {
        font-size: 0.75rem;
        color: var(--text-secondary);
        font-weight: 500;
        margin-top: -0.125rem;
        font-style: italic;
    }
    
    /* Theme Toggle Button */
    .theme-toggle {
        position: relative;
        width: 44px;
        height: 44px;
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all var(--transition-normal);
        color: var(--text-primary) !important;
    }
    
    .theme-toggle:hover {
        background: var(--bg-secondary) !important;
        transform: scale(1.05);
    }
    
    .theme-toggle i {
        font-size: 1.125rem;
        transition: all var(--transition-normal);
    }
    
    [data-theme="dark"] .theme-icon-light {
        display: none !important;
    }
    
    [data-theme="dark"] .theme-icon-dark {
        display: inline-block !important;
    }
    
    /* Navigation Links */
    .nav-link {
        font-weight: 500;
        color: var(--text-primary) !important;
        transition: all var(--transition-normal);
        padding: 0.75rem 1rem !important;
        border-radius: var(--radius-lg);
        margin: 0 0.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        position: relative;
    }
    
    .nav-link::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--primary-gradient);
        border-radius: var(--radius-lg);
        opacity: 0;
        transition: all var(--transition-normal);
        z-index: -1;
    }
    
    .nav-link:hover {
        color: white !important;
        transform: translateY(-1px);
    }
    
    .nav-link:hover::before {
        opacity: 1;
    }
    
    .nav-link.active {
        background: var(--primary-gradient);
        color: white !important;
        box-shadow: var(--shadow-md);
    }
    
    .nav-link.active::before {
        opacity: 1;
    }
    
    /* Enhanced Buttons */
    .btn {
        font-weight: 500;
        border-radius: var(--radius-lg);
        padding: 0.75rem 1.5rem;
        border: none;
        transition: all var(--transition-normal);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        font-size: 0.875rem;
        position: relative;
        overflow: hidden;
    }
    
    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s;
    }
    
    .btn:hover::before {
        left: 100%;
    }
    
    .btn-primary {
        background: var(--primary-gradient);
        color: white;
        box-shadow: var(--shadow-md);
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        color: white;
        background: var(--secondary-gradient);
    }
    
    .btn-outline-primary {
        border: 2px solid var(--light-green);
        color: var(--medium-green);
        background: transparent;
    }
    
    .btn-outline-primary:hover {
        background: var(--primary-gradient);
        color: white;
        transform: translateY(-1px);
        border-color: transparent;
    }
    
    /* Cards */
    .card {
        border: none;
        border-radius: var(--radius-2xl);
        background: var(--bg-primary);
        box-shadow: var(--shadow-md);
        transition: all var(--transition-normal);
        overflow: hidden;
        border: 1px solid var(--border-primary);
        height: 100%;
    }
    
    .card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-xl);
        border-color: var(--border-secondary);
    }
    
    /* Recipe Cards */
    .recipe-card {
        background: var(--bg-primary);
        border-radius: var(--radius-2xl);
        overflow: hidden;
        transition: all 0.4s ease;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-primary);
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }
    
    .recipe-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-2xl);
        border-color: var(--light-green);
    }
    
    .recipe-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--primary-gradient);
        opacity: 0;
        transition: opacity var(--transition-normal);
    }
    
    .recipe-card:hover::after {
        opacity: 1;
    }
    
    .recipe-card img {
        height: 240px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    
    .recipe-card:hover img {
        transform: scale(1.08);
    }
    
    .recipe-card .card-body {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .recipe-card .card-title {
        font-family: 'Playfair Display', serif;
        font-weight: 600;
        font-size: 1.125rem;
        margin-bottom: 0.75rem;
        color: var(--text-primary);
        line-height: 1.4;
    }
    
    .recipe-card .card-text {
        color: var(--text-secondary);
        font-size: 0.875rem;
        margin-bottom: 1rem;
        flex: 1;
        line-height: 1.5;
    }
    
    /* Footer */
    .footer {
        background: var(--dark-green);
        color: white;
        padding: 4rem 0 2rem;
        margin-top: 4rem;
        position: relative;
        overflow: hidden;
    }
    
    [data-theme="dark"] .footer {
        background: #0a0a0a;
    }
    
    .footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--primary-gradient);
    }
    
    .footer::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 25% 25%, rgba(115, 144, 114, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 75% 75%, rgba(79, 111, 82, 0.05) 0%, transparent 50%);
        z-index: 1;
    }
    
    .footer .container {
        position: relative;
        z-index: 2;
    }
    
    .footer-heading {
        color: var(--cream) !important;
        font-family: 'Playfair Display', serif;
        font-weight: 600;
    }
    
    .footer-subtitle {
        color: var(--cream);
    }
    
    .footer-description {
        color: rgba(255, 255, 255, 0.85);
    }
    
    .footer-link {
        color: rgba(255, 255, 255, 0.8);
        transition: all var(--transition-normal);
        text-decoration: none;
        display: flex;
        align-items: center;
    }
    
    .footer-link:hover {
        color: var(--cream);
        transform: translateX(4px);
    }
    
    .footer-copyright {
        color: rgba(255, 255, 255, 0.75);
    }
    
    .footer-legal-link {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: all var(--transition-normal);
    }
    
    .footer-legal-link:hover {
        color: var(--cream);
    }
    
    .footer-divider {
        border-color: rgba(255, 255, 255, 0.25);
    }
    
    .social-link {
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all var(--transition-normal);
    }
    
    .social-link:hover {
        transform: translateY(-2px);
        background: var(--cream) !important;
        color: var(--dark-green) !important;
    }
    
    .contact-icon {
        width: 40px;
        height: 40px;
        background: rgba(115, 144, 114, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .contact-icon i {
        color: var(--cream);
    }
    
    .contact-text {
        color: rgba(255, 255, 255, 0.9);
    }
    
    .newsletter-input {
        background: transparent !important;
        border: 1px solid rgba(255, 255, 255, 0.3) !important;
        color: white !important;
        border-radius: var(--radius-lg) 0 0 var(--radius-lg) !important;
    }
    
    .newsletter-input::placeholder {
        color: rgba(255, 255, 255, 0.6) !important;
    }
    
    .newsletter-input:focus {
        border-color: var(--cream) !important;
        box-shadow: none !important;
    }
    
    .newsletter-btn {
        background: var(--cream) !important;
        color: var(--dark-green) !important;
        border-radius: 0 var(--radius-lg) var(--radius-lg) 0 !important;
        font-weight: bold;
        transition: all var(--transition-normal);
    }
    
    .newsletter-btn:hover {
        background: white !important;
        transform: scale(1.05);
    }
    
    /* Back to Top Button */
    .back-to-top-btn {
        width: 56px;
        height: 56px;
        z-index: 1000;
        box-shadow: var(--shadow-xl);
        transition: all var(--transition-normal);
    }
    
    .back-to-top-btn:hover {
        transform: scale(1.1);
    }
    
    /* Toast Container */
    .toast-container-custom {
        z-index: 1055;
        margin-top: 120px;
    }
    
    /* Dropdown Menu */
    .dropdown-menu {
        border: none;
        box-shadow: var(--shadow-xl);
        border-radius: var(--radius-2xl);
        padding: 1.25rem;
        background: var(--bg-primary);
        backdrop-filter: blur(25px);
        margin-top: 0.75rem;
        min-width: 320px;
        border: 1px solid var(--border-primary);
    }
    
    .dropdown-item {
        border-radius: var(--radius-lg);
        padding: 1rem 1.5rem;
        font-weight: 500;
        transition: all var(--transition-normal);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.375rem;
        color: var(--text-primary);
        text-decoration: none;
        position: relative;
        overflow: hidden;
    }
    
    .dropdown-item::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--primary-gradient);
        opacity: 0;
        transition: opacity var(--transition-normal);
        z-index: -1;
    }
    
    .dropdown-item:hover {
        color: white;
        transform: translateX(4px);
    }
    
    .dropdown-item:hover::before {
        opacity: 1;
    }
    
    .dropdown-divider {
        margin: 1rem 0;
        border-color: var(--border-primary);
    }
    
    /* User Avatar */
    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--light-green);
        box-shadow: var(--shadow-md);
        transition: all var(--transition-normal);
    }
    
    .user-avatar:hover {
        transform: scale(1.1);
        box-shadow: var(--shadow-lg);
        border-color: var(--medium-green);
    }
    
    /* Alerts */
    .alert {
        border: none;
        border-radius: var(--radius-lg);
        padding: 1rem 1.5rem;
        font-weight: 500;
        box-shadow: var(--shadow-md);
        backdrop-filter: blur(10px);
    }
    
    .alert-success {
        background: rgba(115, 144, 114, 0.1);
        color: var(--dark-green);
        border-left: 4px solid var(--light-green);
    }
    
    [data-theme="dark"] .alert-success {
        background: rgba(115, 144, 114, 0.2);
        color: var(--light-green);
    }
    
    .alert-danger {
        background: rgba(239, 68, 68, 0.1);
        color: #991b1b;
        border-left: 4px solid #ef4444;
    }
    
    [data-theme="dark"] .alert-danger {
        background: rgba(239, 68, 68, 0.2);
        color: #fca5a5;
    }
    
    .alert-warning {
        background: rgba(245, 158, 11, 0.1);
        color: #a16207;
        border-left: 4px solid #eab308;
    }
    
    [data-theme="dark"] .alert-warning {
        background: rgba(245, 158, 11, 0.2);
        color: #fcd34d;
    }
    
    /* Form Controls */
    .form-control {
        border: 1px solid var(--border-primary);
        border-radius: var(--radius-lg);
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
        transition: all var(--transition-normal);
        background: var(--bg-primary);
        color: var(--text-primary);
    }
    
    .form-control:focus {
        border-color: var(--light-green);
        box-shadow: 0 0 0 3px rgba(115, 144, 114, 0.1);
        background: var(--bg-primary);
        color: var(--text-primary);
    }
    
    .form-label {
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 0.75rem;
        font-size: 0.875rem;
    }
    
    /* Badges */
    .badge {
        font-size: 0.75rem;
        font-weight: 500;
        padding: 0.375rem 0.75rem;
        border-radius: var(--radius-md);
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .badge-success {
        background: var(--light-green);
        color: white;
    }
    
    .badge-warning {
        background: #f59e0b;
        color: white;
    }
    
    .badge-danger {
        background: #ef4444;
        color: white;
    }
    
    .badge-primary {
        background: var(--medium-green);
        color: white;
    }
    </style>
    