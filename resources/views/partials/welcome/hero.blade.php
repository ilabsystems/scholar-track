{{-- ═══════════════════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════════════════ --}}
<section class="bg-gradient-to-br from-blue-50 via-white to-indigo-50 pt-16 pb-24 px-6 lg:px-12 overflow-hidden">
    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-14 items-center">

        {{-- Left copy --}}
        <div class="space-y-6">
            <span class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                Open for Applications &middot; Aparri, Cagayan &middot; S.Y. 2026–2027
            </span>

            <h1 class="text-4xl lg:text-5xl font-extrabold text-slate-900 leading-tight">
                Invest in Your Future,<br>
                <span class="text-blue-600">Apply for Support.</span>
            </h1>

            <p class="text-lg text-slate-600 leading-relaxed max-w-lg">
                The <strong class="text-slate-800">Municipality of Aparri Scholarship Management and Monitoring System (MSMMS)</strong>
                provides a streamlined, transparent way for Aparri students to access financial education grants from the local government unit.
            </p>

            {{-- Deadline Countdown --}}
            <div class="bg-white border border-slate-200 rounded-2xl p-5 w-fit shadow-sm">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">Application Window Closes In</p>
                <div id="countdown" class="flex items-end gap-3">
                    <div class="text-center">
                        <div class="countdown-unit text-white text-2xl font-extrabold w-16 h-14 flex items-center justify-center rounded-xl" id="cd-days">--</div>
                        <p class="text-xs text-slate-400 font-medium mt-1">Days</p>
                    </div>
                    <div class="text-center">
                        <div class="countdown-unit text-white text-2xl font-extrabold w-16 h-14 flex items-center justify-center rounded-xl" id="cd-hours">--</div>
                        <p class="text-xs text-slate-400 font-medium mt-1">Hours</p>
                    </div>
                    <div class="text-center">
                        <div class="countdown-unit text-white text-2xl font-extrabold w-16 h-14 flex items-center justify-center rounded-xl" id="cd-mins">--</div>
                        <p class="text-xs text-slate-400 font-medium mt-1">Mins</p>
                    </div>
                    <div class="text-center">
                        <div class="countdown-unit text-white text-2xl font-extrabold w-16 h-14 flex items-center justify-center rounded-xl" id="cd-secs">--</div>
                        <p class="text-xs text-slate-400 font-medium mt-1">Secs</p>
                    </div>
                </div>
            </div>

            {{-- CTAs --}}
            <div class="flex flex-col sm:flex-row gap-4 pt-2">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="bg-blue-600 text-white px-8 py-4 rounded-xl font-bold text-base hover:bg-blue-700 hover:scale-105 transition-all text-center shadow-xl shadow-blue-200">
                        Start Application &rarr;
                    </a>
                @endif
                <a href="{{ route('track') }}"
                   class="bg-white border-2 border-slate-200 text-slate-700 px-8 py-4 rounded-xl font-bold text-base hover:bg-slate-50 hover:border-slate-300 transition-all text-center">
                    Track Application
                </a>
            </div>

            {{-- Renewal shortcut for mobile --}}
            <a href="/renewal"
               class="inline-flex items-center gap-2 text-emerald-700 font-semibold text-sm hover:underline md:hidden">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Existing scholar? Go to Renewal Portal
            </a>
        </div>

        {{-- Right illustration --}}
        <div class="relative hidden md:block">
            <div class="w-full h-96 bg-gradient-to-br from-blue-100 to-indigo-200 rounded-3xl shadow-2xl flex flex-col items-center justify-center gap-3 border border-blue-200">
                <svg class="w-24 h-24 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 14l6.16-3.422A12.083 12.083 0 0121 21H3a12.083 12.083 0 012.84-10.422L12 14z"/>
                </svg>
                <p class="text-blue-400 text-sm font-medium">Replace with a student / landmark photo</p>
                {{-- <img src="/student-hero-image.jpg" class="w-full h-full object-cover rounded-3xl" alt="Students Studying"> --}}
            </div>

            {{-- Floating budget badge --}}
            <div class="absolute -bottom-6 -left-6 bg-white p-5 rounded-2xl shadow-2xl flex items-center gap-4 border border-slate-100">
                <div class="bg-green-100 p-3 rounded-xl text-green-600 shrink-0">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium">Total Budget Released</p>
                    <p class="text-xl font-extrabold text-slate-800">&#8369;{{ number_format($stats['budget_released'], 2) }}</p>
                </div>
            </div>

            {{-- Floating scholar count badge --}}
            <div class="absolute -top-4 -right-4 bg-blue-600 text-white p-4 rounded-2xl shadow-xl text-center">
                <p class="text-2xl font-extrabold">{{ number_format($stats['total_scholars']) }}</p>
                <p class="text-xs font-medium opacity-80">Scholars</p>
            </div>
        </div>

    </div>
</section>
