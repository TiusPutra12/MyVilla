// Mobile menu
        function toggleMenu() {
            const toggle = document.getElementById('navToggle');
            const menu   = document.getElementById('mobileMenu');
            toggle.classList.toggle('open');
            menu.classList.toggle('open');
            document.body.style.overflow = menu.classList.contains('open') ? 'hidden' : '';
        }