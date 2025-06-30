<section class="hero-section">
    <div class="hero-background"></div>
    <div class="hero-overlay"></div>
    
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8">
                <div class="hero-content animate-fade-in-up text-white">
                    <!-- Badge -->
                    <div class="hero-badge d-inline-flex align-items-center mb-4">
                        <i class="bi bi-trending-up me-2"></i>
                        <span class="fw-medium">Platform Resep #1 di Indonesia</span>
                    </div>
                    
                    <!-- Main Title -->
                    <h1 class="hero-title display-3 fw-bold mb-4">
                        Jelajahi Cita Rasa
                        <span class="d-block hero-title-gradient">Nusantara</span>
                    </h1>
                    
                    <!-- Description and Search -->
                    <div class="hero-description-wrapper mb-4">
                        <p class="hero-description lead mb-4">
                            Temukan ribuan resep masakan tradisional Indonesia dari berbagai daerah. 
                            Dari Sabang sampai Merauke, cita rasa autentik ada di ujung jari Anda.
                        </p>
                        
                        <form class="hero-search-form" action="{{ route('search') }}" method="GET">
                            <div class="search-input-wrapper">
                                <i class="bi bi-search search-icon"></i>
                                <input type="text" 
                                       name="q" 
                                       placeholder="Cari resep favorit Anda..."
                                       value="{{ request('q') }}"
                                       class="search-input">
                                <button type="submit" class="search-btn">
                                    <span class="d-none d-sm-inline">Cari Resep</span>
                                    <span class="d-sm-none">Cari</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Statistics -->
                    <div class="hero-stats row g-4 mt-3">
                        <div class="col-4">
                            <div class="stat-item text-center">
                                <div class="stat-number h2 fw-bold mb-1">{{ number_format($totalRecipes) }}+</div>
                                <small class="stat-label">Resep</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item text-center">
                                <div class="stat-number h2 fw-bold mb-1">{{ number_format($totalUsers) }}+</div>
                                <small class="stat-label">Pengguna</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item text-center">
                                <div class="stat-number h2 fw-bold mb-1 d-flex align-items-center justify-content-center">
                                    {{ number_format($averageRating, 1) }}
                                    <i class="bi bi-star-fill text-warning ms-1 stat-star"></i>
                                </div>
                                <small class="stat-label">Rating</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
