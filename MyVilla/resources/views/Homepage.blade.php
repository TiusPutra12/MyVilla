<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ReforceCode — Vila pesisir mewah dan eksklusif di destinasi paling menakjubkan di dunia. Temukan surga pribadi Anda.">
    <title>ReforceCode — Vila Pesisir Mewah</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footers.css') }}">
    <link rel="stylesheet" href="{{ asset('css/HomePage.css') }}">
</head>
<body>
    <div class="page-bg"></div>
    <div class="page-blur-overlay"></div>

    <!-- ===== NAVBAR ===== -->
    @include('header.header')

    <!-- ===== HERO ===== -->
    <section class="hero" id="hero">
        <div class="hero-overlay"></div>

        <div class="hero-content">

            <h1>Surga Pribadi di Tepi Pantai</h1>
            <p>Koleksi vila mewah eksklusif di Seminyak, Bali. Rasakan ketenangan yang sesungguhnya.</p>
            <div class="hero-actions">
                <a href="#villas" class="btn-hero-primary">
                    Jelajahi Vila <i class="fa-solid fa-arrow-right fa-xs"></i>
                </a>
                <a href="#gallery" class="btn-hero-ghost">
                    <i class="fa-regular fa-images fa-xs"></i> Lihat Galeri
                </a>
            </div>
        </div>

        <div class="scroll-indicator">
            <div class="scroll-line"></div>
            <span>Gulir</span>
        </div>
    </section>

    <!-- ===== SEARCH ===== -->
    <div class="search-wrapper">
        <div class="search-bar">

            <div class="search-row dates-row">
                <div class="search-field checkin-field">
                    <i class="fa-regular fa-calendar-days search-icon"></i>
                    <div class="field-content">
                        <label><i class="fa-regular fa-calendar desktop-only"></i> <span class="desktop-only">&nbsp;</span>Check in</label>
                        <input type="text" placeholder="Pilih tanggal">
                    </div>
                </div>
                <div class="field-divider"></div>
                <div class="search-field checkout-field">
                    <i class="fa-regular fa-calendar-days search-icon"></i>
                    <div class="field-content">
                        <label><i class="fa-regular fa-moon desktop-only"></i> <span class="desktop-only">&nbsp;</span>Check out</label>
                        <input type="text" placeholder="Pilih tanggal">
                    </div>
                </div>
            </div>

            <div class="search-row tamu-row">
                <div class="search-field tamu-field">
                    <i class="fa-regular fa-user search-icon"></i>
                    <div class="field-content">
                        <label>Tamu</label>
                        <input type="text" placeholder="1 Kamar, 2 Dewasa, 0 Anak">
                    </div>
                </div>
            </div>

            <button class="search-btn">
                <i class="fa-solid fa-magnifying-glass desktop-only"></i>
                <span class="mobile-only btn-text">CARI</span>
            </button>
        </div>
    </div>

    <!-- ===== VILLAS ===== -->
    <section class="villas-section" id="villas">
        <div class="section-hdr" data-aos="fade-up">
            <div>
                <span class="section-tag">Koleksi Eksklusif</span>
                <h2 class="section-title">Vila Pilihan Kami</h2>
            </div>
            <a href="#" class="view-all-link">Lihat Semua <i class="fa-solid fa-arrow-right fa-xs"></i></a>
        </div>

        <div class="villa-scroll-container" data-aos="fade-up" data-aos-delay="100">
            <!-- Villa 1 -->
            <div class="villa-card-new">
                <div class="v-img-new">
                    <div class="img-slider">
                        <img src="https://images.unsplash.com/photo-1499793983690-e29da59ef1c2?q=80&w=2070&auto=format&fit=crop" alt="Villa 1" loading="lazy">
                        <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=2070&auto=format&fit=crop" alt="Villa 1 Room" loading="lazy">
                        <img src="https://images.unsplash.com/photo-1540518614846-7eded433c457?q=80&w=2057&auto=format&fit=crop" alt="Villa 1 Bed" loading="lazy">
                    </div>
                    <div class="v-badge-top-left"><span class="badge-blue">FEATURED</span></div>
                    <div class="v-badge-top-right"><span class="badge-dark">FOR SALE</span><span class="badge-dark">LEASEHOLD</span></div>
                    <div class="v-price-overlay">$399,000</div>
                </div>
                <div class="v-body-new">
                    <h3 class="v-title-new">Boho Japandi 2BR Leasehold Villa with Dual Pools & Rooftop in Munggu</h3>
                    <div class="v-loc-new"><i class="fa-solid fa-location-dot"></i> Munggu, Mengwi, Badung, Bali</div>
                    <div class="v-specs-new">
                        <span><i class="fa-solid fa-bed"></i> 2</span>
                        <span><i class="fa-solid fa-shower"></i> 2</span>
                        <span><i class="fa-solid fa-ruler-combined"></i> 125 Lot Sqm</span>
                    </div>
                    <div class="v-type-new">Villa</div>
                </div>
            </div>

            <!-- Villa 2 -->
            <div class="villa-card-new">
                <div class="v-img-new">
                    <div class="img-slider">
                        <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?q=80&w=2071&auto=format&fit=crop" alt="Villa 2" loading="lazy">
                        <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=2070&auto=format&fit=crop" alt="Villa 2 Room" loading="lazy">
                        <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=2070&auto=format&fit=crop" alt="Villa 2 Bath" loading="lazy">
                    </div>
                    <div class="v-badge-top-left"><span class="badge-blue">FEATURED</span></div>
                    <div class="v-badge-top-right"><span class="badge-dark">FOR SALE</span><span class="badge-dark">LEASEHOLD</span></div>
                    <div class="v-price-overlay">$350,000</div>
                </div>
                <div class="v-body-new">
                    <h3 class="v-title-new">Boho Japandi 2BR Leasehold Villa with Rice Field Views in Munggu</h3>
                    <div class="v-loc-new"><i class="fa-solid fa-location-dot"></i> Munggu, Mengwi, Badung, Bali</div>
                    <div class="v-specs-new">
                        <span><i class="fa-solid fa-bed"></i> 2</span>
                        <span><i class="fa-solid fa-shower"></i> 2</span>
                        <span><i class="fa-solid fa-ruler-combined"></i> 225 Lot Sqm</span>
                    </div>
                    <div class="v-type-new">Villa</div>
                </div>
            </div>

            <!-- Villa 3 -->
            <div class="villa-card-new">
                <div class="v-img-new">
                    <div class="img-slider">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=2070&auto=format&fit=crop" alt="Villa 3" loading="lazy">
                        <img src="https://images.unsplash.com/photo-1600607686527-6fb886090705?q=80&w=2070&auto=format&fit=crop" alt="Villa 3 Room" loading="lazy">
                        <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?q=80&w=2070&auto=format&fit=crop" alt="Villa 3 Bed" loading="lazy">
                    </div>
                    <div class="v-badge-top-left"><span class="badge-blue">FEATURED</span></div>
                    <div class="v-badge-top-right"><span class="badge-dark">FOR SALE</span><span class="badge-dark">LEASEHOLD</span></div>
                    <div class="v-price-overlay">$350,000</div>
                </div>
                <div class="v-body-new">
                    <h3 class="v-title-new">Boho Japandi 2BR Leasehold Villa with Sunken Poolside Bar in Munggu</h3>
                    <div class="v-loc-new"><i class="fa-solid fa-location-dot"></i> Munggu, Mengwi, Badung, Bali</div>
                    <div class="v-specs-new">
                        <span><i class="fa-solid fa-bed"></i> 2</span>
                        <span><i class="fa-solid fa-shower"></i> 2</span>
                        <span><i class="fa-solid fa-ruler-combined"></i> 180 Lot Sqm</span>
                    </div>
                    <div class="v-type-new">Villa</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== AMENITIES ===== -->
    <section class="amenities-section" id="amenities">
        <div data-aos="fade-up">
            <span class="section-tag">Fasilitas</span>
            <h2 class="section-title">Fasilitas Utama</h2>
            <p class="section-sub" style="color:rgba(255,255,255,0.55);">Setiap vila hadir dengan fasilitas premium yang dirancang untuk kenyamanan total.</p>
        </div>
        <div class="amenities-strip" data-aos="fade-up" data-aos-delay="100">
            <div class="amenity-item">
                <i class="fa-solid fa-water-ladder"></i>
                <p>Private Pool</p>
            </div>
            <div class="amenity-item">
                <i class="fa-solid fa-wifi"></i>
                <p>High-Speed Wi-Fi</p>
            </div>
            <div class="amenity-item">
                <i class="fa-solid fa-kitchen-set"></i>
                <p>Dapur Lengkap</p>
            </div>
            <div class="amenity-item">
                <i class="fa-solid fa-tv"></i>
                <p>Smart TV</p>
            </div>
            <div class="amenity-item">
                <i class="fa-solid fa-car"></i>
                <p>Parkir Pribadi</p>
            </div>
            <div class="amenity-item">
                <i class="fa-solid fa-shield-halved"></i>
                <p>Keamanan 24 Jam</p>
            </div>
        </div>
    </section>



    <!-- ===== LOCATION ===== -->
    <section class="location-section" id="location">
        <div data-aos="fade-up">
            <span class="section-tag">Lokasi</span>
            <h2 class="section-title">Detail Lokasi & Aksesibilitas</h2>
            <p class="section-sub">Posisi strategis di jantung Seminyak, dekat dengan segala fasilitas.</p>
        </div>
        <div class="location-grid">
            <div class="map-frame" data-aos="fade-right">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126214.39865181717!2d115.1118318625219!3d-8.672621741517448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2409b0e5e80db%3A0xe27334e8ccb9374a!2sSeminyak%2C%20Kuta%2C%20Badung%20Regency%2C%20Bali!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div data-aos="fade-left">
                <div class="poi-scroll-container">
                    <div class="poi-item">
                        <div class="poi-icon"><i class="fa-solid fa-umbrella-beach"></i></div>
                        <div class="poi-info"><h4>Pantai Seminyak</h4><p>10 menit berjalan kaki</p></div>
                    </div>
                    <div class="poi-item">
                        <div class="poi-icon"><i class="fa-solid fa-store"></i></div>
                        <div class="poi-info"><h4>Supermarket & Minimarket</h4><p>5 menit berkendara</p></div>
                    </div>
                    <div class="poi-item">
                        <div class="poi-icon"><i class="fa-solid fa-plane-departure"></i></div>
                        <div class="poi-info"><h4>Bandara Ngurah Rai</h4><p>30 menit berkendara</p></div>
                    </div>
                    <div class="poi-item">
                        <div class="poi-icon"><i class="fa-solid fa-utensils"></i></div>
                        <div class="poi-info"><h4>Pusat Kuliner & Restoran</h4><p>3 menit berjalan kaki</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- ===== CTA ===== -->
    <section class="cta-section" data-aos="fade-up">
        <h2>Siap Menemukan Surga Anda?</h2>
        <p>Daftar sekarang dan nikmati pengalaman liburan pesisir mewah yang tak terlupakan.</p>
        <div class="cta-btns">
            <a href="#" class="btn-cta-primary">Daftar Sekarang <i class="fa-solid fa-arrow-right fa-xs"></i></a>
            <a href="#" class="btn-cta-ghost"><i class="fa-regular fa-message fa-xs"></i> Hubungi Agen</a>
        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    @include('footers.footers')

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/header.js') }}"></script>
    <script src="{{ asset('js/HomePage.js') }}"></script>
</body>
</html>
