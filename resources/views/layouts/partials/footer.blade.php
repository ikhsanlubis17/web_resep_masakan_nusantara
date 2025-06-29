<footer class="footer">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-4">
                    <div class="brand-icon me-3">
                        <i class="bi bi-cup-hot-fill"></i>
                    </div>
                    <div>
                        <h5 class="text-gradient mb-1 font-display">Nusantara Flavours</h5>
                        <small class="footer-subtitle">Cita Rasa Nusantara</small>
                    </div>
                </div>
                <p class="footer-description mb-4 lh-lg">
                    Platform berbagi resep masakan tradisional Indonesia. Mari lestarikan cita rasa Nusantara untuk generasi mendatang dengan teknologi modern yang memudahkan berbagi pengetahuan kuliner.
                </p>
                <div class="d-flex gap-3">
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle social-link">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle social-link">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle social-link">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle social-link">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-heading mb-4 fw-bold">Menu Utama</h6>
                <ul class="list-unstyled footer-links">
                    <li class="mb-3">
                        <a href="{{ route('home') }}" class="footer-link">
                            <i class="bi bi-chevron-right me-2 small"></i>Beranda
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('categories.index') }}" class="footer-link">
                            <i class="bi bi-chevron-right me-2 small"></i>Kategori
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('search') }}" class="footer-link">
                            <i class="bi bi-chevron-right me-2 small"></i>Pencarian
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#" class="footer-link">
                            <i class="bi bi-chevron-right me-2 small"></i>Resep Populer
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-heading mb-4 fw-bold">Kategori</h6>
                <ul class="list-unstyled footer-links">
                    <li class="mb-3">
                        <a href="#" class="footer-link">
                            <i class="bi bi-chevron-right me-2 small"></i>Jawa Barat
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#" class="footer-link">
                            <i class="bi bi-chevron-right me-2 small"></i>Sumatera Barat
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#" class="footer-link">
                            <i class="bi bi-chevron-right me-2 small"></i>DI Yogyakarta
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#" class="footer-link">
                            <i class="bi bi-chevron-right me-2 small"></i>Bali
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <h6 class="footer-heading mb-4 fw-bold">Hubungi Kami</h6>
                <div class="mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="contact-icon me-3">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <span class="contact-text">info@nusantaraflavours.com</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="contact-icon me-3">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <span class="contact-text">+62 123 456 789</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="contact-icon me-3">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <span class="contact-text">Jakarta, Indonesia</span>
                    </div>
                </div>
                
                <div class="newsletter-signup">
                    <h6 class="footer-heading mb-3 fw-bold">Newsletter</h6>
                    <p class="small footer-description mb-3">Dapatkan resep terbaru langsung di inbox Anda</p>
                    <div class="input-group">
                        <input type="email" class="form-control newsletter-input" placeholder="Email Anda">
                        <button class="btn newsletter-btn" type="button">
                            <i class="bi bi-send-fill"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <hr class="footer-divider my-5">
        
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-center text-md-start footer-copyright mb-0">
                    &copy; {{ date('Y') }} Nusantara Flavours. Semua hak cipta dilindungi.
                </p>
            </div>
            <div class="col-md-6">
                <div class="text-center text-md-end">
                    <a href="#" class="footer-legal-link me-4 small">Kebijakan Privasi</a>
                    <a href="#" class="footer-legal-link me-4 small">Syarat & Ketentuan</a>
                    <a href="#" class="footer-legal-link small">FAQ</a>
                </div>
            </div>
        </div>
    </div>
</footer>
