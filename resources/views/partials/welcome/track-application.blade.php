
    {{-- Main --}}
    <div class="max-w-2xl mx-auto px-6 py-16">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-2xl mb-4">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
            <h1 class="text-3xl font-extrabold text-slate-900">Track Your Application</h1>
            <p class="text-slate-500 mt-2">Enter your Reference Number and Birthday to check your real-time application status. No login required.</p>
        </div>

        {{-- Search Form --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
            <form method="POST" action="#" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Application Reference Number</label>
                    <input
                        type="text"
                        name="reference_number"
                        placeholder="e.g. MSMMS-2026-00123"
                        value="{{ old('reference_number') }}"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-slate-800 placeholder-slate-400 transition"
                    >
                    @error('reference_number')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Date of Birth</label>
                    <input
                        type="date"
                        name="birthday"
                        value="{{ old('birthday') }}"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-slate-800 transition"
                    >
                    @error('birthday')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-xl transition shadow-lg shadow-blue-200 text-base">
                    Check Status
                </button>
            </form>
        </div>

        {{-- Result --}}
        @if ($result !== null)
            <div class="mt-8">
                @if ($result['found'])
                    <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-8 space-y-5">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded-full
                                @if($result['status'] === 'Approved') bg-green-500
                                @elseif($result['status'] === 'Under Review') bg-yellow-500
                                @elseif($result['status'] === 'Rejected') bg-red-500
                                @else bg-blue-500 @endif">
                            </div>
                            <span class="font-bold text-slate-800 text-lg">{{ $result['status'] }}</span>
                        </div>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-slate-400 font-medium">Reference No.</p>
                                <p class="font-semibold text-slate-700 mt-0.5">{{ $result['reference_number'] }}</p>
                            </div>
                            <div>
                                <p class="text-slate-400 font-medium">Applicant Name</p>
                                <p class="font-semibold text-slate-700 mt-0.5">{{ $result['name'] ?? '—' }}</p>
                            </div>
                            <div>
                                <p class="text-slate-400 font-medium">Submitted On</p>
                                <p class="font-semibold text-slate-700 mt-0.5">{{ $result['submitted_at'] ?? '—' }}</p>
                            </div>
                            <div>
                                <p class="text-slate-400 font-medium">Remarks</p>
                                <p class="font-semibold text-slate-700 mt-0.5">{{ $result['remarks'] ?? '—' }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-red-50 border border-red-100 rounded-2xl p-8 text-center">
                        <svg class="w-12 h-12 text-red-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="font-bold text-red-700 text-lg">No Application Found</p>
                        <p class="text-red-500 text-sm mt-1">No record matches Reference Number <strong>{{ $result['reference_number'] }}</strong> with the provided birthday. Please double-check your details.</p>
                    </div>
                @endif
            </div>
        @endif

        <p class="text-center text-slate-400 text-sm mt-8">
            Don't have an account yet? &mdash; Municipality of Aparri Scholarship Program<br>
            <a href="/register" class="text-blue-600 font-semibold hover:underline">Apply Now →</a>
        </p>
    </div>
