<nav class="navbar" id="navbar">
        <div class="nav-brand">ReforceCode</div>
        <ul class="nav-center">
            <li><a href="#" class="active">Villa</a></li>
            <li><a href="#">Layanan</a></li>
            <li><a href="#" onclick="openBookingModal(event)">Pesan Sekarang</a></li>
        </ul>
        <div class="nav-toggle" id="navToggle" onclick="toggleMenu()">
            <span></span><span></span><span></span>
        </div>
    </nav>

    <ul class="mobile-menu" id="mobileMenu">
        <li><a href="#" onclick="toggleMenu()">Villa</a></li>
        <li><a href="#" onclick="toggleMenu()">Layanan</a></li>
        <li><a href="#" onclick="toggleMenu(); openBookingModal(event)">Pesan Sekarang</a></li>
    </ul>