{{-- ═══════════════════════════════════════════════════
     ELIGIBILITY PRE-CHECKER
═══════════════════════════════════════════════════ --}}
<section id="eligibility" class="py-20 px-6 lg:px-12 bg-white">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <span class="text-blue-600 font-bold text-xs uppercase tracking-widest">Pre-Screening Tool</span>
            <h2 class="text-3xl font-extrabold text-slate-900 mt-2">Can I Apply?</h2>
            <p class="text-slate-500 mt-3 max-w-xl mx-auto">Toggle each condition that applies to you. The Apply button activates when you meet all basic eligibility requirements.</p>
        </div>

        <div class="bg-slate-50 rounded-3xl p-8 border border-slate-200 space-y-5">

            @php
            $criteria = [
                ['key' => 'resident', 'color' => 'blue', 'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'I am a registered resident of Aparri, Cagayan.', 'sub' => 'Verified by a Barangay Certificate of Residency from Aparri'],
                ['key' => 'gwa', 'color' => 'yellow', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'label' => 'My General Weighted Average (GWA) is 85% or higher.', 'sub' => 'Supported by latest Grade Slip or Transcript of Records'],
                ['key' => 'income', 'color' => 'green', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'My family\'s gross annual income is below ₱200,000.', 'sub' => 'Verified by Certificate of Indigency or ITR'],
                ['key' => 'enrolled', 'color' => 'purple', 'icon' => 'M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z', 'label' => 'I am enrolled in a CHED-accredited college or university.', 'sub' => 'Must be currently enrolled for S.Y. 2026–2027'],
            ];
            $colorMap = [
                'blue'   => 'bg-blue-100 text-blue-600',
                'yellow' => 'bg-yellow-100 text-yellow-600',
                'green'  => 'bg-green-100 text-green-600',
                'purple' => 'bg-purple-100 text-purple-600',
            ];
            @endphp

            @foreach ($criteria as $c)
            <div class="flex items-center justify-between bg-white rounded-2xl px-6 py-4 border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 {{ $colorMap[$c['color']] }} rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $c['icon'] }}"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold text-slate-800">{{ $c['label'] }}</p>
                        <p class="text-xs text-slate-400 mt-0.5">{{ $c['sub'] }}</p>
                    </div>
                </div>
                <label class="relative inline-block w-12 h-7 shrink-0 cursor-pointer ml-4">
                    <input type="checkbox" class="sr-only eligibility-toggle" data-key="{{ $c['key'] }}">
                    <div class="toggle-track w-12 h-7 bg-slate-200 rounded-full relative">
                        <div class="toggle-thumb absolute top-1 left-1 w-5 h-5 bg-white rounded-full shadow"></div>
                    </div>
                </label>
            </div>
            @endforeach

            {{-- Result CTA --}}
            <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-slate-200">
                <p id="eligibility-message" class="text-sm text-slate-500 font-medium">
                    Toggle all conditions above to check your eligibility.
                </p>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       id="eligibility-cta"
                       class="cta-glow inline-block bg-slate-300 text-slate-500 px-8 py-3.5 rounded-xl font-bold text-sm cursor-not-allowed pointer-events-none transition-all select-none whitespace-nowrap">
                        Apply Now
                    </a>
                @endif
            </div>

        </div>
    </div>
</section>
