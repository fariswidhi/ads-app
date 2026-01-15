// ===================================
// JAVANESE WEDDING INVITATION SCRIPTS
// ===================================

document.addEventListener('DOMContentLoaded', function () {
    // Elements
    const cover = document.getElementById('cover');
    const mainContent = document.getElementById('mainContent');
    const openBtn = document.getElementById('openBtn');
    const floatingNav = document.getElementById('floatingNav');
    const bgMusic = document.getElementById('bgMusic');
    const musicToggle = document.getElementById('musicToggle');

    // Wedding Date - Update this!
    const weddingDate = new Date('2026-03-31T08:00:00');

    // ===================================
    // OPEN INVITATION
    // ===================================
    openBtn.addEventListener('click', function () {
        // Fade out cover
        cover.style.opacity = '0';
        cover.style.pointerEvents = 'none';

        setTimeout(() => {
            cover.style.display = 'none';
            mainContent.classList.add('visible');
            floatingNav.classList.add('visible');

            // Play music
            bgMusic.volume = 0.5;
            bgMusic.play().catch(e => console.log('Autoplay prevented'));

            // Trigger scroll animations
            initScrollAnimations();
        }, 500);
    });

    // ===================================
    // MUSIC TOGGLE
    // ===================================
    let isMuted = true; // Start muted
    musicToggle.classList.add('muted');

    musicToggle.addEventListener('click', function () {
        if (isMuted) {
            bgMusic.play();
            musicToggle.classList.remove('muted');
        } else {
            bgMusic.pause();
            musicToggle.classList.add('muted');
        }
        isMuted = !isMuted;
    });

    // ===================================
    // COUNTDOWN TIMER
    // ===================================
    function updateCountdown() {
        const now = new Date().getTime();
        const distance = weddingDate.getTime() - now;

        if (distance < 0) {
            document.getElementById('days').textContent = '00';
            document.getElementById('hours').textContent = '00';
            document.getElementById('minutes').textContent = '00';
            document.getElementById('seconds').textContent = '00';
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById('days').textContent = String(days).padStart(2, '0');
        document.getElementById('hours').textContent = String(hours).padStart(2, '0');
        document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
        document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');
    }

    // Update countdown every second
    updateCountdown();
    setInterval(updateCountdown, 1000);

    // ===================================
    // SCROLL ANIMATIONS
    // ===================================
    function initScrollAnimations() {
        const sections = document.querySelectorAll('.section');

        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in', 'visible');
                }
            });
        }, observerOptions);

        sections.forEach(section => {
            section.classList.add('fade-in');
            observer.observe(section);
        });
    }

    // ===================================
    // FLOATING NAVIGATION
    // ===================================
    const navItems = document.querySelectorAll('.nav-item');

    navItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            const targetSection = this.dataset.section;
            const target = document.querySelector(`.${targetSection}`);

            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });

                // Update active state
                navItems.forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');
            }
        });
    });

    // Update active nav on scroll
    window.addEventListener('scroll', function () {
        const sections = document.querySelectorAll('.section');
        const scrollPosition = window.scrollY + 200;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionClass = section.classList[1]; // Get section class name

            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                navItems.forEach(nav => {
                    nav.classList.remove('active');
                    if (nav.dataset.section === sectionClass) {
                        nav.classList.add('active');
                    }
                });
            }
        });
    });

    // ===================================
    // COPY TO CLIPBOARD
    // ===================================
    const copyButtons = document.querySelectorAll('.copy-btn');

    copyButtons.forEach(btn => {
        btn.addEventListener('click', async function () {
            const textToCopy = this.dataset.copy;

            try {
                await navigator.clipboard.writeText(textToCopy);

                // Show success feedback
                const originalText = this.innerHTML;
                this.innerHTML = `
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                    Tersalin!
                `;
                this.style.background = 'var(--color-gold)';
                this.style.color = 'var(--color-black)';

                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.style.background = '';
                    this.style.color = '';
                }, 2000);
            } catch (err) {
                console.error('Failed to copy:', err);
            }
        });
    });

    // ===================================
    // RSVP FORM
    // ===================================
    const rsvpForm = document.getElementById('rsvpForm');

    rsvpForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const data = {
            nama: formData.get('nama'),
            kehadiran: formData.get('kehadiran'),
            jumlah: formData.get('jumlah')
        };

        // You can send this data to a server or Google Sheets
        console.log('RSVP Data:', data);

        // Show success message
        showToast('Terima kasih! Konfirmasi Anda telah diterima.');
        this.reset();
    });

    // ===================================
    // WISHES FORM
    // ===================================
    const wishForm = document.getElementById('wishForm');
    const wishesList = document.getElementById('wishesList');

    wishForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const name = formData.get('wishName');
        const message = formData.get('wishMessage');

        // Create wish item
        const wishItem = document.createElement('div');
        wishItem.className = 'wish-item';
        wishItem.innerHTML = `
            <div class="wish-header">
                <span class="wish-name">${escapeHtml(name)}</span>
                <span class="wish-date">${formatDate(new Date())}</span>
            </div>
            <p class="wish-text">${escapeHtml(message)}</p>
        `;

        // Add to the beginning of the list
        wishesList.insertBefore(wishItem, wishesList.firstChild);

        // Show success message
        showToast('Terima kasih atas ucapan dan doanya!');
        this.reset();
    });

    // ===================================
    // HELPER FUNCTIONS
    // ===================================
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function formatDate(date) {
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        return `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`;
    }

    function showToast(message) {
        // Create toast element
        const toast = document.createElement('div');
        toast.style.cssText = `
            position: fixed;
            bottom: 100px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #D4AF37, #F4D03F);
            color: #0a0a0a;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-family: 'Cormorant Garamond', serif;
            font-size: 0.95rem;
            z-index: 1001;
            box-shadow: 0 4px 20px rgba(212, 175, 55, 0.4);
            animation: slideUp 0.3s ease;
        `;
        toast.textContent = message;
        document.body.appendChild(toast);

        // Add animation keyframes if not exists
        if (!document.getElementById('toast-styles')) {
            const style = document.createElement('style');
            style.id = 'toast-styles';
            style.textContent = `
                @keyframes slideUp {
                    from { opacity: 0; transform: translateX(-50%) translateY(20px); }
                    to { opacity: 1; transform: translateX(-50%) translateY(0); }
                }
                @keyframes slideDown {
                    from { opacity: 1; transform: translateX(-50%) translateY(0); }
                    to { opacity: 0; transform: translateX(-50%) translateY(20px); }
                }
            `;
            document.head.appendChild(style);
        }

        // Remove toast after delay
        setTimeout(() => {
            toast.style.animation = 'slideDown 0.3s ease';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // ===================================
    // PARALLAX EFFECT (Optional)
    // ===================================
    window.addEventListener('scroll', function () {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.ornament');

        parallaxElements.forEach(el => {
            const speed = 0.3;
            el.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });

    // ===================================
    // PRELOAD ANIMATION
    // ===================================
    window.addEventListener('load', function () {
        document.body.classList.add('loaded');
    });
});
