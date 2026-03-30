@extends('municipality.layout')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Reports</h1>
        <p class="mt-1 text-sm text-gray-500">Applicant counts, scholar counts, and fund distribution.</p>
    </div>
    <button class="inline-flex items-center px-4 py-2 bg-slate-900 text-white text-sm font-medium rounded-md hover:bg-slate-700">
        <i class="fas fa-download mr-2"></i> Export Report
    </button>
</div>

{{-- Summary Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach ([
        ['label' => 'Total Applicants', 'value' => '0',  'icon' => 'fa-users',          'color' => 'bg-blue-100 text-blue-600'],
        ['label' => 'Active Scholars',  'value' => '0',  'icon' => 'fa-user-graduate',   'color' => 'bg-teal-100 text-teal-600'],
        ['label' => 'Graduates',        'value' => '0',  'icon' => 'fa-graduation-cap',  'color' => 'bg-green-100 text-green-600'],
        ['label' => 'Total Disbursed',  'value' => '₱0', 'icon' => 'fa-coins',           'color' => 'bg-yellow-100 text-yellow-600'],
    ] as $card)
    <div class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
        <div class="h-12 w-12 rounded-full {{ $card['color'] }} flex items-center justify-center shrink-0">
            <i class="fas {{ $card['icon'] }} text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500">{{ $card['label'] }}</p>
            <p class="text-2xl font-semibold text-gray-900">{{ $card['value'] }}</p>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
    {{-- Applicant & Scholar Counts --}}
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-base font-semibold text-gray-800">Applicant & Scholar Counts</h2>
            <p class="text-xs text-gray-500 mt-0.5">Breakdown by application status</p>
        </div>
        <div class="p-6 space-y-4">
            @foreach ([
                ['label' => 'New Applicants',    'count' => 0, 'badge' => 'bg-blue-100 text-blue-800'],
                ['label' => 'Under Review',      'count' => 0, 'badge' => 'bg-yellow-100 text-yellow-800'],
                ['label' => 'Approved / Active', 'count' => 0, 'badge' => 'bg-green-100 text-green-800'],
                ['label' => 'Rejected',          'count' => 0, 'badge' => 'bg-red-100 text-red-800'],
                ['label' => 'Graduated',         'count' => 0, 'badge' => 'bg-purple-100 text-purple-800'],
            ] as $row)
            <div class="flex items-center justify-between py-2 border-b border-gray-50 last:border-0">
                <span class="text-sm text-gray-700">{{ $row['label'] }}</span>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $row['badge'] }}">
                    {{ $row['count'] }}
                </span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Fund Distribution --}}
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-base font-semibold text-gray-800">Fund Distribution</h2>
            <p class="text-xs text-gray-500 mt-0.5">Resource allocation per scholarship program</p>
        </div>
        <div class="p-6">
            <div class="flex flex-col items-center justify-center py-10 text-gray-400">
                <i class="fas fa-chart-pie text-5xl mb-3 text-gray-300"></i>
                <p class="text-gray-500 font-medium">No fund data available</p>
                <p class="text-sm mt-1">Fund distribution will appear once scholarships are disbursed.</p>
            </div>

            {{-- Fund rows (shown when data exists) --}}
            {{--
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-700">Scholarship Program A</span>
                        <span class="font-medium">₱0 <span class="text-gray-400 font-normal">(0%)</span></span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2">
                        <div class="bg-teal-500 h-2 rounded-full" style="width: 0%"></div>
                    </div>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between text-sm font-medium">
                <span class="text-gray-700">Total Budget</span>
                <span class="text-gray-900">₱0</span>
            </div>
            --}}
        </div>
    </div>
</div>

{{-- Academic Performance Overview --}}
<div class="mt-6 bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
        <div>
            <h2 class="text-base font-semibold text-gray-800">Academic Performance Overview</h2>
            <p class="text-xs text-gray-500 mt-0.5">Scholar GWA distribution across all programs</p>
        </div>
        <a href="{{ route('municipality.compliance') }}" class="text-sm text-teal-600 hover:underline">View compliance details</a>
    </div>
    <div class="p-6 flex flex-col items-center justify-center py-12 text-gray-400">
        <i class="fas fa-chart-bar text-5xl mb-3 text-gray-300"></i>
        <p class="text-gray-500 font-medium">No academic data yet</p>
        <p class="text-sm mt-1">Data will populate once scholars submit their semester grades.</p>
    </div>
</div>
@endsection
