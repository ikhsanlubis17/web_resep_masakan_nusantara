<style>
    /* Hero Section */
    .hero-section {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        overflow: hidden;
        background: var(--primary-gradient);
    }
    
    .hero-background {
        position: absolute;
        inset: 0;
        background: url('/images/bg_home.jpg') no-repeat center center/cover;
        animation: zoomOutBackground 8s ease-out forwards;
        z-index: 0;
        will-change: transform;
    }
    
    [data-theme="dark"] .hero-background {
        filter: brightness(0.7) contrast(1.1);
    }
    
    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(58, 77, 57, 0.8) 0%, rgba(79, 111, 82, 0.6) 100%);
        z-index: 1;
    }
    
    [data-theme="dark"] .hero-overlay {
        background: linear-gradient(135deg, rgba(26, 26, 26, 0.9) 0%, rgba(58, 77, 57, 0.8) 100%);
    }
    
    .hero-section > .container {
        position: relative;
        z-index: 2;
    }
    
    .hero-content {
        max-width: 100%;
    }
    
    .hero-badge {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: var(--radius-3xl);
        padding: 0.75rem 1.5rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all var(--transition-normal);
    }
    
    .hero-badge:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }
    
    .hero-title {
        line-height: 1.1;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .hero-title-gradient {
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .hero-description {
        max-width: 600px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }
    
    /* Hero Search Form */
    .hero-search-form {
        max-width: 500px;
    }
    
    .search-input-wrapper {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: var(--radius-2xl);
        padding: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all var(--transition-normal);
    }
    
    .search-input-wrapper:focus-within {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.4);
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
    
    .search-icon {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.125rem;
    }
    
    .search-input {
        background: transparent;
        border: none;
        color: white;
        flex: 1;
        font-size: 1rem;
        outline: none;
    }
    
    .search-input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }
    
    .search-btn {
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        color: #000;
        border: none;
        border-radius: var(--radius-xl);
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        transition: all var(--transition-normal);
        white-space: nowrap;
    }
    
    .search-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(251, 191, 36, 0.4);
        color: #000;
    }
    
    /* Hero Stats */
    .hero-stats {
        margin-top: 2rem;
    }
    
    .stat-item {
        padding: 1rem;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: var(--radius-xl);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all var(--transition-normal);
    }
    
    .stat-item:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-4px);
    }
    
    .stat-number {
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .stat-label {
        color: rgba(255, 255, 255, 0.8);
        font-weight: 500;
    }
    
    .stat-star {
        font-size: 0.8rem;
    }
    
    /* Hero Floating Card */
    .hero-image-wrapper {
        position: relative;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .hero-floating-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(20px);
        border-radius: var(--radius-2xl);
        padding: 1.5rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        animation: float 6s ease-in-out infinite;
        max-width: 280px;
    }
    
    .hero-recipe-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: var(--radius-xl);
        margin-bottom: 1rem;
    }
    
    .floating-card-content h6 {
        color: white;
        font-weight: 600;
    }
    
    /* Section Styles */
    .categories-section {
        background: var(--bg-primary);
    }
    
    [data-theme="dark"] .categories-section {
        background: var(--bg-secondary);
    }
    
    .featured-recipes-section {
        background: linear-gradient(135deg, #fef7f0 0%, #fff5f5 100%);
    }
    
    [data-theme="dark"] .featured-recipes-section {
        background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 100%);
    }
    
    .popular-recipes-section {
        background: var(--bg-primary);
    }
    
    [data-theme="dark"] .popular-recipes-section {
        background: var(--bg-secondary);
    }
    
    /* Section Headers */
    .section-header {
        margin-bottom: 3rem;
    }
    
    .section-badge {
        background: var(--primary-gradient);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: var(--radius-3xl);
        font-size: 0.875rem;
        font-weight: 500;
        box-shadow: var(--shadow-md);
    }
    
    .section-title {
        color: var(--text-primary);
        margin-bottom: 1rem;
    }
    
    .section-description {
        color: var(--text-secondary);
        max-width: 600px;
        margin: 0 auto;
    }
    
    /* Category Cards */
    .category-link {
        text-decoration: none;
        display: block;
    }
    
    .category-card {
        height: 280px;
        border-radius: var(--radius-2xl);
        padding: 2rem;
        color: white;
        background-size: cover;
        background-position: center;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        transition: all var(--transition-normal);
        cursor: pointer;
    }
    
    .category-card.default-category {
        background: var(--primary-gradient);
    }
    
    .category-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0.6) 100%);
        backdrop-filter: blur(2px);
        z-index: 1;
        transition: all var(--transition-normal);
    }
    
    .category-card:hover .category-overlay {
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.4) 100%);
    }
    
    .category-content {
        position: relative;
        z-index: 2;
    }
    
    .category-icon {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: var(--radius-xl);
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 64px;
        height: 64px;
        margin-bottom: 1rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        transition: all var(--transition-normal);
    }
    
    .category-card:hover .category-icon {
        transform: scale(1.1) rotate(5deg);
        background: rgba(255, 255, 255, 0.25);
    }
    
    .category-icon i {
        font-size: 1.5rem;
        color: white;
    }
    
    .category-title {
        color: white;
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 1.25rem;
    }
    
    .category-count {
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 1rem;
        font-size: 0.875rem;
    }
    
    .category-arrow {
        opacity: 0;
        transform: translateX(-10px);
        transition: all var(--transition-normal);
    }
    
    .category-card:hover .category-arrow {
        opacity: 1;
        transform: translateX(0);
    }
    
    .category-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }
    
    /* Recipe Cards */
    .featured-recipe-card,
    .popular-recipe-card {
        background: var(--bg-primary);
        border-radius: var(--radius-2xl);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-primary);
        transition: all var(--transition-normal);
        height: 100%;
    }
    
    .featured-recipe-card:hover,
    .popular-recipe-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-2xl);
    }
    
    .recipe-image-wrapper {
        position: relative;
        overflow: hidden;
    }
    
    .recipe-image {
        width: 100%;
        height: 240px;
        object-fit: cover;
        transition: transform var(--transition-slow);
    }
    
    .featured-recipe-card:hover .recipe-image,
    .popular-recipe-card:hover .recipe-image {
        transform: scale(1.1);
    }
    
    .favorite-btn {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: rgba(0, 0, 0, 0.6);
        border: none;
        border-radius: 50%;
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: all var(--transition-normal);
        cursor: pointer;
        z-index: 10;
    }
    
    .favorite-btn:hover {
        background: rgba(0, 0, 0, 0.8);
        transform: scale(1.1);
    }
    
    .favorite-btn.favorited {
        background: #dc3545;
        color: white;
    }
    
    .favorite-btn.favorited:hover {
        background: #c82333;
    }
    
    .recipe-badges {
        position: absolute;
        top: 1rem;
        left: 1rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .difficulty-badge {
        padding: 0.25rem 0.75rem;
        border-radius: var(--radius-md);
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    .badge-mudah { background: #10b981; color: white; }
    .badge-sedang { background: #f59e0b; color: white; }
    .badge-sulit { background: #ef4444; color: white; }
    
    .featured-badge {
        background: var(--primary-gradient);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: var(--radius-md);
        font-size: 0.75rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .trending-rank {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: var(--primary-gradient);
        color: white;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 0.875rem;
        box-shadow: var(--shadow-md);
    }
    
    .recipe-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all var(--transition-normal);
    }
    
    .popular-recipe-card:hover .recipe-overlay {
        opacity: 1;
    }
    
    .overlay-btn {
        background: white;
        color: var(--dark-green);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        text-decoration: none;
        transition: all var(--transition-normal);
    }
    
    .overlay-btn:hover {
        transform: scale(1.1);
        color: var(--dark-green);
    }
    
    .recipe-content {
        padding: 1.5rem;
    }
    
    .recipe-meta {
        display: flex;
        justify-content: between;
        align-items: center;
    }
    
    .rating {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .author {
        color: var(--text-muted);
    }
    
    .recipe-title {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 0.75rem;
        line-height: 1.4;
    }
    
    .recipe-description {
        color: var(--text-secondary);
        font-size: 0.875rem;
        line-height: 1.5;
        margin-bottom: 1rem;
    }
    
    .recipe-stats {
        display: flex;
        justify-content: space-between;
        color: var(--text-muted);
        font-size: 0.875rem;
    }
    
    .stat-item {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    /* Popular Recipe Specific */
    .popular-recipe-card .recipe-image {
        height: 200px;
    }
    
    .recipe-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 0.5rem;
    }
    
    .recipe-header .recipe-title {
        font-size: 1rem;
        margin-bottom: 0;
        flex: 1;
    }
    
    .views-badge {
        background: var(--bg-secondary);
        color: var(--text-secondary);
        padding: 0.25rem 0.5rem;
        border-radius: var(--radius-md);
        font-size: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
        white-space: nowrap;
        margin-left: 0.5rem;
    }
    
    .recipe-rating {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        font-size: 0.875rem;
    }
    
    .rating-value {
        font-weight: 500;
        color: var(--text-primary);
    }
    
    .rating-count {
        color: var(--text-muted);
    }
    
    /* CTA Section */
    .cta-section {
        position: relative;
        overflow: hidden;
    }
    
    .cta-background {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #f97316 0%, #dc2626 100%);
        z-index: 0;
    }
    
    .cta-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(249, 115, 22, 0.9) 0%, rgba(220, 38, 38, 0.9) 100%);
        z-index: 1;
    }
    
    [data-theme="dark"] .cta-overlay {
        background: linear-gradient(135deg, rgba(249, 115, 22, 0.8) 0%, rgba(220, 38, 38, 0.8) 100%);
    }
    
    .cta-section > .container {
        position: relative;
        z-index: 2;
    }
    
    .cta-title {
        font-size: 2rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .cta-description {
        opacity: 0.9;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }
    
    .cta-btn {
        background: white;
        color: var(--dark-green);
        border: none;
        font-weight: 600;
        transition: all var(--transition-normal);
        box-shadow: var(--shadow-lg);
    }
    
    .cta-btn:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-2xl);
        color: var(--dark-green);
    }
    
    /* Animations */
    @keyframes zoomOutBackground {
        0% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-section {
            min-height: 90vh;
            text-align: center;
        }
        
        .hero-title {
            font-size: 2.5rem;
        }
        
        .search-input-wrapper {
            flex-direction: column;
            gap: 1rem;
            padding: 1rem;
        }
        
        .search-input {
            text-align: center;
            padding: 0.5rem;
        }
        
        .search-btn {
            width: 100%;
            justify-content: center;
        }
        
        .hero-stats {
            margin-top: 2rem;
        }
        
        .stat-item {
            padding: 0.75rem;
        }
        
        .category-card {
            height: 240px;
            padding: 1.5rem;
        }
        
        .category-icon {
            width: 56px;
            height: 56px;
        }
        
        .category-icon i {
            font-size: 1.25rem;
        }
        
        .recipe-image {
            height: 200px;
        }
        
        .popular-recipe-card .recipe-image {
            height: 180px;
        }
        
        .section-header {
            text-align: center;
        }
        
        .cta-title {
            font-size: 1.75rem;
        }
    }
    
    @media (max-width: 576px) {
        .hero-title {
            font-size: 2rem;
        }
        
        .category-card {
            height: 220px;
            padding: 1.25rem;
        }
        
        .category-icon {
            width: 48px;
            height: 48px;
        }
        
        .category-icon i {
            font-size: 1rem;
        }
        
        .recipe-content {
            padding: 1.25rem;
        }
        
        .cta-title {
            font-size: 1.5rem;
        }
    }
    </style>
    