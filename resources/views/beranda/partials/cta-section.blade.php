<section class="cta-section py-5">
    <div class="cta-background"></div>
    <div class="cta-overlay"></div>
    
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="cta-content">
                    <h3 class="cta-title text-white fw-bold mb-2">
                        Siap Berbagi Resep Anda?
                    </h3>
                    <p class="cta-description text-white mb-0">
                        Bergabunglah dengan ribuan chef dan food enthusiast lainnya dalam melestarikan cita rasa Nusantara
                    </p>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <div class="cta-actions">
                    @auth
                        <a href="{{ route('recipes.create') }}" class="btn btn-light btn-lg cta-btn">
                            <i class="bi bi-plus-circle me-2"></i>
                            Tambah Resep
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg cta-btn">
                            <i class="bi bi-person-plus me-2"></i>
                            Daftar Sekarang
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</section>
