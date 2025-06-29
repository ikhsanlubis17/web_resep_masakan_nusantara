<style>
    /* Header */
    .my-recipes-header {
        margin-bottom: 2rem;
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
    
    /* My Recipe Cards */
    .my-recipe-card {
        background: var(--bg-primary);
        border-radius: var(--radius-2xl);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-primary);
        transition: all var(--transition-normal);
        position: relative;
    }
    
    .my-recipe-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-xl);
    }
    
    .recipe-image-wrapper {
        position: relative;
        overflow: hidden;
    }
    
    .recipe-image {
        width: 100%;
        height: 180px;
        object-fit: cover;
        transition: transform var(--transition-slow);
    }
    
    .my-recipe-card:hover .recipe-image {
        transform: scale(1.1);
    }
    
    .recipe-badges {
        position: absolute;
        top: 0.75rem;
        left: 0.75rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: var(--radius-md);
        font-size: 0.75rem;
        font-weight: 500;
        backdrop-filter: blur(10px);
    }
    
    .badge-published {
        background: rgba(16, 185, 129, 0.9);
        color: white;
    }
    
    .badge-draft {
        background: rgba(107, 114, 128, 0.9);
        color: white;
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
    
    .my-recipe-card:hover .recipe-overlay {
        opacity: 1;
    }
    
    .overlay-btn {
        background: white;
        color: var(--dark-green);
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
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
    
    .recipe-title {
        margin-bottom: 0.75rem;
    }
    
    .title-link {
        color: var(--text-primary);
        text-decoration: none;
        font-weight: 600;
        line-height: 1.4;
        transition: color var(--transition-normal);
    }
    
    .title-link:hover {
        color: var(--medium-green);
    }
    
    .recipe-meta {
        margin-bottom: 0.75rem;
    }
    
    .category-date {
        color: var(--text-muted);
        font-size: 0.75rem;
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
    
    .recipe-actions {
        margin-top: auto;
    }
    
    .recipe-actions .btn {
        font-size: 0.875rem;
        padding: 0.5rem 0.75rem;
        border-radius: var(--radius-md);
        transition: all var(--transition-normal);
    }
    
    .recipe-actions .btn:hover {
        transform: translateY(-1px);
    }
    
    /* Empty State */
    .empty-my-recipes {
        min-height: 400px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    
    .empty-icon {
        width: 120px;
        height: 120px;
        background: var(--bg-secondary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid var(--border-primary);
    }
    
    .empty-icon i {
        font-size: 3rem;
        color: var(--text-muted);
    }
    
    .empty-title {
        color: var(--text-primary);
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .empty-description {
        color: var(--text-secondary);
        margin-bottom: 2rem;
    }
    
    /* Delete Modal */
    .modal-content {
        border-radius: var(--radius-2xl);
        border: none;
        box-shadow: var(--shadow-2xl);
    }
    
    .modal-header {
        border-bottom: 1px solid var(--border-primary);
        background: var(--bg-primary);
    }
    
    .modal-body {
        background: var(--bg-primary);
    }
    
    .modal-footer {
        border-top: 1px solid var(--border-primary);
        background: var(--bg-primary);
    }
    
    .warning-icon {
        width: 80px;
        height: 80px;
        background: rgba(245, 158, 11, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }
    
    .warning-icon i {
        font-size: 2rem;
        color: #f59e0b;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .my-recipes-header {
            text-align: center;
        }
        
        .header-stats {
            justify-content: center;
            gap: 1rem;
        }
        
        .recipe-image {
            height: 160px;
        }
        
        .recipe-content {
            padding: 1.25rem;
        }
        
        .recipe-stats {
            flex-direction: column;
            gap: 0.5rem;
            align-items: flex-start;
        }
        
        .recipe-actions {
            flex-direction: column;
        }
    }
    
    @media (max-width: 576px) {
        .recipe-image {
            height: 140px;
        }
        
        .recipe-content {
            padding: 1rem;
        }
    }
    </style>
    