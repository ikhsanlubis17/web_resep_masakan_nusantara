<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="animate-fade-in-up">
                    {{ $title ?? 'Jelajahi Cita Rasa Nusantara' }}
                </h1>
                <p class="animate-fade-in-up" style="animation-delay: 0.2s;">
                    {{ $subtitle ?? 'Temukan ribuan resep masakan tradisional Indonesia dari berbagai daerah. Dari Sabang sampai Merauke, cita rasa autentik ada di ujung jari Anda.' }}
                </p>
                
                @if($showSearch ?? true)
                    <form class="search-form animate-fade-in-up" style="animation-delay: 0.4s;" action="{{ route('search') }}" method="GET">
                        <input type="search" 
                               name="q" 
                               placeholder="Cari resep favorit Anda..." 
                               value="{{ request('q') }}"
                               class="form-control">
                        <button type="submit" class="btn">
                            <i class="bi bi-search me-2"></i>
                            Cari Resep
                        </button>
                    </form>
                @endif
            </div>
            
            @if($showImage ?? true)
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="text-center animate-slide-in-right">
                        <img src="/placeholder.svg?height=400&width=500" 
                             alt="Indonesian Food" 
                             class="img-fluid rounded-3xl shadow-2xl">
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
