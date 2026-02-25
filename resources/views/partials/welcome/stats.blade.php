{{-- ═══════════════════════════════════════════════════
     REAL-TIME TRANSPARENCY STATS
═══════════════════════════════════════════════════ --}}
<section id="stats" class="py-20 px-6 lg:px-12 bg-blue-600">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <span class="text-blue-200 font-bold text-xs uppercase tracking-widest">By the Numbers</span>
            <h2 class="text-3xl font-extrabold text-white mt-2">Transparent. Accountable. Impactful.</h2>
            <p class="text-blue-200 mt-3 max-w-xl mx-auto">Live figures from the scholarship database, updated every semester.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 text-white text-center border border-white/10">
                <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <p class="text-5xl font-extrabold stat-number" data-target="{{ $stats['total_scholars'] }}">0</p>
                <p class="text-blue-200 font-medium mt-2">Total Scholars Served</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 text-white text-center border border-white/10">
                <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <p class="text-5xl font-extrabold" id="budget-stat">&#8369;0</p>
                <p class="text-blue-200 font-medium mt-2">Total Budget Released</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 text-white text-center border border-white/10">
                <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/></svg>
                </div>
                <p class="text-5xl font-extrabold stat-number" data-target="{{ $stats['partner_schools'] }}">0</p>
                <p class="text-blue-200 font-medium mt-2">Active Partner Schools</p>
            </div>
        </div>
    </div>
</section>
