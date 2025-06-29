@include('recipes.partials.styles.star-rating')
<style>
/* Star Rating Styles */
.star-rating-container {
    margin: 0.5rem 0;
}

.star-rating {
    display: flex;
    gap: 0.25rem;
    align-items: center;
    margin-bottom: 0.5rem;
}

.star {
    font-size: 2rem;
    color: #ddd;
    cursor: pointer;
    transition: all 0.2s ease;
    user-select: none;
    line-height: 1;
}

.star:hover {
    color: #ffc107;
    transform: scale(1.1);
}

.star.active {
    color: #ffc107;
}

.rating-text {
    font-size: 0.9rem;
    color: #6c757d;
    margin-left: 0.5rem;
}

/* Rest of existing styles remain the same */
.recipe-section {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-bottom: 2rem;
}

.recipe-section-header {
    background: #f8f9fa;
    padding: 1rem 1.5rem;
    border-bottom: 1px solid #dee2e6;
}

.recipe-section-title {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #495057;
}

.recipe-section-body {
    padding: 1.5rem;
}

.favorite-btn {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(255,255,255,0.9);
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    transition: all 0.3s ease;
    cursor: pointer;
}

.favorite-btn:hover {
    background: white;
    transform: scale(1.1);
}

.favorite-btn.favorited .favorite-icon {
    color: #dc3545;
}

.favorite-btn.processing {
    opacity: 0.7;
    pointer-events: none;
}

.recipe-stats-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.7));
    padding: 2rem 1rem 1rem;
}

.difficulty-badge {
    background: #007bff !important;
    color: white !important;
}

.info-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    overflow: hidden;
}

.info-card-header {
    background: #f8f9fa;
    padding: 1rem;
    border-bottom: 1px solid #dee2e6;
}

.info-card-title {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
}

.info-card-body {
    padding: 1.5rem;
}

.ingredient-item {
    cursor: pointer;
    padding: 0.5rem;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.ingredient-item:hover {
    background-color: #f8f9fa;
}

.ingredient-item.checked {
    background-color: #d4edda;
    text-decoration: line-through;
    opacity: 0.7;
}

.ingredient-check {
    font-size: 1.2rem;
    transition: all 0.2s ease;
}

.step-circle {
    width: 40px;
    height: 40px;
    background: #007bff;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    font-weight: bold;
}

.sidebar-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-bottom: 1.5rem;
}

.sidebar-card-header {
    background: #f8f9fa;
    padding: 1rem;
    border-bottom: 1px solid #dee2e6;
}

.sidebar-card-title {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
}

.sidebar-card-body {
    padding: 1.5rem;
}

.author-avatar {
    width: 80px;
    height: 80px;
    object-fit: cover;
}

.related-recipe-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
}

.review-item {
    padding-bottom: 1rem;
    margin-bottom: 1rem;
}

.review-item:last-child {
    border-bottom: none !important;
    margin-bottom: 0;
    padding-bottom: 0;
}

.review-avatar {
    width: 40px;
    height: 40px;
    object-fit: cover;
}

.custom-breadcrumb {
    background: transparent;
    padding: 0;
}

.custom-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
    content: ">";
    color: #6c757d;
}

.toast-notification {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

@media (max-width: 768px) {
    .recipe-stats-overlay .col-6 {
        margin-bottom: 0.5rem;
    }
    
    .recipe-header .d-flex {
        flex-direction: column;
        align-items: start !important;
    }
    
    .recipe-header .text-end {
        text-align: start !important;
        margin-top: 1rem;
    }
    
    .star {
        font-size: 1.8rem;
    }
}

@media (max-width: 576px) {
    .star {
        font-size: 1.6rem;
    }
    
    .star-rating {
        gap: 0.2rem;
    }
}
</style>
