<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Nusantara Flavours') }} - @yield('title', 'Resep Masakan Tradisional Indonesia')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    @include('layouts.partials.styles.variables')
    @include('layouts.partials.styles.base')
    @include('layouts.partials.styles.components')
    @include('layouts.partials.styles.utilities')
    @include('layouts.partials.styles.responsive')
    @include('layouts.partials.styles.dark-mode')
    
    @yield('styles')
</head>

<body>
    <div id="app">
        @include('layouts.partials.navbar')
        
        <main style="padding-top: 90px;">
            @include('layouts.partials.alerts')
            @yield('content')
        </main>
        
        @include('layouts.partials.footer')
        @include('layouts.partials.back-to-top')
        @include('layouts.partials.toast-container')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    @include('layouts.partials.scripts.main')
    @stack('scripts')
</body>
</html>
