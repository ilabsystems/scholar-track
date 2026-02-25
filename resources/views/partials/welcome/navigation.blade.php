{{-- ═══════════════════════════════════════════════════
     STICKY NAVIGATION
═══════════════════════════════════════════════════ --}}
<nav id="navbar" class="bg-white/90 backdrop-blur-md shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-4 flex items-center justify-between gap-6">

        {{-- Brand --}}
        <a href="/" class="flex items-center gap-3 shrink-0">
            <div class="bg-blue-600 h-11 w-11 rounded-xl flex items-center justify-center shadow-lg shadow-blue-300">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0121 21H3a12.083 12.083 0 012.84-10.422L12 14z"/>
                </svg>
            </div>
            <div class="leading-none">
                <p class="font-extrabold text-blue-900 text-base tracking-tight">MSMMS</p>
                <p class="text-[11px] text-gray-400 uppercase tracking-widest mt-0.5">Municipality of Aparri</p>
            </div>
        </a>

        {{-- Desktop nav links --}}
        <div class="hidden md:flex items-center gap-8 font-medium text-slate-600 text-sm">
            <a href="#eligibility"  class="hover:text-blue-600 transition">Eligibility</a>
            <a href="#requirements" class="hover:text-blue-600 transition">Requirements</a>
            <a href="#stats"        class="hover:text-blue-600 transition">Impact</a>
            <a href="#faq"          class="hover:text-blue-600 transition">FAQ</a>
            <a href="#news"         class="hover:text-blue-600 transition">News</a>
        </div>

        {{-- Auth CTA --}}
        <div class="flex items-center gap-3 shrink-0">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="hidden sm:inline-block px-5 py-2 text-blue-600 font-semibold text-sm hover:bg-blue-50 rounded-lg transition">
                       Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="hidden sm:inline-block px-5 py-2 text-blue-600 font-semibold text-sm hover:bg-blue-50 rounded-lg transition">
                       Login
                    </a>
                @endauth
            @endif
            <a href="/renewal"
               class="hidden md:inline-flex items-center gap-2 px-4 py-2 text-emerald-700 bg-emerald-50 border border-emerald-200 font-semibold text-sm rounded-lg hover:bg-emerald-100 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Renewal Portal
            </a>
            @if (Route::has('register'))
                @guest
                    <a href="{{ route('register') }}"
                       class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold text-sm shadow-lg shadow-blue-200">
                       Get Started
                    </a>
                @endguest
            @endif
        </div>
    </div>
</nav>
