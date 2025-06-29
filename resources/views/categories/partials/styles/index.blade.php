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
    }
    
    [data-theme="dark"] .page-header {
        background: var(--bg-secondary);
    }
    
    .page-header::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: var(--primary-gradient);
        opacity: 0.05;
        border-radius: 50%;
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
        margin-bottom: 1rem;
    }
    
    .header-description {
        color: var(--text-secondary);
    }
    
    .header-stats {
        gap: 2rem;
    }
    
    .stat-item {
        padding: 1rem;
        background: var(--bg-primary);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--border-primary);
        transition: all var(--transition-normal);
    }
    
    .stat-item:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }
    
    .stat-number {
        color: var(--medium-green);
    }
    
    .stat-label {
        color: var(--text-muted);
        font-weight: 500;
    }
    
    .stat-divider {
        width: 1px;
        height: 40px;
        background: var(--border-primary);
    }
    
    /* Category Cards */
    .category-link {
        text-decoration: none;
        display: block;
    }
    
    .category-card {
        height: 280px;
        border-radius: var(--radius-2xl);
        position: relative;
        overflow: hidden;
        transition: all var(--transition-normal);
        cursor: pointer;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-primary);
    }
    
    .category-background {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        transition: transform var(--transition-slow);
    }
    
    .category-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0.6) 100%);
        backdrop-filter: blur(2px);
        transition: all var(--transition-normal);
    }
    
    .category-card:hover .category-overlay {
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.4) 100%);
    }
    
    .category-card:hover .category-background {
        transform: scale(1.1);
    }
    
    .category-content {
        position: relative;
        z-index: 2;
        padding: 2rem;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        color: white;
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
    
    .category-description {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.875rem;
        margin-bottom: 1rem;
        line-height: 1.5;
    }
    
    .category-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
    }
    
    .recipe-count {
        display: flex;
        align-items: baseline;
        gap: 0.25rem;
    }
    
    .count-number {
        font-weight: bold;
        color: white;
        font-size: 1.125rem;
    }
    
    .count-label {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.875rem;
    }
    
    .category-arrow {
        opacity: 0;
        transform: translateX(-10px);
        transition: all var(--transition-normal);
        color: white;
    }
    
    .category-card:hover .category-arrow {
        opacity: 1;
        transform: translateX(0);
    }
    
    .category-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-2xl);
    }
    
    /* Statistics Cards */
    .stats-card {
        background: var(--primary-gradient);
        color: white;
        border-radius: var(--radius-2xl);
        padding: 2rem;
        text-align: center;
        box-shadow: var(--shadow-lg);
        transition: all var(--transition-normal);
        height: 100%;
        min-height: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    
    .stats-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        transition: transform var(--transition-normal);
    }
    
    .stats-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: var(--shadow-2xl);
    }
    
    .stats-card:hover::before {
        transform: scale(1.5) rotate(45deg);
    }
    
    .stats-card > * {
        position: relative;
        z-index: 2;
    }
    
    .stats-icon {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: var(--radius-2xl);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        box-shadow: var(--shadow-md);
        transition: all var(--transition-normal);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    
    .stats-card:hover .stats-icon {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.1);
        box-shadow: var(--shadow-lg);
    }
    
    .stats-icon i {
        font-size: 1.5rem;
        color: white;
    }
    
    .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .stats-label {
        font-weight: 500;
        font-size: 0.875rem;
        opacity: 0.95;
        margin: 0;
    }
    
    /* Popular Categories */
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
    
    .popular-category-card {
        background: var(--bg-primary);
        border-radius: var(--radius-2xl);
        padding: 2rem;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-primary);
        transition: all var(--transition-normal);
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .popular-category-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-xl);
    }
    
    .popular-rank {
        position: absolute;
        top: 1rem;
        right: 1rem;
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
    
    .popular-category-content {
        text-align: center;
    }
    
    .popular-category-icon {
        width: 80px;
        height: 80px;
        background: var(--primary-gradient);
        border-radius: var(--radius-2xl);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        box-shadow: var(--shadow-lg);
        transition: all var(--transition-normal);
    }
    
    .popular-category-card:hover .popular-category-icon {
        transform: scale(1.1) rotate(5deg);
        box-shadow: var(--shadow-2xl);
    }
    
    .popular-category-icon i {
        font-size: 2rem;
        color: white;
    }
    
    .popular-title {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 0.75rem;
        font-size: 1.25rem;
    }
    
    .popular-description {
        color: var(--text-secondary);
        font-size: 0.875rem;
        margin-bottom: 1.5rem;
        line-height: 1.5;
    }
    
    .popular-stats {
        margin-bottom: 2rem;
    }
    
    .stat-highlight {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .highlight-number {
        font-size: 1.5rem;
        font-weight: bold;
        color: var(--medium-green);
    }
    
    .highlight-label {
        color: var(--text-secondary);
        font-size: 0.875rem;
    }
    
    .popular-btn {
        transition: all var(--transition-normal);
    }
    
    .popular-btn:hover {
        transform: translateY(-2px);
    }
    
    /* CTA Section */
    .cta-section {
        background: var(--bg-secondary);
        border-radius: var(--radius-2xl);
        border: 1px solid var(--border-primary);
        position: relative;
        overflow: hidden;
    }
    
    .cta-content {
        position: relative;
        z-index: 2;
    }
    
    .cta-icon {
        width: 80px;
        height: 80px;
        background: var(--primary-gradient);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        box-shadow: var(--shadow-lg);
    }
    
    .cta-icon i {
        font-size: 2rem;
        color: white;
    }
    
    .cta-title {
        color: var(--text-primary);
        font-size: 1.5rem;
    }
    
    .cta-description {
        color: var(--text-secondary);
        max-width: 500px;
        margin: 0 auto;
    }
    
    .cta-btn {
        transition: all var(--transition-normal);
    }
    
    .cta-btn:hover {
        transform: translateY(-2px);
    }
    
    /* Empty State */
    .empty-state-section {
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .empty-state-icon {
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
    
    .empty-state-icon i {
        font-size: 3rem;
        color: var(--text-muted);
    }
    
    .empty-state-title {
        color: var(--text-primary);
        font-size: 1.5rem;
    }
    
    .empty-state-description {
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
        
        .header-stats {
            justify-content: center;
            gap: 1rem;
        }
        
        .category-card {
            height: 240px;
            padding: 1.5rem;
        }
        
        .category-content {
            padding: 1.5rem;
        }
        
        .category-icon {
            width: 56px;
            height: 56px;
        }
        
        .category-icon i {
            font-size: 1.25rem;
        }
        
        .stats-card {
            min-height: 160px;
            padding: 1.5rem;
        }
        
        .stats-number {
            font-size: 2rem;
        }
        
        .stats-icon {
            width: 50px;
            height: 50px;
        }
        
        .stats-icon i {
            font-size: 1.25rem;
        }
        
        .popular-category-card {
            padding: 1.5rem;
        }
        
        .popular-category-icon {
            width: 70px;
            height: 70px;
        }
        
        .popular-category-icon i {
            font-size: 1.75rem;
        }
    }
    
    @media (max-width: 576px) {
        .category-card {
            height: 220px;
        }
        
        .category-content {
            padding: 1.25rem;
        }
        
        .category-icon {
            width: 48px;
            height: 48px;
        }
        
        .category-icon i {
            font-size: 1rem;
        }
        
        .stats-card {
            min-height: 140px;
            padding: 1.25rem;
        }
        
        .stats-number {
            font-size: 1.75rem;
        }
        
        .cta-actions {
            flex-direction: column;
        }
    }
    </style>
    