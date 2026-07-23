// AOS Init
AOS.init({ duration: 750, easing: 'ease-out', once: true, offset: 80 });

// Page bg subtle zoom on load
document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => document.body.classList.add('loaded'), 100);
});

// Scroll effects
const navbar = document.getElementById('navbar');
const blurOverlay = document.querySelector('.page-blur-overlay');

window.addEventListener('scroll', () => {
    let scrollY = window.scrollY;
    navbar.classList.toggle('scrolled', scrollY > 60);

    // Dynamic blur and overlay on scroll
    let blurVal = Math.min(scrollY / 80, 4); // max 4px blur
    let alpha = Math.min(scrollY / 600, 0.75); // max 0.75 alpha for background

    if (blurOverlay) {
        blurOverlay.style.backdropFilter = `blur(${blurVal}px)`;
        blurOverlay.style.webkitBackdropFilter = `blur(${blurVal}px)`;
        blurOverlay.style.background = `rgba(249, 246, 242, ${alpha})`;
    }
});

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

// =========================================
// BOOKING MODAL LOGIC
// =========================================
const modalOverlay = document.getElementById('bookingModalOverlay');
const pricePerNight = 5000000; // Harga per malam (Rp 5.000.000)

function openBookingModal(e) {
    if (e) e.preventDefault();
    modalOverlay.classList.add('open');
}

function closeBookingModal() {
    modalOverlay.classList.remove('open');
}

// Close modal when clicking outside
modalOverlay.addEventListener('click', (e) => {
    if (e.target === modalOverlay) {
        closeBookingModal();
    }
});

function updateGuest(type, change) {
    const el = document.getElementById(type === 'dewasa' ? 'b_dewasa_cnt' : 'b_anak_cnt');
    let val = parseInt(el.innerText) + change;

    if (type === 'dewasa' && val < 1) val = 1; // Minimal 1 dewasa
    if (type === 'anak' && val < 0) val = 0;   // Minimal 0 anak

    el.innerText = val;
    if (type === 'dewasa') document.getElementById('hidden_adults').value = val;
    if (type === 'anak') document.getElementById('hidden_children').value = val;
}

function calculatePrice() {
    const checkin = document.getElementById('b_checkin').value;
    const checkout = document.getElementById('b_checkout').value;

    if (checkin && checkout) {
        const date1 = new Date(checkin);
        const date2 = new Date(checkout);
        const diffTime = date2 - date1;
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        if (diffDays > 0) {
            const total = diffDays * pricePerNight;
            document.getElementById('b_total_harga').innerText = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(total);
            document.getElementById('hidden_total_price').value = total;
            return total;
        }
    }
    document.getElementById('b_total_harga').innerText = 'Rp 0';
    document.getElementById('hidden_total_price').value = 0;
    return 0;
}
