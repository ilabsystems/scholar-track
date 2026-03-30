@extends('peso.layout')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Employment Reports</h1>
        <p class="mt-1 text-sm text-gray-500">Graduate employment outcomes and program impact summary.</p>
    </div>
    <button class="inline-flex items-center px-4 py-2 bg-slate-900 text-white text-sm font-medium rounded-md hover:bg-slate-700">
        <i class="fas fa-download mr-2"></i> Export Report
    </button>
</div>

{{-- Summary Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach ([
        ['label' => 'Total Graduates',  'value' => '0',  'icon' => 'fa-user-graduate',  'color' => 'bg-orange-100 text-orange-600'],
        ['label' => 'Employed',         'value' => '0',  'icon' => 'fa-briefcase',       'color' => 'bg-green-100 text-green-600'],
        ['label' => 'Employment Rate',  'value' => '0%', 'icon' => 'fa-chart-line',      'color' => 'bg-blue-100 text-blue-600'],
        ['label' => 'Total Referrals',  'value' => '0',  'icon' => 'fa-handshake',       'color' => 'bg-purple-100 text-purple-600'],
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
    {{-- Employment Status Distribution --}}
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-base font-semibold text-gray-800">Employment Status Distribution</h2>
            <p class="text-xs text-gray-500 mt-0.5">Breakdown of all graduate outcomes</p>
        </div>
        <div class="p-6 space-y-4">
            @foreach ([
                ['label' => 'Employed (Regular)',     'count' => 0, 'color' => 'bg-green-500',  'pct' => 0],
                ['label' => 'Employed (Contractual)', 'count' => 0, 'color' => 'bg-teal-400',   'pct' => 0],
                ['label' => 'Self-Employed',          'count' => 0, 'color' => 'bg-blue-400',   'pct' => 0],
                ['label' => 'Unemployed / Seeking',   'count' => 0, 'color' => 'bg-yellow-400', 'pct' => 0],
                ['label' => 'Continuing Studies',     'count' => 0, 'color' => 'bg-purple-400', 'pct' => 0],
            ] as $item)
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span class="text-gray-600">{{ $item['label'] }}</span>
                    <span class="font-medium text-gray-900">{{ $item['count'] }}</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-2.5">
                    <div class="{{ $item['color'] }} h-2.5 rounded-full transition-all" style="width: {{ $item['pct'] }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Referral & Assistance Summary --}}
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-base font-semibold text-gray-800">Referral & Assistance Summary</h2>
            <p class="text-xs text-gray-500 mt-0.5">Types of job support provided to graduates</p>
        </div>
        <div class="p-6 space-y-3">
            @foreach ([
                ['label' => 'Job Referrals',        'count' => 0, 'icon' => 'fa-external-link-alt', 'color' => 'text-orange-500'],
                ['label' => 'Job Fair Participants', 'count' => 0, 'icon' => 'fa-people-arrows',      'color' => 'text-blue-500'],
                ['label' => 'Skills Training',      'count' => 0, 'icon' => 'fa-tools',              'color' => 'text-green-500'],
                ['label' => 'Livelihood Programs',  'count' => 0, 'icon' => 'fa-seedling',           'color' => 'text-teal-500'],
                ['label' => 'Resume Assistance',    'count' => 0, 'icon' => 'fa-file-alt',           'color' => 'text-purple-500'],
            ] as $row)
            <div class="flex items-center justify-between py-2 border-b border-gray-50 last:border-0">
                <div class="flex items-center gap-2">
                    <i class="fas {{ $row['icon'] }} {{ $row['color'] }} w-4 text-center"></i>
                    <span class="text-sm text-gray-700">{{ $row['label'] }}</span>
                </div>
                <span class="text-sm font-semibold text-gray-900">{{ $row['count'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Graduate Employment History Table --}}
<div class="mt-6 bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
        <h2 class="text-base font-semibold text-gray-800">Graduate Employment History</h2>
        <select class="text-xs border border-gray-300 rounded px-2 py-1 focus:outline-none focus:ring-1 focus:ring-orange-400">
            <option>All Years</option>
        </select>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Graduate</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Course</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Employer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Position</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-sm text-gray-400">
                        No employment records yet.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
