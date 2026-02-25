{{-- ═══════════════════════════════════════════════════
     FOOTER
═══════════════════════════════════════════════════ --}}
<footer class="bg-slate-900 text-slate-400 px-6 lg:px-12 py-12">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between gap-8">
        <div class="max-w-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="bg-blue-600 h-9 w-9 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/></svg>
                </div>
                <span class="font-extrabold text-white text-base">MSMMS</span>
            </div>
            <p class="text-sm leading-relaxed">Municipality of Aparri Scholarship Management and Monitoring System. Empowering Aparri students through transparent, accessible education grants.</p>
        </div>
        <div class="flex flex-wrap gap-12 text-sm">
            <div>
                <p class="text-white font-semibold mb-3">Portal</p>
                <ul class="space-y-2">
                    @if (Route::has('register'))<li><a href="{{ route('register') }}" class="hover:text-white transition">Apply Now</a></li>@endif
                    <li><a href="{{ route('track') }}" class="hover:text-white transition">Track Application</a></li>
                    <li><a href="/renewal" class="hover:text-white transition">Renewal Portal</a></li>
                    @if (Route::has('login'))<li><a href="{{ route('login') }}" class="hover:text-white transition">Login</a></li>@endif
                </ul>
            </div>
            <div>
                <p class="text-white font-semibold mb-3">Information</p>
                <ul class="space-y-2">
                    <li><a href="#eligibility"  class="hover:text-white transition">Eligibility</a></li>
                    <li><a href="#requirements" class="hover:text-white transition">Requirements</a></li>
                    <li><a href="#faq"          class="hover:text-white transition">FAQ</a></li>
                    <li><a href="#news"         class="hover:text-white transition">Announcements</a></li>
                </ul>
            </div>
            <div>
                <p class="text-white font-semibold mb-3">Contact</p>
                <ul class="space-y-2">
                    <li>Scholarship Office</li>
                    <li><a href="mailto:scholarship@aparri.gov.ph" class="hover:text-white transition">scholarship@aparri.gov.ph</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto border-t border-slate-800 mt-10 pt-6 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs">
        <p>&copy; {{ date('Y') }} Municipality of Aparri, Cagayan. All rights reserved.</p>
        <p>MSMMS v1.0 &mdash; Powered by Laravel</p>
    </div>
</footer>
