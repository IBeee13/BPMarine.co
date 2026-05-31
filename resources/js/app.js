import './bootstrap';
import '../css/app.css';

import AOS from 'aos'
import 'aos/dist/aos.css'
import Lenis from 'lenis';


const lenis = new Lenis();

function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
}
requestAnimationFrame(raf);


window.toggleSidebar = function () {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const btn = document.getElementById('burger-btn');
    const isOpen = !sidebar.classList.contains('-translate-x-full');
    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
    btn.setAttribute('aria-expanded', String(!isOpen));
};


// ─── Testimonial Drag Scroll + Auto Rotate ───────────────────────────────────
const scrollEl = document.getElementById('testimonial-scroll');

if (scrollEl) {
    const cards = document.querySelectorAll('[data-card]');
    const photos = document.querySelectorAll('[data-photo]');
    const infos = document.querySelectorAll('[data-info]');
    const dots = document.querySelectorAll('#testimonial-dots [data-dot]');
    const total = cards.length;

    // ── Smooth scroll helper ──
    let targetScrollLeft = 0;
    let currentScrollLeft = 0;
    let isAnimating = false;

    function smoothScrollTo(target) {
        targetScrollLeft = Math.max(0, Math.min(target, scrollEl.scrollWidth - scrollEl.clientWidth));
        if (!isAnimating) {
            isAnimating = true;
            animateScroll();
        }
    }

    function animateScroll() {
        const diff = targetScrollLeft - currentScrollLeft;
        if (Math.abs(diff) < 0.5) {
            currentScrollLeft = targetScrollLeft;
            scrollEl.scrollLeft = currentScrollLeft;
            isAnimating = false;
            return;
        }
        currentScrollLeft += diff * 0.08;
        scrollEl.scrollLeft = currentScrollLeft;
        requestAnimationFrame(animateScroll);
    }

    // ── Drag to scroll ──
    let isDown = false, startX, dragScrollLeft, hasDragged = false;

    scrollEl.addEventListener('mousedown', e => {
        isDown = true;
        hasDragged = false;
        startX = e.pageX - scrollEl.offsetLeft;
        dragScrollLeft = currentScrollLeft;
        cancelAutoRotate();
    });

    ['mouseleave', 'mouseup'].forEach(ev =>
        scrollEl.addEventListener(ev, () => {
            if (isDown) {
                isDown = false;
                snapToNearest();
                resumeAutoRotate();
            }
        })
    );

    scrollEl.addEventListener('mousemove', e => {
        if (!isDown) return;
        e.preventDefault();
        hasDragged = true;
        const x = e.pageX - scrollEl.offsetLeft;
        const walk = (x - startX) * 1.5;
        currentScrollLeft = dragScrollLeft - walk;
        scrollEl.scrollLeft = currentScrollLeft;
        targetScrollLeft = currentScrollLeft;
        const current = getActiveIndex();
        if (current !== lastIndex) { lastIndex = current; updateActive(current); }
    });

    // ── Snap to nearest card after drag ──
    function snapToNearest() {
        scrollToIndex(getActiveIndex());
    }

    function scrollToIndex(index) {
        const card = cards[index];
        if (!card) return;
        const cardCenter = card.offsetLeft + card.offsetWidth / 2;
        smoothScrollTo(cardCenter - scrollEl.clientWidth / 2);
        updateActive(index);
        lastIndex = index;
    }

    // ── Detect active card ──
    function getActiveIndex() {
        const center = scrollEl.scrollLeft + scrollEl.clientWidth / 2;
        let closest = 0, minDist = Infinity;
        cards.forEach((card, i) => {
            const dist = Math.abs((card.offsetLeft + card.offsetWidth / 2) - center);
            if (dist < minDist) { minDist = dist; closest = i; }
        });
        return closest;
    }

    function updateActive(index) {
        photos.forEach((p, i) => {
            p.style.opacity = i === index ? '1' : '0';
        });

        infos.forEach((info, i) => {
            info.style.opacity = i === index ? '1' : '0';
            info.style.position = i === index ? 'relative' : 'absolute';
        });

        dots.forEach((dot, i) => {
            dot.classList.toggle('w-6', i === index);
            dot.classList.toggle('bg-secondary', i === index);
            dot.classList.toggle('w-2', i !== index);
            dot.classList.toggle('bg-border', i !== index);
        });
    }

    let lastIndex = 0;

    // ── Klik card ──
    cards.forEach((card, i) => {
        card.addEventListener('click', () => {
            if (hasDragged) return;
            scrollToIndex(i);
            cancelAutoRotate();
            resumeAutoRotate();
        });
    });

    // ── Auto rotate ──
    const AUTO_INTERVAL = 3500;
    let autoTimer = null;

    function autoNext() {
        const next = (lastIndex + 1) % total;
        updateActive(next);
        lastIndex = next;
    }

    function resumeAutoRotate() {
        cancelAutoRotate();
        autoTimer = setInterval(autoNext, AUTO_INTERVAL);
    }

    function cancelAutoRotate() {
        if (autoTimer) { clearInterval(autoTimer); autoTimer = null; }
    }

    scrollEl.addEventListener('mouseenter', cancelAutoRotate);
    scrollEl.addEventListener('mouseleave', () => { if (!isDown) resumeAutoRotate(); });

    // Init
    updateActive(0);
    resumeAutoRotate();
}
// ─────────────────────────────────────────────────────────────────────────────

