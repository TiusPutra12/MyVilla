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