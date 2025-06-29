<style>
    /* Dark Mode Specific Styles */
    [data-theme="dark"] {
        color-scheme: dark;
    }
    
    [data-theme="dark"] body {
        background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 50%, #1a2a1a 100%);
    }
    
    [data-theme="dark"] .navbar-toggler i {
        color: var(--text-primary);
    }
    
    [data-theme="dark"] .btn-outline-light {
        border-color: var(--border-primary);
        color: var(--text-primary);
    }
    
    [data-theme="dark"] .btn-outline-light:hover {
        background: var(--bg-secondary);
        color: var(--text-primary);
    }
    
    [data-theme="dark"] .text-muted {
        color: var(--text-muted) !important;
    }
    
    [data-theme="dark"] .border-bottom {
        border-color: var(--border-primary) !important;
    }
    
    [data-theme="dark"] .btn-close {
        filter: invert(1);
    }
    
    [data-theme="dark"] .btn-close-white {
        filter: none;
    }
    
    /* Dark mode form controls */
    [data-theme="dark"] .form-control::placeholder {
        color: var(--text-muted);
    }
    
    [data-theme="dark"] .form-select {
        background-color: var(--bg-primary);
        border-color: var(--border-primary);
        color: var(--text-primary);
    }
    
    [data-theme="dark"] .form-check-input {
        background-color: var(--bg-secondary);
        border-color: var(--border-primary);
    }
    
    [data-theme="dark"] .form-check-input:checked {
        background-color: var(--light-green);
        border-color: var(--light-green);
    }
    
    /* Dark mode table styles */
    [data-theme="dark"] .table {
        color: var(--text-primary);
    }
    
    [data-theme="dark"] .table-striped > tbody > tr:nth-of-type(odd) > td {
        background-color: var(--bg-secondary);
    }
    
    [data-theme="dark"] .table-hover > tbody > tr:hover > td {
        background-color: var(--bg-secondary);
    }
    
    /* Dark mode modal styles */
    [data-theme="dark"] .modal-content {
        background-color: var(--bg-primary);
        border-color: var(--border-primary);
    }
    
    [data-theme="dark"] .modal-header {
        border-bottom-color: var(--border-primary);
    }
    
    [data-theme="dark"] .modal-footer {
        border-top-color: var(--border-primary);
    }
    
    /* Dark mode pagination */
    [data-theme="dark"] .page-link {
        background-color: var(--bg-primary);
        border-color: var(--border-primary);
        color: var(--text-primary);
    }
    
    [data-theme="dark"] .page-link:hover {
        background-color: var(--bg-secondary);
        border-color: var(--border-secondary);
        color: var(--text-primary);
    }
    
    [data-theme="dark"] .page-item.active .page-link {
        background-color: var(--light-green);
        border-color: var(--light-green);
    }
    
    /* Dark mode breadcrumb */
    [data-theme="dark"] .breadcrumb-item + .breadcrumb-item::before {
        color: var(--text-muted);
    }
    
    /* Dark mode list group */
    [data-theme="dark"] .list-group-item {
        background-color: var(--bg-primary);
        border-color: var(--border-primary);
        color: var(--text-primary);
    }
    
    [data-theme="dark"] .list-group-item:hover {
        background-color: var(--bg-secondary);
    }
    
    /* Dark mode accordion */
    [data-theme="dark"] .accordion-item {
        background-color: var(--bg-primary);
        border-color: var(--border-primary);
    }
    
    [data-theme="dark"] .accordion-button {
        background-color: var(--bg-primary);
        color: var(--text-primary);
    }
    
    [data-theme="dark"] .accordion-button:not(.collapsed) {
        background-color: var(--bg-secondary);
        color: var(--text-primary);
    }
    </style>
    