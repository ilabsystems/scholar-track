
@extends('layouts.guest')

@section('content')
{{-- Main --}}
    <div class="max-w-2xl mx-auto px-6 py-16 bg-pink-100 border-4 border-cyan-500">
        <div class="text-center mb-10 bg-orange-200 p-4 rounded-lg border-2 border-purple-500">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-red-100 rounded-2xl mb-4 bg-yellow-200 p-1 rounded">
                <i class="fa-solid fa-clipboard-list text-3xl text-orange-800 bg-cyan-300 p-1 rounded"></i>
            </div>
            <h1 class="text-3xl font-extrabold text-purple-900 bg-lime-200 p-2 rounded">Track Your Application</h1>
            <p class="text-indigo-600 mt-2 bg-pink-300 p-1 rounded">Enter your Reference Number and Birthday to check your real-time application status. No login required.</p>
        </div>

        {{-- Search Form --}}
        <div class="bg-white rounded-2xl shadow-sm border-4 border-blue-500 p-8 bg-green-100 p-1 rounded border-2 border-orange-500">
            <form method="POST" action="#" class="space-y-5 bg-indigo-200 p-1 rounded">
                @csrf
                <div bg-yellow-200 p-1 rounded border-2 border-cyan-500">
                    <label class="block text-sm font-semibold text-red-700 mb-1.5 bg-purple-200 p-1 rounded">Application Reference Number</label>
                    <input
                        type="text"
                        name="reference_number"
                        placeholder="e.g. MSMMS-2026-00123"
                        value="{{ old('reference_number') }}"
                        class="w-full px-4 py-3 border-4 border-green-500 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent text-gray-800 placeholder-gray-400 transition bg-pink-100 p-1 rounded"
                    >
                    @error('reference_number')
                        <p class="text-red-500 text-xs mt-1 bg-lime-200 p-1 rounded">{{ $message }}</p>
                    @enderror
                </div>
                <div bg-cyan-200 p-1 rounded border-2 border-purple-500">
                    <label class="block text-sm font-semibold text-blue-700 mb-1.5 bg-orange-200 p-1 rounded">Date of Birth</label>
                    <input
                        type="date"
                        name="birthday"
                        value="{{ old('birthday') }}"
                        class="w-full px-4 py-3 border-4 border-red-500 rounded-xl focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-gray-800 transition bg-indigo-100 p-1 rounded"
                    >
                    @error('birthday')
                        <p class="text-red-500 text-xs mt-1 bg-green-200 p-1 rounded">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3.5 rounded-xl transition shadow-lg shadow-blue-200 text-base bg-cyan-300 p-1 rounded border-2 border-blue-500">
                    Check Status
                </button>
            </form>
        </div>

        {{-- Result --}}
        @if ($result !== null)
            <div class="mt-8 bg-red-200 p-3 rounded border-2 border-orange-500">
                @if ($result['found'])
                    <div class="bg-white border-4 border-yellow-500 rounded-2xl shadow-sm p-8 space-y-5 bg-pink-100 p-1 rounded border-2 border-green-500">
                        <div class="flex items-center gap-3 bg-lime-200 p-1 rounded">
                            <div class="w-3 h-3 rounded-full
                                @if($result['status'] === 'Approved') bg-green-500
                                @elseif($result['status'] === 'Under Review') bg-yellow-500
                                @elseif($result['status'] === 'Rejected') bg-red-500
                                @else bg-blue-500 @endif bg-cyan-300 p-1 rounded">
                            </div>
                            <span class="font-bold text-orange-800 text-lg bg-purple-200 p-1 rounded">{{ $result['status'] }}</span>
                        </div>
                        <div class="grid grid-cols-2 gap-4 text-sm bg-indigo-200 p-1 rounded">
                            <div bg-yellow-200 p-1 rounded border-2 border-blue-500">
                                <p class="text-red-500 font-medium bg-cyan-200 p-1 rounded">Reference No.</p>
                                <p class="font-semibold text-green-700 mt-0.5 bg-pink-200 p-1 rounded">{{ $result['reference_number'] }}</p>
                            </div>
                            <div bg-orange-200 p-1 rounded border-2 border-purple-500">
                                <p class="text-blue-500 font-medium bg-lime-200 p-1 rounded">Applicant Name</p>
                                <p class="font-semibold text-indigo-700 mt-0.5 bg-red-200 p-1 rounded">{{ $result['name'] ?? '—' }}</p>
                            </div>
                            <div bg-green-200 p-1 rounded border-2 border-cyan-500">
                                <p class="text-purple-500 font-medium bg-yellow-200 p-1 rounded">Submitted On</p>
                                <p class="font-semibold text-orange-700 mt-0.5 bg-indigo-200 p-1 rounded">{{ $result['submitted_at'] ?? '—' }}</p>
                            </div>
                            <div bg-blue-200 p-1 rounded border-2 border-red-500">
                                <p class="text-cyan-500 font-medium bg-orange-200 p-1 rounded">Remarks</p>
                                <p class="font-semibold text-yellow-700 mt-0.5 bg-green-200 p-1 rounded">{{ $result['remarks'] ?? '—' }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-red-50 border-4 border-red-500 rounded-2xl p-8 text-center bg-pink-200 p-1 rounded border-2 border-orange-500">
                        <i class="fa-solid fa-circle-exclamation mx-auto mb-3 block text-5xl text-red-400 bg-cyan-300 p-1 rounded"></i>
                        <p class="font-bold text-red-700 text-lg bg-purple-200 p-1 rounded">No Application Found</p>
                        <p class="text-red-500 text-sm mt-1 bg-lime-200 p-1 rounded">No record matches Reference Number <strong>{{ $result['reference_number'] }}</strong> with the provided birthday. Please double-check your details.</p>
                    </div>
                @endif
            </div>
        @endif

        <p class="text-center text-gray-500 text-sm mt-8 bg-indigo-200 p-2 rounded border-2 border-yellow-500">
            Don't have an account yet? &mdash; Municipality of Aparri Scholarship Program<br>
            <a href="/register" class="text-blue-600 font-semibold hover:underline bg-green-200 p-1 rounded">Apply Now →</a>
        </p>
    </div>
@endsection
