@extends('municipality.layout')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Compliance Summary</h1>
    <p class="mt-1 text-sm text-gray-500">Academic standing and semester compliance across all scholars.</p>
</div>

{{-- Summary Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach ([
        ['label' => 'In Good Standing',    'value' => '0', 'icon' => 'fa-shield-check',    'color' => 'bg-green-100 text-green-600'],
        ['label' => 'With Warning',        'value' => '0', 'icon' => 'fa-exclamation-triangle', 'color' => 'bg-yellow-100 text-yellow-600'],
        ['label' => 'Non-Compliant',       'value' => '0', 'icon' => 'fa-times-circle',    'color' => 'bg-red-100 text-red-600'],
        ['label' => 'Pending Submission',  'value' => '0', 'icon' => 'fa-hourglass-half',  'color' => 'bg-blue-100 text-blue-600'],
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

<div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Compliance Rate --}}
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-base font-semibold text-gray-800 mb-4">Overall Compliance Rate</h2>
        <div class="flex items-center justify-center py-8">
            <div class="text-center">
                <p class="text-6xl font-bold text-teal-600">0%</p>
                <p class="text-sm text-gray-500 mt-2">of scholars are compliant this semester</p>
            </div>
        </div>
        <div class="border-t border-gray-100 pt-4 space-y-2">
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Submitted grades</span>
                <span class="font-medium text-gray-900">0 / 0</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Average GWA</span>
                <span class="font-medium text-gray-900">—</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Scholars at risk</span>
                <span class="font-medium text-red-600">0</span>
            </div>
        </div>
    </div>

    {{-- Scholar Compliance List --}}
    <div class="lg:col-span-2 bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h2 class="text-base font-semibold text-gray-800">Scholar Compliance List</h2>
            <div class="flex gap-2">
                <select class="text-xs border border-gray-300 rounded px-2 py-1 focus:outline-none focus:ring-1 focus:ring-teal-500">
                    <option>All Statuses</option>
                    <option>Good Standing</option>
                    <option>With Warning</option>
                    <option>Non-Compliant</option>
                    <option>Pending</option>
                </select>
            </div>
        </div>
        <div class="divide-y divide-gray-100">
            <div class="flex flex-col items-center justify-center py-14 text-gray-400">
                <i class="fas fa-clipboard-list text-5xl mb-3 text-gray-300"></i>
                <p class="text-gray-500 font-medium">No compliance records yet</p>
                <p class="text-sm mt-1">Records appear once scholars submit semester requirements.</p>
            </div>

            {{-- Scholar row (shown when data exists) --}}
            {{--
            <div class="px-6 py-3 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="h-8 w-8 rounded-full bg-slate-700 flex items-center justify-center text-white text-sm font-medium shrink-0">J</div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Juan Dela Cruz</p>
                        <p class="text-xs text-gray-500">2025-2026 — 1st Sem · GWA: 1.50</p>
                    </div>
                </div>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    <i class="fas fa-check mr-1"></i> Good Standing
                </span>
            </div>
            --}}
        </div>
    </div>
</div>

{{-- Semester Breakdown --}}
<div class="mt-6 bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-base font-semibold text-gray-800">Semester Submission History</h2>
        <p class="text-xs text-gray-500 mt-0.5">Grade and compliance submission counts per semester</p>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Academic Year</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Semester</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Scholars</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Submitted</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Avg GWA</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Compliance Rate</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-400">No semester data available.</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
