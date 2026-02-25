{{-- ═══════════════════════════════════════════════════
     JAVASCRIPT
═══════════════════════════════════════════════════ --}}
<script>
// ── Deadline Countdown ────────────────────────────────────────────────────────
const DEADLINE = new Date('{{ $deadline->toIso8601String() }}');

function tick() {
    const diff = DEADLINE - new Date();
    if (diff <= 0) {
        document.getElementById('countdown').innerHTML =
            '<p class="text-red-400 font-bold text-sm">Application window has closed.</p>';
        return;
    }
    document.getElementById('cd-days').textContent  = String(Math.floor(diff / 86400000)).padStart(2,'0');
    document.getElementById('cd-hours').textContent = String(Math.floor((diff % 86400000) / 3600000)).padStart(2,'0');
    document.getElementById('cd-mins').textContent  = String(Math.floor((diff % 3600000)  / 60000)).padStart(2,'0');
    document.getElementById('cd-secs').textContent  = String(Math.floor((diff % 60000)    / 1000)).padStart(2,'0');
}
tick();
setInterval(tick, 1000);

// ── Stat Count-Up (triggered by IntersectionObserver) ─────────────────────────
function animateNum(el, target, isCurrency) {
    const duration = 1800;
    const start    = performance.now();
    (function step(now) {
        const p = Math.min((now - start) / duration, 1);
        const v = target * (1 - Math.pow(1 - p, 3));
        el.textContent = isCurrency
            ? '\u20B1' + v.toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 })
            : Math.floor(v).toLocaleString();
        if (p < 1) requestAnimationFrame(step);
    })(start);
}

let statsAnimated = false;
new IntersectionObserver((entries) => {
    if (!entries[0].isIntersecting || statsAnimated) return;
    statsAnimated = true;
    document.querySelectorAll('.stat-number').forEach(el =>
        animateNum(el, parseInt(el.dataset.target, 10), false));
    animateNum(document.getElementById('budget-stat'), {{ (int) $stats['budget_released'] }}, true);
}, { threshold: 0.3 }).observe(document.getElementById('stats'));

// ── Eligibility Pre-Checker ────────────────────────────────────────────────────
const TOGGLES   = document.querySelectorAll('.eligibility-toggle');
const CTA_BTN   = document.getElementById('eligibility-cta');
const CTA_MSG   = document.getElementById('eligibility-message');

function evalEligibility() {
    const met   = [...TOGGLES].filter(t => t.checked).length;
    const total = TOGGLES.length;
    if (met === total) {
        CTA_BTN.classList.replace('bg-slate-300','bg-blue-600');
        CTA_BTN.classList.replace('text-slate-500','text-white');
        CTA_BTN.classList.remove('cursor-not-allowed','pointer-events-none');
        CTA_BTN.classList.add('cursor-pointer','pointer-events-auto','active','hover:bg-blue-700');
        CTA_MSG.textContent  = '\u2705 You appear to meet all basic eligibility criteria!';
        CTA_MSG.className    = 'text-sm text-emerald-600 font-semibold';
    } else {
        CTA_BTN.classList.replace('bg-blue-600','bg-slate-300');
        CTA_BTN.classList.replace('text-white','text-slate-500');
        CTA_BTN.classList.add('cursor-not-allowed','pointer-events-none');
        CTA_BTN.classList.remove('cursor-pointer','pointer-events-auto','active','hover:bg-blue-700');
        CTA_MSG.textContent = met + ' of ' + total + ' criteria met. ' + (total - met) + ' more needed.';
        CTA_MSG.className   = 'text-sm text-slate-500 font-medium';
    }
}
TOGGLES.forEach(t => t.addEventListener('change', evalEligibility));

// ── FAQ Accordion ──────────────────────────────────────────────────────────────
function toggleFaq(btn) {
    const answer = btn.nextElementSibling;
    const icon   = btn.querySelector('.faq-icon');
    const isOpen = answer.classList.contains('open');

    document.querySelectorAll('.faq-answer.open').forEach(a => {
        a.classList.remove('open');
        a.previousElementSibling.querySelector('.faq-icon').style.transform = '';
    });

    if (!isOpen) {
        answer.classList.add('open');
        icon.style.transform = 'rotate(180deg)';
    }
}

// ── FAQ Live Search ────────────────────────────────────────────────────────────
document.getElementById('faq-search').addEventListener('input', function () {
    const q   = this.value.trim().toLowerCase();
    let shown = 0;
    document.querySelectorAll('.faq-item').forEach(item => {
        const match = !q || item.dataset.question.includes(q);
        item.style.display = match ? '' : 'none';
        if (match) shown++;
    });
    document.getElementById('faq-no-results').classList.toggle('hidden', shown > 0);
});

// ── Smooth Scroll ──────────────────────────────────────────────────────────────
document.querySelectorAll('a[href^="#"]').forEach(a =>
    a.addEventListener('click', e => {
        const el = document.querySelector(a.getAttribute('href'));
        if (el) { e.preventDefault(); el.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
    })
);
</script>
