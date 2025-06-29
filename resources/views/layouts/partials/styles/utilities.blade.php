<style>
    /* Utility Classes */
    .text-gradient {
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .bg-gradient-primary {
        background: var(--primary-gradient);
    }
    
    .bg-light-green {
        background-color: var(--green-50);
    }
    
    .text-green {
        color: var(--medium-green);
    }
    
    .border-green {
        border-color: var(--border-primary);
    }
    
    .glass-effect {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid var(--border-primary);
    }
    
    [data-theme="dark"] .glass-effect {
        background: rgba(26, 26, 26, 0.8);
    }
    
    .hover-lift {
        transition: transform var(--transition-normal), box-shadow var(--transition-normal);
    }
    
    .hover-lift:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-xl);
    }
    
    .text-balance {
        text-wrap: balance;
    }
    
    .container-fluid {
        max-width: 1400px;
    }
    
    /* Loading States */
    .loading {
        position: relative;
        overflow: hidden;
    }
    
    .loading::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(115, 144, 114, 0.3), transparent);
        animation: loading 2s infinite;
    }
    
    @keyframes loading {
        0% {
            left: -100%;
        }
        100% {
            left: 100%;
        }
    }
    
    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes pulse-glow {
        0%, 100% {
            transform: scale(1);
            opacity: 0.9;
        }
        50% {
            transform: scale(1.1);
            opacity: 1;
        }
    }
    
    @keyframes heartbeat {
        0%, 100% {
            transform: scale(1);
        }
        25% {
            transform: scale(1.1);
        }
        50% {
            transform: scale(1);
        }
        75% {
            transform: scale(1.05);
        }
    }
    
    @keyframes bounce-gentle {
        0%, 20%, 53%, 80%, 100% {
            transform: translate3d(0,0,0);
        }
        40%, 43% {
            transform: translate3d(0, -15px, 0);
        }
        70% {
            transform: translate3d(0, -8px, 0);
        }
        90% {
            transform: translate3d(0, -3px, 0);
        }
    }
    
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .animate-slide-in-right {
        animation: slideInRight 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .animate-bounce-gentle {
        animation: bounce-gentle 2s infinite;
    }
    
    .spin {
        animation: spin 1s linear infinite;
    }
    
    .scale-110 {
        transform: scale(1.1);
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .lazy {
        opacity: 0.6;
        transition: opacity 0.4s;
    }
    
    .lazy.loaded {
        opacity: 1;
    }
    
    /* Toast Notifications */
    .toast {
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-xl);
        border: none;
        backdrop-filter: blur(15px);
    }
    
    .toast-header {
        background: transparent;
        border-bottom: 1px solid var(--border-primary);
    }
    
    .toast-body {
        font-weight: 500;
    }
    </style>
    