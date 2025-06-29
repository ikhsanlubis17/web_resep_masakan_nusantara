<style>
    :root {
        /* Light Theme Colors */
        --cream: #ECE3CE;
        --light-green: #739072;
        --medium-green: #4F6F52;
        --dark-green: #3A4D39;
        
        /* Gradients */
        --primary-gradient: linear-gradient(135deg, var(--light-green) 0%, var(--medium-green) 100%);
        --secondary-gradient: linear-gradient(135deg, var(--medium-green) 0%, var(--dark-green) 100%);
        --accent-gradient: linear-gradient(135deg, var(--light-green) 0%, var(--dark-green) 100%);
        --cream-gradient: linear-gradient(135deg, #ffffff 0%, var(--cream) 100%);
        
        /* Color Variations */
        --cream-light: #f5f1e8;
        --cream-dark: #e0d5b7;
        --green-50: #f0f4f0;
        --green-100: #e1ebe1;
        --green-200: #c3d7c3;
        --green-300: #a5c3a5;
        --green-400: #87af87;
        --green-500: var(--light-green);
        --green-600: var(--medium-green);
        --green-700: var(--dark-green);
        --green-800: #2d3a2d;
        --green-900: #1f271f;
        
        /* Neutral Colors */
        --white: #ffffff;
        --gray-50: #fafafa;
        --gray-100: #f5f5f5;
        --gray-200: #e5e5e5;
        --gray-300: #d4d4d4;
        --gray-400: #a3a3a3;
        --gray-500: #737373;
        --gray-600: #525252;
        --gray-700: #404040;
        --gray-800: #262626;
        --gray-900: #171717;
        
        /* Background Colors */
        --bg-primary: #ffffff;
        --bg-secondary: var(--gray-50);
        --bg-tertiary: var(--cream-light);
        
        /* Text Colors */
        --text-primary: var(--dark-green);
        --text-secondary: var(--gray-600);
        --text-muted: var(--gray-500);
        
        /* Border Colors */
        --border-primary: var(--green-200);
        --border-secondary: var(--gray-200);
        
        /* Modern Shadows */
        --shadow-sm: 0 1px 2px 0 rgba(58, 77, 57, 0.05);
        --shadow-md: 0 4px 6px -1px rgba(58, 77, 57, 0.1), 0 2px 4px -1px rgba(58, 77, 57, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(58, 77, 57, 0.1), 0 4px 6px -2px rgba(58, 77, 57, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(58, 77, 57, 0.1), 0 10px 10px -5px rgba(58, 77, 57, 0.04);
        --shadow-2xl: 0 25px 50px -12px rgba(58, 77, 57, 0.25);
        
        /* Border Radius */
        --radius-sm: 0.375rem;
        --radius-md: 0.5rem;
        --radius-lg: 0.75rem;
        --radius-xl: 1rem;
        --radius-2xl: 1.5rem;
        --radius-3xl: 2rem;
        
        /* Transitions */
        --transition-fast: 0.15s ease;
        --transition-normal: 0.3s ease;
        --transition-slow: 0.5s ease;
        
        /* Subtle Pattern */
        --subtle-pattern: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23739072' fill-opacity='0.03'%3E%3Cpath d='M20 20c0 11.046-8.954 20-20 20v20h40V20H20z'/%3E%3C/g%3E%3C/svg%3E");
    }
    
    /* Dark Theme Colors */
    [data-theme="dark"] {
        /* Dark Theme Overrides */
        --cream: #2a2a2a;
        --light-green: #8fbc8f;
        --medium-green: #6b8e6b;
        --dark-green: #4a5d4a;
        
        /* Background Colors */
        --bg-primary: #1a1a1a;
        --bg-secondary: #2a2a2a;
        --bg-tertiary: #333333;
        
        /* Text Colors */
        --text-primary: #e5e5e5;
        --text-secondary: #b3b3b3;
        --text-muted: #888888;
        
        /* Border Colors */
        --border-primary: #404040;
        --border-secondary: #333333;
        
        /* Neutral Colors - Dark Theme */
        --white: #1a1a1a;
        --gray-50: #2a2a2a;
        --gray-100: #333333;
        --gray-200: #404040;
        --gray-300: #525252;
        --gray-400: #666666;
        --gray-500: #888888;
        --gray-600: #b3b3b3;
        --gray-700: #cccccc;
        --gray-800: #e5e5e5;
        --gray-900: #ffffff;
        
        /* Color Variations - Dark Theme */
        --cream-light: #2a2a2a;
        --cream-dark: #1a1a1a;
        --green-50: #1a2a1a;
        --green-100: #2a3a2a;
        --green-200: #3a4a3a;
        --green-300: #4a5a4a;
        --green-400: #5a6a5a;
        
        /* Gradients - Dark Theme */
        --cream-gradient: linear-gradient(135deg, #2a2a2a 0%, #1a1a1a 100%);
        
        /* Shadows - Dark Theme */
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.3);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.4), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.4), 0 4px 6px -2px rgba(0, 0, 0, 0.3);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.4), 0 10px 10px -5px rgba(0, 0, 0, 0.3);
        --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
        
        /* Subtle Pattern - Dark Theme */
        --subtle-pattern: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.02'%3E%3Cpath d='M20 20c0 11.046-8.954 20-20 20v20h40V20H20z'/%3E%3C/g%3E%3C/svg%3E");
    }
    </style>
    