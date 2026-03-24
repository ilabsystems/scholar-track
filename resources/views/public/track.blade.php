
@extends('layouts.guest')

@section('content')
{{-- Main --}}
    <div class="max-w-2xl mx-auto px-6 py-16">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-2xl mb-4">
                <i class="fa-solid fa-clipboard-list text-3xl text-blue-800"></i>
            </div>
            <h1 class="text-3xl font-extrabold text-gray-900">Track Your Application</h1>
            <p class="text-gray-600 mt-2">Enter your Reference Number and Birthday to check your real-time application status. No login required.</p>
        </div>

        {{-- Search Form --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form method="POST" action="#" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Application Reference Number</label>
                    <input
                        type="text"
                        name="reference_number"
                        placeholder="e.g. MSMMS-2026-00123"
                        value="{{ old('reference_number') }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-800 placeholder-gray-400 transition"
                    >
                    @error('reference_number')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Date of Birth</label>
                    <input
                        type="date"
                        name="birthday"
                        value="{{ old('birthday') }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-800 transition"
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
                    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-8 space-y-5">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded-full
                                @if($result['status'] === 'Approved') bg-green-500
                                @elseif($result['status'] === 'Under Review') bg-yellow-500
                                @elseif($result['status'] === 'Rejected') bg-red-500
                                @else bg-blue-500 @endif">
                            </div>
                            <span class="font-bold text-gray-800 text-lg">{{ $result['status'] }}</span>
                        </div>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-gray-500 font-medium">Reference No.</p>
                                <p class="font-semibold text-gray-700 mt-0.5">{{ $result['reference_number'] }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 font-medium">Applicant Name</p>
                                <p class="font-semibold text-gray-700 mt-0.5">{{ $result['name'] ?? '—' }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 font-medium">Submitted On</p>
                                <p class="font-semibold text-gray-700 mt-0.5">{{ $result['submitted_at'] ?? '—' }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 font-medium">Remarks</p>
                                <p class="font-semibold text-gray-700 mt-0.5">{{ $result['remarks'] ?? '—' }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-red-50 border border-red-100 rounded-2xl p-8 text-center">
                        <i class="fa-solid fa-circle-exclamation mx-auto mb-3 block text-5xl text-red-400"></i>
                        <p class="font-bold text-red-700 text-lg">No Application Found</p>
                        <p class="text-red-500 text-sm mt-1">No record matches Reference Number <strong>{{ $result['reference_number'] }}</strong> with the provided birthday. Please double-check your details.</p>
                    </div>
                @endif
            </div>
        @endif

        <p class="text-center text-gray-500 text-sm mt-8">
            Don't have an account yet? &mdash; Municipality of Aparri Scholarship Program<br>
            <a href="/register" class="text-blue-600 font-semibold hover:underline">Apply Now →</a>
        </p>
    </div>
@endsection
