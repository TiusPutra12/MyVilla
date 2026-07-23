<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <div class="hero-stats">
                <div>
                    <div class="hero-stat-num">50+</div>
                    <div class="hero-stat-lbl">Vila Premium</div>
                </div>
                <div>
                    <div class="hero-stat-num">4.9</div>
                    <div class="hero-stat-lbl">Rating Tamu</div>
                </div>
                <div>
                    <div class="hero-stat-num">12K</div>
                    <div class="hero-stat-lbl">Tamu Puas</div>
                </div>
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

    <!-- ===== FASILITAS KAMAR GALLERY ===== -->
    <section class="room-gallery-section" id="rooms">
        <div class="section-hdr" data-aos="fade-up">
            <div>
                <span class="section-tag">Galeri</span>
                <h2 class="section-title">Fasilitas Ruangan</h2>
            </div>
        </div>

        <div class="room-gallery-grid" data-aos="fade-up" data-aos-delay="100">
            <!-- Kamar Tidur -->
            <div class="room-card">
                <img src="{{ asset('assets/view-kamar.jpeg') }}" alt="Kamar Tidur Nyaman" loading="lazy">
                <div class="room-overlay">
                    <h3>Kamar Tidur Nyaman</h3>
                    <p>Ranjang luas dengan aksen bambu alami dan selimut bermotif indah untuk istirahat yang sempurna.</p>
                </div>
            </div>
            <!-- Ruang Dalam -->
            <div class="room-card">
                <img src="{{ asset('assets/view-tamu.jpeg') }}" alt="Sudut Bersantai" loading="lazy">
                <div class="room-overlay">
                    <h3>Sudut Bersantai</h3>
                    <p>Area lesehan hangat dengan karpet lembut, lengkap dengan mini-fridge dan fasilitas pembuat teh/kopi.</p>
                </div>
            </div>
            <!-- Area Luar -->
            <div class="room-card">
                <img src="{{ asset('assets/view-luar.jpeg') }}" alt="Balkon Tepi Laut" loading="lazy">
                <div class="room-overlay">
                    <h3>Balkon Tepi Laut</h3>
                    <p>Pintu kaca geser yang membuka langsung ke balkon kayu dengan pemandangan ombak laut yang menakjubkan.</p>
                </div>
            </div>
            <!-- Fasad/Pemandangan -->
            <div class="room-card">
                <img src="{{ asset('assets/view-1.png') }}" alt="Sentuhan Estetik" loading="lazy">
                <div class="room-overlay">
                    <h3>Sentuhan Estetik</h3>
                    <p>Dekorasi dinding buatan tangan dari rajutan makrame dan kerang yang memberikan nuansa pesisir otentik.</p>
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
        <p>Pesan sekarang dan nikmati pengalaman liburan pesisir mewah yang tak terlupakan.</p>
        <div class="cta-btns">
            <a href="#" class="btn-cta-primary" onclick="openBookingModal(event)">Pesan Sekarang <i class="fa-solid fa-arrow-right fa-xs"></i></a>
            <a href="https://wa.me/6282247011652" target="_blank" class="btn-cta-ghost"><i class="fa-regular fa-message fa-xs"></i> Hubungi Agen</a>
        </div>
    </section>

    <!-- ===== BOOKING MODAL ===== -->
    <div class="booking-modal-overlay" id="bookingModalOverlay">
        <div class="booking-modal">
            <div class="booking-modal-header">
                <h3>Form Pemesanan</h3>
                <button class="close-modal" onclick="closeBookingModal()"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="booking-modal-body">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" id="b_nama" placeholder="Masukkan nama Anda">
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Check In</label>
                        <input type="date" id="b_checkin" onchange="calculatePrice()">
                    </div>
                    <div class="form-group">
                        <label>Check Out</label>
                        <input type="date" id="b_checkout" onchange="calculatePrice()">
                    </div>
                </div>
                
                <div class="form-group guest-group">
                    <label>Tamu</label>
                    <div class="guest-counters">
                        <div class="guest-counter-item">
                            <span>Dewasa</span>
                            <div class="counter-actions">
                                <button type="button" onclick="updateGuest('dewasa', -1)"><i class="fa-solid fa-minus"></i></button>
                                <span id="b_dewasa_cnt">2</span>
                                <button type="button" onclick="updateGuest('dewasa', 1)"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="guest-counter-item">
                            <span>Anak-anak</span>
                            <div class="counter-actions">
                                <button type="button" onclick="updateGuest('anak', -1)"><i class="fa-solid fa-minus"></i></button>
                                <span id="b_anak_cnt">0</span>
                                <button type="button" onclick="updateGuest('anak', 1)"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="booking-price-box">
                    <span>Total Harga:</span>
                    <strong id="b_total_harga">Rp 0</strong>
                </div>

                <button class="btn-submit-booking" onclick="submitBooking()">
                    <i class="fa-brands fa-whatsapp"></i> Kirim Pesanan via WhatsApp
                </button>
            </div>
        </div>
    </div>

    <!-- ===== FOOTER ===== -->
    @include('footers.footers')

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/header.js') }}"></script>
    <script src="{{ asset('js/HomePage.js') }}"></script>
</body>
</html>
