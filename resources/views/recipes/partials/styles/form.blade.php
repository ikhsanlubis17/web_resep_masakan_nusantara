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
    
    /* Breadcrumb */
    .custom-breadcrumb {
        background: transparent;
        padding: 0;
        margin: 0;
    }
    
    .custom-breadcrumb .breadcrumb-item a {
        color: var(--medium-green);
        text-decoration: none;
        font-weight: 500;
        transition: color var(--transition-normal);
    }
    
    .custom-breadcrumb .breadcrumb-item a:hover {
        color: var(--dark-green);
    }
    
    .custom-breadcrumb .breadcrumb-item.active {
        color: var(--gray-600);
    }
    
    /* Form Cards */
    .form-card {
        background: var(--bg-primary);
        border-radius: var(--radius-2xl);
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-primary);
        overflow: hidden;
        transition: all var(--transition-normal);
    }
    
    .form-card:hover {
        box-shadow: var(--shadow-lg);
    }
    
    .form-card-header {
        background: var(--primary-gradient);
        color: white;
        padding: 1.5rem;
    }
    
    .form-card-title {
        margin: 0;
        font-weight: 600;
        display: flex;
        align-items: center;
        font-size: 1.125rem;
    }
    
    .form-card-body {
        padding: 2rem;
    }
    
    /* Form Controls */
    .form-control, .form-select {
        border: 1px solid var(--border-primary);
        border-radius: var(--radius-lg);
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
        transition: all var(--transition-normal);
        background: var(--bg-primary);
        color: var(--text-primary);
    }
    
    .form-control:focus, .form-select:focus {
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
    
    .form-text {
        color: var(--text-muted);
        font-size: 0.75rem;
        margin-top: 0.5rem;
    }
    
    /* Time Display */
    .time-display {
        background: rgba(115, 144, 114, 0.1);
        border: 1px solid var(--light-green);
        border-radius: var(--radius-lg);
        color: var(--dark-green);
    }
    
    [data-theme="dark"] .time-display {
        background: rgba(115, 144, 114, 0.2);
        color: var(--light-green);
    }
    
    /* Image Upload */
    .image-upload-wrapper {
        position: relative;
        border: 2px dashed var(--border-primary);
        border-radius: var(--radius-lg);
        padding: 2rem;
        text-align: center;
        transition: all var(--transition-normal);
        background: var(--bg-secondary);
    }
    
    .image-upload-wrapper:hover {
        border-color: var(--light-green);
        background: var(--green-50);
    }
    
    [data-theme="dark"] .image-upload-wrapper:hover {
        background: var(--bg-tertiary);
    }
    
    .upload-hint {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        color: var(--text-muted);
        pointer-events: none;
    }
    
    .upload-hint i {
        font-size: 2rem;
        color: var(--medium-green);
    }
    
    /* Current Image */
    .current-image-wrapper {
        position: relative;
        border-radius: var(--radius-lg);
        overflow: hidden;
    }
    
    .current-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform var(--transition-normal);
    }
    
    .current-image-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity var(--transition-normal);
    }
    
    .current-image-wrapper:hover .current-image-overlay {
        opacity: 1;
    }
    
    .current-image-wrapper:hover .current-image {
        transform: scale(1.05);
    }
    
    .overlay-text {
        color: white;
        text-align: center;
        font-size: 0.875rem;
        margin: 0;
        padding: 1rem;
    }
    
    /* Image Preview */
    .preview-container {
        position: relative;
        display: inline-block;
        width: 100%;
        border-radius: var(--radius-lg);
        overflow: hidden;
    }
    
    .preview-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: var(--radius-lg);
    }
    
    .preview-remove-btn {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: rgba(220, 53, 69, 0.9);
        color: white;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        cursor: pointer;
        transition: all var(--transition-normal);
    }
    
    .preview-remove-btn:hover {
        background: #dc3545;
        transform: scale(1.1);
    }
    
    /* Action Buttons */
    .action-buttons .btn {
        font-weight: 500;
        padding: 0.875rem 1.5rem;
        border-radius: var(--radius-lg);
        transition: all var(--transition-normal);
    }
    
    .submit-btn {
        background: var(--primary-gradient);
        border: none;
        color: white;
        box-shadow: var(--shadow-md);
    }
    
    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        background: var(--secondary-gradient);
    }
    
    /* Info Box */
    .info-box {
        background: var(--green-50);
        border: 1px solid var(--green-200);
        border-radius: var(--radius-lg);
        padding: 1rem;
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        font-size: 0.875rem;
        color: var(--dark-green);
    }
    
    [data-theme="dark"] .info-box {
        background: rgba(115, 144, 114, 0.1);
        border-color: var(--border-primary);
        color: var(--light-green);
    }
    
    .info-box i {
        color: var(--medium-green);
        font-size: 1.125rem;
        margin-top: 0.125rem;
    }
    
    /* Character Counter */
    #titleCounter {
        font-size: 0.75rem;
        transition: color var(--transition-normal);
    }
    
    #titleCounter.text-warning {
        color: #f59e0b !important;
    }
    
    /* Auto-resize Textareas */
    textarea {
        resize: vertical;
        min-height: 120px;
    }
    
    /* Validation States */
    .is-invalid {
        border-color: #dc3545;
    }
    
    .invalid-feedback {
        color: #dc3545;
        font-size: 0.75rem;
        margin-top: 0.25rem;
    }
    
    .was-validated .form-control:valid,
    .was-validated .form-select:valid {
        border-color: var(--light-green);
    }
    
    /* Loading States */
    .form-card.loading {
        opacity: 0.7;
        pointer-events: none;
    }
    
    .submit-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .page-header {
            padding: 2rem;
            text-align: center;
        }
        
        .form-card-body {
            padding: 1.5rem;
        }
        
        .image-upload-wrapper {
            padding: 1.5rem;
        }
        
        .upload-hint i {
            font-size: 1.5rem;
        }
        
        .action-buttons .btn {
            padding: 0.75rem 1.25rem;
        }
    }
    
    @media (max-width: 576px) {
        .page-header {
            padding: 1.5rem;
        }
        
        .form-card-body {
            padding: 1.25rem;
        }
        
        .form-card-header {
            padding: 1.25rem;
        }
        
        .image-upload-wrapper {
            padding: 1.25rem;
        }
    }
    </style>
    