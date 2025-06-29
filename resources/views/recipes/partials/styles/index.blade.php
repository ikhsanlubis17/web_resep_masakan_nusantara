<style>
    /* Page Header */
    .page-header {
        background: var(--cream-gradient);
        border-radius: var(--radius-2xl);
        padding: 3rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--border-primary);
        position: relative;
        overflow: hidden;
        margin-bottom: 2rem;
    }
    
    [data-theme="dark"] .page-header {
        background: var(--bg-secondary);
    }
    
    .header-badge {
        background: var(--primary-gradient);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: var(--radius-3xl);
        font-size: 0.875rem;
        font-weight: 500;
        box-shadow: var(--shadow-md);
    }
    
    .header-title {
        color: var(--text-primary);
    }
    
    .header-description {
        color: var(--text-secondary);
    }
    
    /* Filter Section */
    .filter-card {
        background: var(--bg-primary);
        border-radius: var(--radius-2xl);
        padding: 2rem;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-primary);
    }
    
    .filter-title {
        color: var(--text-primary);
        font-weight: 600;
        display: flex;
        align-items: center;
    }
    
    .filter-title i {
        color: var(--medium-green);
    }
    
    .search-input-wrapper {
        position: relative;
    }
    
    .search-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
        z-index: 2;
    }
    
    .search-input {
        padding-left: 3rem;
    }
    
    .filter-btn {
        transition: all var(--transition-normal);
    }
    
    .filter-btn:hover {
        transform: translateY(-2px);
    }
    
    /* Recipe Cards */
    .recipe-card {
        background: var(--bg-primary);
        border-radius: var(--radius-2xl);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-primary);
        transition: all var(--transition-normal);
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .recipe-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-xl);
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
    
    .recipe-card:hover .recipe-image {
        transform: scale(1.1);
    }
    
    .recipe-badges {
        position: absolute;
        top: 1rem;
        left: 1rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .category-badge {
        background: var(--primary-gradient);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: var(--radius-md);
        font-size: 0.75rem;
        font-weight: 500;
        text-decoration: none;
        backdrop-filter: blur(10px);
        transition: all var(--transition-normal);
    }
    
    .category-badge:hover {
        color: white;
        transform: scale(1.05);
    }
    
    .difficulty-badge {
        padding: 0.25rem 0.75rem;
        border-radius: var(--radius-md);
        font-size: 0.75rem;
        font-weight: 500;
        backdrop-filter: blur(10px);
    }
    
    .badge-mudah { 
        background: rgba(16, 185, 129, 0.9); 
        color: white; 
    }
    
    .badge-sedang { 
        background: rgba(245, 158, 11, 0.9); 
        color: white; 
    }
    
    .badge-sulit { 
        background: rgba(239, 68, 68, 0.9); 
        color: white; 
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
        backdrop-filter: blur(4px);
    }
    
    .favorite-btn:hover {
        background: rgba(0, 0, 0, 0.8);
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    
    .favorite-btn.favorited {
        background: rgba(220, 53, 69, 0.9);
        box-shadow: 0 0 0 2px rgba(220, 53, 69, 0.3);
    }
    
    .favorite-btn.favorited:hover {
        background: rgba(220, 53, 69, 1);
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
    
    .recipe-card:hover .recipe-overlay {
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
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .recipe-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    
    .rating {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .rating-value {
        font-weight: 500;
        color: var(--text-primary);
    }
    
    .recipe-author {
        color: var(--text-muted);
        font-size: 0.75rem;
    }
    
    .recipe-title {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 0.75rem;
        line-height: 1.4;
        font-size: 1.125rem;
    }
    
    .recipe-description {
        color: var(--text-secondary);
        font-size: 0.875rem;
        line-height: 1.5;
        margin-bottom: 1rem;
        flex: 1;
    }
    
    .recipe-stats {
        display: flex;
        justify-content: space-between;
        color: var(--text-muted);
        font-size: 0.875rem;
        margin-bottom: 1rem;
    }
    
    .stat-item {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    /* No Recipes */
    .no-recipes-section {
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .no-recipes-icon {
        width: 120px;
        height: 120px;
        background: var(--bg-secondary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        border: 1px solid var(--border-primary);
    }
    
    .no-recipes-icon i {
        font-size: 3rem;
        color: var(--text-muted);
    }
    
    .no-recipes-title {
        color: var(--text-primary);
        font-size: 1.5rem;
    }
    
    .no-recipes-description {
        color: var(--text-secondary);
        max-width: 500px;
        margin: 0 auto;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .page-header {
            padding: 2rem;
            text-align: center;
        }
        
        .filter-card {
            padding: 1.5rem;
        }
        
        .recipe-image {
            height: 200px;
        }
        
        .recipe-content {
            padding: 1.25rem;
        }
    }
    
    @media (max-width: 576px) {
        .recipe-image {
            height: 180px;
        }
        
        .recipe-stats {
            flex-direction: column;
            gap: 0.5rem;
            align-items: flex-start;
        }
    }
    </style>
    