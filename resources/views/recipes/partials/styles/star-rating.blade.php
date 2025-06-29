<style>
    /* Star Rating Styles */
    .star-rating {
        display: flex !important;
        gap: 0.25rem !important;
        align-items: center;
        margin: 0.5rem 0;
    }
    
    .star-input {
        cursor: pointer !important;
        font-size: 1.5rem !important;
        color: #ddd !important;
        transition: all 0.2s ease !important;
        user-select: none !important;
        pointer-events: auto !important;
        display: inline-block !important;
        line-height: 1 !important;
    }
    
    .star-input:hover {
        transform: scale(1.1) !important;
        color: #ffc107 !important;
    }
    
    .star-input.active {
        color: #ffc107 !important;
    }
    
    .star-input:focus {
        outline: 2px solid #ffc107;
        outline-offset: 2px;
    }
    
    /* Ensure Bootstrap icons work properly */
    .bi-star, .bi-star-fill {
        font-family: "bootstrap-icons" !important;
    }
    
    /* Rating form specific styles */
    .review-form .star-rating {
        padding: 0.5rem 0;
        border-radius: 0.375rem;
    }
    
    .review-form .star-rating:hover {
        background-color: rgba(255, 193, 7, 0.1);
    }
    
    /* Error state */
    .star-rating.error {
        border: 1px solid #dc3545;
        padding: 0.5rem;
        border-radius: 0.375rem;
        background-color: rgba(220, 53, 69, 0.1);
    }
    
    /* Success state */
    .star-rating.selected {
        background-color: rgba(255, 193, 7, 0.1);
        padding: 0.5rem;
        border-radius: 0.375rem;
    }
    
    /* Mobile responsive */
    @media (max-width: 768px) {
        .star-input {
            font-size: 1.4rem !important;
        }
    }
    
    @media (max-width: 576px) {
        .star-input {
            font-size: 1.3rem !important;
        }
        
        .star-rating {
            gap: 0.2rem !important;
        }
    }
    </style>
    