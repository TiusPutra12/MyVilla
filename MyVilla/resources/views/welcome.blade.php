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

    <style>
        /* =========================================
           DESIGN TOKENS
        ========================================= */
        :root {
            --navy:      #0d2b3e;
            --navy-light:#14405e;
            --sand:      #f5f0e8;
            --warm-gray: #f9f6f2;
            --accent:    #c9a96e;
            --accent-light: #f0e4cc;
            --text:      #1c1c1c;
            --text-muted:#6b7280;
            --white:     #ffffff;
            --border:    #e8e2d9;
            --radius-sm: 10px;
            --radius-md: 18px;
            --radius-lg: 28px;
            --shadow-sm: 0 2px 12px rgba(0,0,0,0.06);
            --shadow-md: 0 8px 32px rgba(0,0,0,0.10);
            --shadow-lg: 0 20px 60px rgba(0,0,0,0.12);
            --transition: all 0.35s cubic-bezier(0.4,0,0.2,1);
            --serif: 'DM Serif Display', serif;
            --sans:  'Inter', sans-serif;
        }

        /* =========================================
           RESET & BASE
        ========================================= */
        *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }

        html { scroll-behavior: smooth; }

        body {
            font-family: var(--sans);
            background: var(--warm-gray);
            color: var(--text);
            line-height: 1.65;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        a { text-decoration: none; color: inherit; }
        img { display: block; max-width: 100%; }

        h1, h2, h3 { font-family: var(--serif); line-height: 1.15; }

        /* =========================================
           NAVBAR
        ========================================= */
        .navbar {
            position: fixed;
            top: 0; left: 0;
            width: 100%;
            z-index: 1000;
            padding: 1.5rem 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: var(--transition);
        }

        .navbar.scrolled {
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            padding: 1rem 5%;
            box-shadow: 0 1px 0 var(--border);
        }

        .nav-brand {
            font-family: var(--serif);
            font-size: 1.6rem;
            color: var(--white);
            letter-spacing: -0.02em;
            transition: var(--transition);
        }
        .navbar.scrolled .nav-brand { color: var(--navy); }

        .nav-center {
            display: flex;
            gap: 2.5rem;
            list-style: none;
        }
        .nav-center a {
            font-size: 0.875rem;
            font-weight: 500;
            color: rgba(255,255,255,0.85);
            letter-spacing: 0.02em;
            transition: var(--transition);
            position: relative;
        }
        .nav-center a::after {
            content: '';
            position: absolute;
            bottom: -4px; left: 0;
            width: 0; height: 1px;
            background: var(--accent);
            transition: width 0.3s ease;
        }
        .nav-center a:hover::after,
        .nav-center a.active::after { width: 100%; }
        .navbar.scrolled .nav-center a { color: var(--text-muted); }
        .navbar.scrolled .nav-center a:hover { color: var(--navy); }

        .nav-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--accent);
            color: var(--navy);
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.65rem 1.4rem;
            border-radius: 50px;
            transition: var(--transition);
            letter-spacing: 0.01em;
        }
        .nav-cta:hover {
            background: var(--white);
            transform: translateY(-1px);
            box-shadow: var(--shadow-sm);
        }

        /* Mobile nav toggle */
        .nav-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 4px;
        }
        .nav-toggle span {
            display: block;
            width: 24px;
            height: 2px;
            background: var(--white);
            border-radius: 2px;
            transition: var(--transition);
        }
        .navbar.scrolled .nav-toggle span { background: var(--navy); }
        .nav-toggle.open span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
        .nav-toggle.open span:nth-child(2) { opacity: 0; }
        .nav-toggle.open span:nth-child(3) { transform: rotate(-45deg) translate(5px, -5px); }

        /* Mobile dropdown */
        .mobile-menu {
            display: flex;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100vh;
            background: var(--navy);
            z-index: 999;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2.5rem;
            list-style: none;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-20px);
            transition: all 0.4s ease;
        }
        .mobile-menu.open { 
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .mobile-menu a {
            font-family: var(--serif);
            font-size: 2rem;
            color: var(--white);
            opacity: 0.85;
        }
        .mobile-menu a:hover { opacity: 1; color: var(--accent); }

        /* =========================================
           HERO
        ========================================= */
        .hero {
            position: relative;
            height: 100svh;
            min-height: 620px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 0 5% 8%;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background: url('https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?q=85&w=2070&auto=format&fit=crop')
                        no-repeat center center / cover;
            transform: scale(1.04);
            transition: transform 8s ease;
        }
        .hero.loaded .hero-bg { transform: scale(1); }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to bottom,
                rgba(13,43,62,0.3) 0%,
                rgba(13,43,62,0.1) 40%,
                rgba(13,43,62,0.6) 100%
            );
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 680px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.25);
            color: var(--white);
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 0.45rem 1rem;
            border-radius: 50px;
            margin-bottom: 1.5rem;
        }
        .hero-badge i { color: var(--accent); }

        .hero h1 {
            font-size: clamp(2.4rem, 5vw, 4rem);
            color: var(--white);
            margin-bottom: 1.2rem;
            text-shadow: 0 2px 20px rgba(0,0,0,0.2);
        }

        .hero p {
            font-size: 1.05rem;
            color: rgba(255,255,255,0.82);
            max-width: 460px;
            margin-bottom: 2.5rem;
            font-weight: 300;
        }

        .hero-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-hero-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--accent);
            color: var(--navy);
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.85rem 2rem;
            border-radius: 50px;
            transition: var(--transition);
        }
        .btn-hero-primary:hover {
            background: var(--white);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-hero-ghost {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.3);
            color: var(--white);
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.85rem 2rem;
            border-radius: 50px;
            transition: var(--transition);
        }
        .btn-hero-ghost:hover {
            background: rgba(255,255,255,0.22);
        }

        /* Scroll indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 2.5rem;
            right: 5%;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255,255,255,0.6);
            font-size: 0.7rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }
        .scroll-line {
            width: 1px;
            height: 50px;
            background: linear-gradient(to bottom, rgba(255,255,255,0.6), transparent);
            animation: scrollPulse 2s infinite;
        }
        @keyframes scrollPulse {
            0%, 100% { opacity: 0.4; transform: scaleY(1); }
            50% { opacity: 1; transform: scaleY(0.6); }
        }

        /* =========================================
           SEARCH BAR
        ========================================= */
        .search-wrapper {
            padding: 0 5%;
            margin-top: -2.5rem;
            position: relative;
            z-index: 10;
        }

        .search-bar {
            background: var(--white);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-lg);
            display: flex;
            align-items: center;
            padding: 0.5rem 0.5rem 0.5rem 1.5rem;
            gap: 0;
            max-width: 900px;
            margin: 0 auto;
        }

        .search-field {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 0.8rem 1.2rem;
            border-right: 1px solid var(--border);
            min-width: 0;
        }
        .search-field:first-child { padding-left: 0.4rem; }
        .search-field:last-of-type { border-right: none; }

        .search-field label {
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 0.25rem;
        }
        .search-field input {
            border: none;
            outline: none;
            font-family: var(--sans);
            font-size: 0.9rem;
            color: var(--text);
            background: transparent;
            width: 100%;
        }
        .search-field input::placeholder { color: #bbb; }

        .search-btn {
            background: var(--navy);
            color: var(--white);
            border: none;
            border-radius: var(--radius-sm);
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1rem;
            margin-left: 0.5rem;
            transition: var(--transition);
            flex-shrink: 0;
        }
        .search-btn:hover {
            background: var(--navy-light);
        }

        /* =========================================
           SECTION UTILITY
        ========================================= */
        .section-tag {
            display: inline-block;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 0.8rem;
        }

        .section-title {
            font-size: clamp(1.8rem, 3vw, 2.6rem);
            color: var(--navy);
            margin-bottom: 0.6rem;
        }

        .section-sub {
            color: var(--text-muted);
            font-size: 0.95rem;
            max-width: 520px;
        }

        /* =========================================
           VILLAS SECTION
        ========================================= */
        .villas-section {
            padding: 5rem 5%;
        }

        .section-hdr {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 3rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .view-all-link {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--navy);
            display: flex;
            align-items: center;
            gap: 0.4rem;
            border-bottom: 1px solid var(--navy);
            padding-bottom: 2px;
            transition: var(--transition);
        }
        .view-all-link:hover { color: var(--accent); border-color: var(--accent); }

        /* Featured villa — horizontal layout */
        .villa-featured {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            border-radius: var(--radius-lg);
            overflow: hidden;
            margin-bottom: 1.5rem;
            background: var(--white);
            box-shadow: var(--shadow-md);
            transition: var(--transition);
        }
        .villa-featured:hover { transform: translateY(-4px); box-shadow: var(--shadow-lg); }

        .villa-featured .v-img {
            height: 380px;
            overflow: hidden;
            position: relative;
        }
        .villa-featured .v-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }
        .villa-featured:hover .v-img img { transform: scale(1.06); }

        .v-badge-wrap {
            position: absolute;
            top: 1.2rem;
            left: 1.2rem;
            display: flex;
            gap: 0.5rem;
        }
        .v-badge {
            background: rgba(13,43,62,0.82);
            backdrop-filter: blur(6px);
            color: var(--white);
            font-size: 0.72rem;
            font-weight: 600;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            letter-spacing: 0.04em;
        }

        .villa-featured .v-body {
            padding: 2.5rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .v-location {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-bottom: 0.75rem;
        }
        .v-location i { color: var(--accent); }

        .v-name {
            font-size: 1.8rem;
            color: var(--navy);
            margin-bottom: 1rem;
        }

        .v-meta {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }
        .v-meta-item {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.82rem;
            color: var(--text-muted);
        }
        .v-meta-item i { color: var(--accent); }

        .v-price-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
        }
        .v-price strong {
            font-size: 1.6rem;
            font-family: var(--serif);
            color: var(--navy);
        }
        .v-price span { font-size: 0.82rem; color: var(--text-muted); }

        .v-rating {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.82rem;
            font-weight: 600;
        }
        .v-rating i { color: #f59e0b; }

        .btn-book {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--navy);
            color: var(--white);
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            transition: var(--transition);
            margin-top: 1rem;
            align-self: flex-start;
        }
        .btn-book:hover { background: var(--navy-light); transform: translateY(-1px); }

        /* Two smaller villas side by side */
        .villa-pair {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .villa-mini {
            background: var(--white);
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }
        .villa-mini:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }

        .villa-mini .v-img {
            height: 220px;
            overflow: hidden;
            position: relative;
        }
        .villa-mini .v-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        .villa-mini:hover .v-img img { transform: scale(1.06); }

        .villa-mini .v-body {
            padding: 1.4rem 1.5rem 1.5rem;
        }
        .villa-mini .v-name { font-size: 1.25rem; }
        .villa-mini .v-price-row { padding-top: 1rem; }
        .villa-mini .v-price strong { font-size: 1.25rem; }

        /* =========================================
           AMENITIES
        ========================================= */
        .amenities-section {
            padding: 5rem 5%;
            background: var(--navy);
        }

        .amenities-section .section-tag { color: var(--accent); }
        .amenities-section .section-title { color: var(--white); }
        .amenities-section .section-sub { color: rgba(255,255,255,0.55); }

        .amenities-strip {
            display: flex;
            gap: 1.5rem;
            margin-top: 3rem;
            overflow-x: auto;
            padding-bottom: 0.5rem;
            scrollbar-width: none;
        }
        .amenities-strip::-webkit-scrollbar { display: none; }

        .amenity-item {
            flex: 0 0 auto;
            width: 160px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: var(--radius-md);
            padding: 2rem 1rem;
            text-align: center;
            transition: var(--transition);
        }
        .amenity-item:hover {
            background: rgba(255,255,255,0.12);
            border-color: var(--accent);
            transform: translateY(-4px);
        }
        .amenity-item i {
            font-size: 1.8rem;
            color: var(--accent);
            margin-bottom: 1rem;
        }
        .amenity-item p {
            font-size: 0.82rem;
            color: rgba(255,255,255,0.75);
            font-weight: 500;
            line-height: 1.3;
        }

        /* =========================================
           GALLERY
        ========================================= */
        .gallery-section {
            padding: 5rem 5%;
        }

        .gallery-filter {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin: 2rem 0;
        }
        .filter-btn {
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            border: 1px solid var(--border);
            background: var(--white);
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition);
        }
        .filter-btn.active, .filter-btn:hover {
            background: var(--navy);
            color: var(--white);
            border-color: var(--navy);
        }

        .gallery-masonry {
            columns: 3;
            column-gap: 1rem;
        }
        .gallery-item {
            break-inside: avoid;
            margin-bottom: 1rem;
            border-radius: var(--radius-md);
            overflow: hidden;
            position: relative;
            cursor: pointer;
        }
        .gallery-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
            transition: transform 0.6s ease;
            display: block;
        }
        .gallery-item:hover img { transform: scale(1.06); }
        .gallery-item .g-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(13,43,62,0.7) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.3s;
            display: flex;
            align-items: flex-end;
            padding: 1.2rem;
        }
        .gallery-item:hover .g-overlay { opacity: 1; }
        .gallery-item .g-overlay span {
            color: var(--white);
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* =========================================
           LOCATION
        ========================================= */
        .location-section {
            padding: 5rem 5%;
            background: var(--sand);
        }

        .location-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            margin-top: 3rem;
        }

        .map-frame {
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            height: 420px;
        }
        .map-frame iframe {
            width: 100%;
            height: 100%;
            border: none;
            display: block;
        }

        .poi-list { display: flex; flex-direction: column; gap: 1rem; }

        .poi-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: var(--white);
            padding: 1rem 1.25rem;
            border-radius: var(--radius-sm);
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
        }
        .poi-item:hover { transform: translateX(6px); box-shadow: var(--shadow-md); }

        .poi-icon {
            width: 46px;
            height: 46px;
            border-radius: 10px;
            background: var(--accent-light);
            color: var(--navy);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }
        .poi-info h4 {
            font-size: 0.9rem;
            font-family: var(--sans);
            font-weight: 600;
            color: var(--text);
            margin-bottom: 0.15rem;
        }
        .poi-info p { font-size: 0.8rem; color: var(--text-muted); }

        /* =========================================
           TESTIMONIAL
        ========================================= */
        .testimonial-section {
            padding: 6rem 5%;
            text-align: center;
            background: var(--warm-gray);
        }

        .testimonial-inner {
            max-width: 800px;
            margin: 2.5rem auto 0;
            overflow: hidden;
            position: relative;
        }

        .testimonial-track {
            display: flex;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .testimonial-slide {
            flex: 0 0 100%;
            width: 100%;
            padding: 0 1rem;
            box-sizing: border-box;
        }

        .testimonial-dots {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 2.5rem;
        }

        .testimonial-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(13,43,62,0.2);
            cursor: pointer;
            transition: var(--transition);
        }

        .testimonial-dot.active {
            background: var(--accent);
            transform: scale(1.3);
        }

        .quote-mark {
            font-family: var(--serif);
            font-size: 7rem;
            line-height: 0.6;
            color: var(--accent);
            opacity: 0.35;
            margin-bottom: 1rem;
            display: block;
        }

        .testimonial-text {
            font-family: var(--serif);
            font-size: clamp(1.3rem, 2.5vw, 1.9rem);
            color: var(--navy);
            line-height: 1.4;
            font-style: italic;
            margin-bottom: 2rem;
            text-align: justify;
        }

        .author-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }
        .author-photo {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--accent);
        }
        .author-name { font-size: 0.9rem; font-weight: 600; color: var(--navy); }
        .author-sub { font-size: 0.78rem; color: var(--text-muted); }

        /* =========================================
           CTA
        ========================================= */
        .cta-section {
            padding: 5rem 5%;
            background: var(--navy);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .cta-section::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(201,169,110,0.12);
            pointer-events: none;
        }
        .cta-section::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -40px;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background: rgba(201,169,110,0.07);
            pointer-events: none;
        }

        .cta-section h2 {
            font-size: clamp(1.8rem, 3vw, 2.8rem);
            color: var(--white);
            margin-bottom: 1rem;
        }
        .cta-section p {
            color: rgba(255,255,255,0.65);
            font-size: 1rem;
            margin-bottom: 2.5rem;
            font-weight: 300;
        }

        .cta-btns {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-cta-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--accent);
            color: var(--navy);
            font-weight: 700;
            font-size: 0.9rem;
            padding: 0.9rem 2.2rem;
            border-radius: 50px;
            transition: var(--transition);
        }
        .btn-cta-primary:hover { background: var(--white); transform: translateY(-2px); }

        .btn-cta-ghost {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: 1px solid rgba(255,255,255,0.3);
            color: rgba(255,255,255,0.85);
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.9rem 2.2rem;
            border-radius: 50px;
            transition: var(--transition);
        }
        .btn-cta-ghost:hover { border-color: rgba(255,255,255,0.7); color: var(--white); }

        /* =========================================
           FOOTER
        ========================================= */
        .footer {
            background: var(--white);
            border-top: 1px solid var(--border);
            padding: 1.5rem 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-brand {
            font-family: var(--serif);
            font-size: 1.3rem;
            color: var(--navy);
        }

        .footer-copy {
            font-size: 0.78rem;
            color: var(--text-muted);
            margin-top: 0.2rem;
        }

        .footer-links {
            display: flex;
            gap: 1.8rem;
            list-style: none;
            flex-wrap: wrap;
        }
        .footer-links a {
            font-size: 0.78rem;
            color: var(--text-muted);
            transition: var(--transition);
        }
        .footer-links a:hover { color: var(--navy); }

        .footer-socials {
            display: flex;
            gap: 0.75rem;
        }
        .social-btn {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 0.88rem;
            transition: var(--transition);
        }
        .social-btn:hover {
            border-color: var(--navy);
            color: var(--navy);
            background: var(--warm-gray);
        }

        /* =========================================
           ANIMATIONS
        ========================================= */
        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .hero-content { animation: fadeSlideUp 1s ease 0.2s both; }
        .search-bar   { animation: fadeSlideUp 0.8s ease 0.5s both; }

        /* =========================================
           RESPONSIVE
        ========================================= */
        @media (max-width: 1024px) {
            .villa-featured {
                grid-template-columns: 1fr;
            }
            .villa-featured .v-img { height: 300px; }
            .location-grid { grid-template-columns: 1fr; gap: 2.5rem; }
            .map-frame { height: 300px; }
            .gallery-masonry { columns: 2; }
        }

        @media (max-width: 768px) {
            .nav-center, .nav-cta { display: none; }
            .nav-toggle { display: flex; }
            .nav-brand { font-size: 1.4rem; }

            .hero { padding: 0 5% 6rem; }
            .hero h1 { font-size: 2.2rem; }
            .hero p { font-size: 0.95rem; }
            .hero-actions { gap: 0.75rem; }
            .btn-hero-primary, .btn-hero-ghost {
                font-size: 0.85rem;
                padding: 0.75rem 1.5rem;
            }
            .scroll-indicator { display: none; }

            .search-wrapper { margin-top: -1.5rem; }
            .search-bar {
                flex-direction: column;
                border-radius: var(--radius-md);
                padding: 1.2rem;
                gap: 0.75rem;
            }
            .search-field {
                border-right: none;
                border-bottom: 1px solid var(--border);
                padding: 0.5rem 0;
                width: 100%;
            }
            .search-field:last-of-type { border-bottom: none; }
            .search-btn {
                width: 100%;
                border-radius: var(--radius-sm);
                height: 48px;
                margin-left: 0;
            }

            .villa-pair { grid-template-columns: 1fr; }
            .villa-mini .v-img { height: 200px; }

            .amenity-item { width: 130px; }

            .gallery-masonry { columns: 2; }

            .section-hdr { flex-direction: column; align-items: flex-start; }

            .cta-box { padding: 3rem 1.5rem; }

            .footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.5rem;
                padding: 2rem 5%;
            }
            .footer-links { gap: 1.2rem; }
        }

        @media (max-width: 480px) {
            .gallery-masonry { columns: 1; }
            .hero h1 { font-size: 1.9rem; }
            .amenities-strip { gap: 1rem; }
            .amenity-item { width: 120px; }
        }
    </style>
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar" id="navbar">
        <div class="nav-brand">ReforceCode</div>
        <ul class="nav-center">
            <li><a href="#" class="active">Villa</a></li>
            <li><a href="#">Layanan</a></li>
            <li><a href="#">Pesan Sekarang</a></li>
        </ul>
        <div class="nav-toggle" id="navToggle" onclick="toggleMenu()">
            <span></span><span></span><span></span>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <ul class="mobile-menu" id="mobileMenu">
        <li><a href="#" onclick="toggleMenu()">Villa</a></li>
        <li><a href="#" onclick="toggleMenu()">Layanan</a></li>
        <li><a href="#" onclick="toggleMenu()">Pesan Sekarang</a></li>
    </ul>

    <!-- ===== HERO ===== -->
    <section class="hero" id="hero">
        <div class="hero-bg"></div>
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
            <div class="search-field">
                <label><i class="fa-solid fa-location-dot"></i> &nbsp;Destinasi</label>
                <input type="text" placeholder="Seminyak, Bali">
            </div>
            <div class="search-field">
                <label><i class="fa-regular fa-calendar"></i> &nbsp;Check In</label>
                <input type="text" placeholder="Pilih tanggal">
            </div>
            <div class="search-field">
                <label><i class="fa-regular fa-moon"></i> &nbsp;Durasi</label>
                <input type="text" placeholder="Berapa malam?">
            </div>
            <div class="search-field">
                <label><i class="fa-regular fa-user"></i> &nbsp;Tamu</label>
                <input type="text" placeholder="Jumlah tamu">
            </div>
            <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
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

        <!-- Featured -->
        <div class="villa-featured" data-aos="fade-up" data-aos-delay="100">
            <div class="v-img">
                <img src="https://images.unsplash.com/photo-1499793983690-e29da59ef1c2?q=80&w=2070&auto=format&fit=crop" alt="Villa Ammouli" loading="lazy">
                <div class="v-badge-wrap">
                    <span class="v-badge"><i class="fa-solid fa-crown fa-xs"></i> Terfavorit</span>
                </div>
            </div>
            <div class="v-body">
                <div class="v-location">
                    <i class="fa-solid fa-location-dot fa-xs"></i> Seminyak, Bali
                </div>
                <h3 class="v-name">Villa Ammouli</h3>
                <div class="v-meta">
                    <div class="v-meta-item"><i class="fa-solid fa-bed fa-xs"></i> 4 Kamar Tidur</div>
                    <div class="v-meta-item"><i class="fa-solid fa-water-ladder fa-xs"></i> Private Pool</div>
                    <div class="v-meta-item"><i class="fa-solid fa-users fa-xs"></i> Maks 8 Tamu</div>
                </div>
                <div class="v-price-row">
                    <div>
                        <div class="v-price"><strong>$1,250</strong> <span>/ malam</span></div>
                        <div class="v-rating"><i class="fa-solid fa-star fa-xs"></i> 4.9 &nbsp;(87 ulasan)</div>
                    </div>
                </div>
                <a href="#" class="btn-book">Pesan Sekarang <i class="fa-solid fa-arrow-right fa-xs"></i></a>
            </div>
        </div>

        <!-- Pair -->
        <div class="villa-pair">
            <div class="villa-mini" data-aos="fade-up" data-aos-delay="200">
                <div class="v-img">
                    <img src="https://images.unsplash.com/photo-1510798831971-661eb04b3739?q=80&w=1887&auto=format&fit=crop" alt="Palazzo Como" loading="lazy">
                    <div class="v-badge-wrap">
                        <span class="v-badge">Bersejarah</span>
                    </div>
                </div>
                <div class="v-body">
                    <div class="v-location"><i class="fa-solid fa-location-dot fa-xs"></i> Ubud, Bali</div>
                    <h3 class="v-name">Palazzo Como</h3>
                    <div class="v-meta">
                        <div class="v-meta-item"><i class="fa-solid fa-bed fa-xs"></i> 6 Kamar</div>
                        <div class="v-meta-item"><i class="fa-solid fa-users fa-xs"></i> 12 Tamu</div>
                    </div>
                    <div class="v-price-row">
                        <div class="v-price"><strong>$2,100</strong> <span>/ malam</span></div>
                        <div class="v-rating"><i class="fa-solid fa-star fa-xs"></i> 4.8</div>
                    </div>
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

    <!-- ===== GALLERY ===== -->
    <section class="gallery-section" id="gallery">
        <div data-aos="fade-up">
            <span class="section-tag">Galeri</span>
            <h2 class="section-title">Eksplorasi Ruangan</h2>
        </div>

        <div class="gallery-filter" data-aos="fade-up" data-aos-delay="100">
            <button class="filter-btn active" data-filter="all">Semua</button>
            <button class="filter-btn" data-filter="bedroom">Kamar Tidur</button>
            <button class="filter-btn" data-filter="bathroom">Kamar Mandi</button>
            <button class="filter-btn" data-filter="outdoor">Area Terbuka</button>
            <button class="filter-btn" data-filter="living">Ruang Tengah</button>
        </div>

        <div class="gallery-masonry" data-aos="fade-up" data-aos-delay="150">
            <div class="gallery-item bedroom">
                <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?q=80&w=800&auto=format&fit=crop" alt="Kamar Tidur Utama" loading="lazy">
                <div class="g-overlay"><span>Kamar Tidur Utama</span></div>
            </div>
            <div class="gallery-item outdoor">
                <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=800&auto=format&fit=crop" alt="Kolam Renang" loading="lazy">
                <div class="g-overlay"><span>Kolam Renang</span></div>
            </div>
            <div class="gallery-item bathroom">
                <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=800&auto=format&fit=crop" alt="Kamar Mandi" loading="lazy">
                <div class="g-overlay"><span>Kamar Mandi Mewah</span></div>
            </div>
            <div class="gallery-item living">
                <img src="https://images.unsplash.com/photo-1600121848594-d8644e57abab?q=80&w=800&auto=format&fit=crop" alt="Ruang Keluarga" loading="lazy">
                <div class="g-overlay"><span>Ruang Keluarga</span></div>
            </div>
            <div class="gallery-item outdoor">
                <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?q=80&w=800&auto=format&fit=crop" alt="Balkon" loading="lazy">
                <div class="g-overlay"><span>Balkon Pemandangan Laut</span></div>
            </div>
            <div class="gallery-item bedroom">
                <img src="https://images.unsplash.com/photo-1540518614846-7eded433c457?q=80&w=800&auto=format&fit=crop" alt="Kamar Tamu" loading="lazy">
                <div class="g-overlay"><span>Kamar Tidur Tamu</span></div>
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
                <div class="poi-list">
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

    <!-- ===== TESTIMONIAL ===== -->
    <section class="testimonial-section" data-aos="fade-up">
        <span class="section-tag">Testimoni</span>
        <div class="testimonial-inner">
            <div class="testimonial-track" id="testimonialTrack">
                <!-- Testimonial 1 -->
                <div class="testimonial-slide">
                    <span class="quote-mark">&ldquo;</span>
                    <p class="testimonial-text">"ReforceCode tidak sekadar menyediakan vila — mereka menghadirkan kenangan yang tak terlupakan. Detail perhatian terhadap properti dan layanan melampaui ekspektasi kami."</p>
                    <div class="author-row">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=200&auto=format&fit=crop" alt="Putri Narayani" class="author-photo">
                        <div>
                            <div class="author-name">Putri Narayani</div>
                            <div class="author-sub">5 Januari 2026</div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="testimonial-slide">
                    <span class="quote-mark">&ldquo;</span>
                    <p class="testimonial-text">"Desain arsitektur yang memukau, berpadu sempurna dengan pemandangan alam. Staf sangat responsif dan ramah. Ini adalah liburan terbaik keluarga kami."</p>
                    <div class="author-row">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=200&auto=format&fit=crop" alt="Budi Santoso" class="author-photo">
                        <div>
                            <div class="author-name">Budi Santoso</div>
                            <div class="author-sub">12 Februari 2026</div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="testimonial-slide">
                    <span class="quote-mark">&ldquo;</span>
                    <p class="testimonial-text">"Sangat privat, eksklusif, dan mewah. Mulai dari kolam renang pribadinya hingga layanan yang mengagumkan. Sangat merekomendasikan tempat ini!"</p>
                    <div class="author-row">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=200&auto=format&fit=crop" alt="Sarah Wijaya" class="author-photo">
                        <div>
                            <div class="author-name">Sarah Wijaya</div>
                            <div class="author-sub">28 Desember 2025</div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 4 -->
                <div class="testimonial-slide" style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
                    <div style="font-family: var(--serif); font-size: 2rem; color: var(--navy); padding: 4rem 0;">
                        <a href="#" style="border-bottom: 2px solid var(--accent); padding-bottom: 5px; transition: var(--transition); display: inline-flex; align-items: center; gap: 0.5rem;" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--navy)'">
                            Testimoni Lainnya <i class="fa-solid fa-arrow-right fa-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-dots" id="testimonialDots">
                <span class="testimonial-dot active" data-index="0"></span>
                <span class="testimonial-dot" data-index="1"></span>
                <span class="testimonial-dot" data-index="2"></span>
                <span class="testimonial-dot" data-index="3"></span>
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
    <footer class="footer">
        <div>
            <div class="footer-brand">ReforceCode</div>
            <div class="footer-copy">&copy; 2026 ReforceCode. Hak cipta dilindungi undang-undang.</div>
        </div>
        <ul class="footer-links">
            <li><a href="#">Kebijakan Privasi</a></li>
            <li><a href="#">Syarat & Ketentuan</a></li>
            <li><a href="#">Hubungi Kami</a></li>
            <li><a href="#">Karir</a></li>
        </ul>
        <div class="footer-socials">
            <a href="#" class="social-btn"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="social-btn"><i class="fa-brands fa-twitter"></i></a>
        </div>
    </footer>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // AOS Init
        AOS.init({ duration: 750, easing: 'ease-out', once: true, offset: 80 });

        // Hero bg subtle zoom on load
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => document.getElementById('hero').classList.add('loaded'), 100);
        });

        // Navbar scroll
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 60);
        });

        // Mobile menu
        function toggleMenu() {
            const toggle = document.getElementById('navToggle');
            const menu   = document.getElementById('mobileMenu');
            toggle.classList.toggle('open');
            menu.classList.toggle('open');
            document.body.style.overflow = menu.classList.contains('open') ? 'hidden' : '';
        }

        // Gallery filter
        const filterBtns = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                const filter = btn.dataset.filter;
                galleryItems.forEach(item => {
                    item.style.display = (filter === 'all' || item.classList.contains(filter)) ? 'block' : 'none';
                });
            });
        });
        // Testimonial Auto Scroll
        const track = document.getElementById('testimonialTrack');
        const dots = document.querySelectorAll('.testimonial-dot');
        let currentSlide = 0;
        const totalSlides = dots.length;

        function goToSlide(index) {
            currentSlide = index;
            track.style.transform = `translateX(-${currentSlide * 100}%)`;
            dots.forEach(dot => dot.classList.remove('active'));
            dots[currentSlide].classList.add('active');
        }

        dots.forEach(dot => {
            dot.addEventListener('click', function() {
                goToSlide(parseInt(this.getAttribute('data-index')));
            });
        });

        // Auto slide every 5 seconds
        setInterval(() => {
            if (track) {
                currentSlide = (currentSlide + 1) % totalSlides;
                goToSlide(currentSlide);
            }
        }, 5000);
    </script>
</body>
</html>