// ─── Magnetic button animation ───────────────────────────────────────────────
function initMagBtn(area) {
    if (area._magInit) return;
    area._magInit = true;

    const btn = area.querySelector('.mag-btn');
    if (!btn) return;

    area.addEventListener('mousemove', (e) => {
        const r = area.getBoundingClientRect();
        const x = (e.clientX - r.left - r.width / 2) * 0.15;
        const y = (e.clientY - r.top - r.height / 2) * 0.15;
        btn.style.transform = `translate(${x}px, ${y}px) scale(1.06)`;
        btn.style.transition = 'transform 0.1s ease';
    });

    area.addEventListener('mouseleave', () => {
        btn.style.transform = 'translate(0, 0) scale(1)';
        btn.style.transition = 'transform 0.4s ease';
    });
}

function scanAndInit() {
    document.querySelectorAll('.mag-area').forEach(initMagBtn);
}

scanAndInit();

new MutationObserver((mutations) => {
    let shouldScan = false;
    mutations.forEach(mutation => {
        mutation.addedNodes.forEach(node => {
            if (node.nodeType !== 1) return;
            if (node.classList?.contains('mag-area') || node.querySelector?.('.mag-area')) {
                shouldScan = true;
            }
        });
        if (mutation.type === 'childList' && mutation.target.querySelector?.('.mag-area')) {
            shouldScan = true;
        }
    });
    if (shouldScan) scanAndInit();
}).observe(document.body, { childList: true, subtree: true });
// ─────────────────────────────────────────────────────────────────────────────


// ── Scroll-driven timeline line ──────────────────────────────────────────────
(function () {
    function animateCount(el, target, duration) {
        const start = performance.now();
        (function tick(now) {
            const p = Math.min((now - start) / duration, 1);
            const ease = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.round(ease * target);
            if (p < 1) requestAnimationFrame(tick);
        })(start);
    }

    function initTimeline() {
        const section = document.getElementById('story-section');
        if (!section) return;

        // ── Deteksi mobile/desktop ──
        function isMobile() {
            return window.innerWidth < 768; // md breakpoint Tailwind
        }

        // ── Ambil elemen fill & track sesuai breakpoint ──
        function getLineEls() {
            if (isMobile()) {
                const fill = document.getElementById('timeline-line-fill-mobile');
                return { fill, track: fill?.parentElement };
            } else {
                const fill = document.getElementById('timeline-line-fill');
                return { fill, track: fill?.parentElement };
            }
        }

        // ── Ambil semua timeline items (mobile + desktop, tapi hanya yang visible) ──
        function getVisibleItems() {
            if (isMobile()) {
                return document.querySelectorAll('#timeline-wrapper .timeline-item-mobile');
            } else {
                return document.querySelectorAll('#timeline-wrapper .timeline-item');
            }
        }

        function updateLine() {
            const { fill, track } = getLineEls();
            if (!fill || !track) return;

            const trackRect = track.getBoundingClientRect();
            const vh = window.innerHeight;

            const pct = Math.min(Math.max(
                (vh * 0.5 - trackRect.top) / trackRect.height, 0
            ), 1) * 100;

            fill.style.height = pct + '%';

            const lineBottom = trackRect.top + (trackRect.height * pct / 100);

            const items = getVisibleItems();

            items.forEach((item) => {
                const rect = item.getBoundingClientRect();

                // ── Fade in item saat masuk viewport ──
                if (rect.top < vh * 0.88) {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';

                    const dot = item.querySelector('[data-dot]');
                    const badge = item.querySelector('.tl-index-badge');

                    if (dot && dot.style.transform.indexOf('scale(1)') === -1) {
                        setTimeout(() => {
                            dot.style.transform = 'scale(1)';
                            dot.style.opacity = '1';
                        }, 100);
                    }
                    if (badge && badge.style.transform !== 'scale(1)') {
                        setTimeout(() => {
                            badge.style.opacity = '1';
                            badge.style.transform = 'scale(1)';
                        }, 220);
                    }
                }

                // ── Dot glow saat garis mencapainya ──
                const dot = item.querySelector('[data-dot]');
                if (dot) {
                    const dotRect = dot.getBoundingClientRect();
                    const dotCenter = dotRect.top + dotRect.height / 2;
                    const inner = dot.querySelector('.dot-inner');
                    const icon = inner?.querySelector('.ti');

                    if (lineBottom >= dotCenter) {
                        if (!dot._pulsed) {
                            dot._pulsed = true;
                            inner.style.transition = 'background 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease';
                            inner.style.background = '';
                            inner.style.borderColor = 'var(--color-secondary)';
                            inner.style.boxShadow = '0 0 8px 2px var(--color-secondary), 0 0 20px 4px var(--color-secondary)';
                            if (icon) icon.style.color = '';
                        }
                    } else {
                        if (dot._pulsed) {
                            dot._pulsed = false;
                            inner.style.transition = 'background 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease';
                            inner.style.background = '';
                            inner.style.borderColor = '';
                            inner.style.boxShadow = '';
                            if (icon) icon.style.color = '';
                        }
                    }
                }
            });
        }

        window.addEventListener('scroll', updateLine, { passive: true });
        window.addEventListener('resize', updateLine); // re-check saat resize (mobile <-> desktop)
        updateLine();
    }

    // ── Counter + timeline trigger via IntersectionObserver ──
    const section = document.getElementById('story-section');
    let countersRan = false;
    let timelineInited = false;

    const io = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;

            if (!countersRan) {
                countersRan = true;
                document.querySelectorAll('#story-section .stat-item').forEach((item, i) => {
                    const target = parseInt(item.dataset.target);
                    const numEl = item.querySelector('.stat-number');
                    setTimeout(() => animateCount(numEl, target, 1200), i * 120);
                });
            }

            if (!timelineInited) {
                timelineInited = true;
                initTimeline();
            }

            io.unobserve(entry.target);
        });
    }, { threshold: 0.1 });

    if (section) io.observe(section);

})();
// ─────────────────────────────────────────────────────────────────────────────