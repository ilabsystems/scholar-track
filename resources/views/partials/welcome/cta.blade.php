{{-- ═══════════════════════════════════════════════════
     FINAL CTA BANNER
═══════════════════════════════════════════════════ --}}
<section class="py-20 px-6 lg:px-12 bg-gradient-to-br from-blue-600 to-indigo-700">
    <div class="max-w-3xl mx-auto text-center space-y-6">
        <h2 class="text-4xl font-extrabold text-white">Ready to Begin?</h2>
        <p class="text-blue-200 text-lg">Applications close on <strong class="text-white">March 31, 2026</strong>. Don't miss your chance.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="bg-white text-blue-700 px-10 py-4 rounded-xl font-extrabold text-base hover:bg-blue-50 hover:scale-105 transition-all shadow-xl">
                    Apply Now &rarr;
                </a>
            @endif
            <a href="{{ route('track') }}"
               class="bg-white/10 text-white border-2 border-white/30 px-10 py-4 rounded-xl font-bold text-base hover:bg-white/20 transition-all">
                Track Application
            </a>
        </div>
    </div>
</section>
