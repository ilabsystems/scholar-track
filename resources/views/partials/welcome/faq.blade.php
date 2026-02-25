{{-- ═══════════════════════════════════════════════════
     FAQ WITH DYNAMIC SEARCH
═══════════════════════════════════════════════════ --}}
<section id="faq" class="py-20 px-6 lg:px-12 bg-slate-50">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-10">
            <span class="text-blue-600 font-bold text-xs uppercase tracking-widest">Help Center</span>
            <h2 class="text-3xl font-extrabold text-slate-900 mt-2">Frequently Asked Questions</h2>
            <p class="text-slate-500 mt-3">Type a keyword to filter. Can't find your answer? Contact the Scholarship Office.</p>
        </div>

        <div class="relative mb-8">
            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input
                type="text"
                id="faq-search"
                placeholder="Search questions… e.g. 'PSA', 'GWA', 'deadline', 'renewal'"
                class="w-full pl-12 pr-4 py-3.5 bg-white border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-slate-700 placeholder-slate-400 shadow-sm"
            >
        </div>

        <div id="faq-list" class="space-y-3">
            @foreach ($faqs as $faq)
            <div class="faq-item bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm"
                 data-question="{{ strtolower($faq['q']) }} {{ strtolower($faq['a']) }}">
                <button onclick="toggleFaq(this)"
                        class="w-full text-left px-6 py-4 flex items-center justify-between gap-4 hover:bg-slate-50 transition">
                    <span class="font-semibold text-slate-800 text-sm leading-snug">{{ $faq['q'] }}</span>
                    <svg class="faq-icon w-5 h-5 text-slate-400 shrink-0 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-answer px-6 pb-0 text-sm text-slate-600 leading-relaxed">
                    <div class="pb-5 border-t border-slate-100 pt-4">{{ $faq['a'] }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <p id="faq-no-results" class="text-center text-slate-400 text-sm mt-6 hidden">
            No questions match your search.
            <a href="mailto:scholarship@municipality.gov.ph" class="text-blue-600 font-semibold hover:underline">Contact us</a> directly.
        </p>
    </div>
</section>
