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
            if(e) e.preventDefault();
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
                    return total;
                }
            }
            document.getElementById('b_total_harga').innerText = 'Rp 0';
            return 0;
        }

        function submitBooking() {
            const nama = document.getElementById('b_nama').value.trim();
            const checkin = document.getElementById('b_checkin').value;
            const checkout = document.getElementById('b_checkout').value;
            const dewasa = document.getElementById('b_dewasa_cnt').innerText;
            const anak = document.getElementById('b_anak_cnt').innerText;
            
            if (!nama || !checkin || !checkout) {
                alert('Mohon lengkapi Nama, Check In, dan Check Out terlebih dahulu.');
                return;
            }

            const date1 = new Date(checkin);
            const date2 = new Date(checkout);
            if (date2 <= date1) {
                alert('Tanggal Check Out harus lebih besar dari Check In.');
                return;
            }

            const total = calculatePrice();
            const totalStr = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(total);

            const btn = document.querySelector('.btn-submit-booking');
            const originalBtnText = btn.innerHTML;
            btn.innerHTML = 'Memproses...';
            btn.disabled = true;

            // Submit to DB via AJAX
            fetch('/api/bookings', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    name: nama,
                    check_in: checkin,
                    check_out: checkout,
                    adults: parseInt(dewasa),
                    children: parseInt(anak),
                    total_price: total
                })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    // Format WhatsApp Message
                    let waText = `Halo MyVilla, saya ingin memesan vila dengan detail berikut:\n\n`;
                    waText += `*Nama Pemesan:* ${nama}\n`;
                    waText += `*Check In:* ${checkin}\n`;
                    waText += `*Check Out:* ${checkout}\n`;
                    waText += `*Tamu:* ${dewasa} Dewasa, ${anak} Anak-anak\n`;
                    waText += `*Total Estimasi:* ${totalStr}\n\n`;
                    waText += `Mohon info ketersediaan dan cara pembayarannya. Terima kasih.`;

                    // Redirect to WhatsApp
                    const waNumber = '6282247011652';
                    window.open(`https://wa.me/${waNumber}?text=${encodeURIComponent(waText)}`, '_blank');
                    
                    closeBookingModal();
                    alert('Pesanan Anda berhasil dikirim ke Admin!');
                } else {
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Gagal menghubungi server.');
            })
            .finally(() => {
                btn.innerHTML = originalBtnText;
                btn.disabled = false;
            });
        }