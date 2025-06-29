<style>
    * {
        box-sizing: border-box;
    }
    
    html {
        scroll-behavior: smooth;
    }
    
    body {
        font-family: 'Inter', sans-serif;
        line-height: 1.6;
        background: linear-gradient(135deg, var(--cream-light) 0%, var(--bg-primary) 50%, var(--green-50) 100%);
        background-attachment: fixed;
        color: var(--text-primary);
        font-weight: 400;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        overflow-x: hidden;
        min-height: 100vh;
        transition: background-color var(--transition-normal), color var(--transition-normal);
    }
    
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--subtle-pattern);
        opacity: 0.4;
        z-index: -1;
        pointer-events: none;
    }
    
    .font-display {
        font-family: 'Playfair Display', serif;
    }
    
    .font-modern {
        font-family: 'Poppins', sans-serif;
    }
    
    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: var(--bg-secondary);
    }
    
    ::-webkit-scrollbar-thumb {
        background: var(--primary-gradient);
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: var(--secondary-gradient);
    }
    </style>
    