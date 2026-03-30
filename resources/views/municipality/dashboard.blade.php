@extends('municipality.layout')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
    <p class="mt-1 text-sm text-gray-500">Program status overview — {{ now()->format('F d, Y') }}</p>
</div>

{{-- Stat Cards --}}
<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
    <div class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
        <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center shrink-0">
            <i class="fas fa-users text-blue-600 text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500">Total Applicants</p>
            <p class="text-2xl font-semibold text-gray-900">0</p>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
        <div class="h-12 w-12 rounded-full bg-teal-100 flex items-center justify-center shrink-0">
            <i class="fas fa-user-graduate text-teal-600 text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500">Active Scholars</p>
            <p class="text-2xl font-semibold text-gray-900">0</p>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
        <div class="h-12 w-12 rounded-full bg-green-100 flex items-center justify-center shrink-0">
            <i class="fas fa-graduation-cap text-green-600 text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500">Active Programs</p>
            <p class="text-2xl font-semibold text-gray-900">0</p>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
        <div class="h-12 w-12 rounded-full bg-yellow-100 flex items-center justify-center shrink-0">
            <i class="fas fa-coins text-yellow-600 text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500">Total Funds Allocated</p>
            <p class="text-2xl font-semibold text-gray-900">₱0</p>
        </div>
    </div>
</div>

<div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">
    {{-- Program Status --}}
    <div class="lg:col-span-2 bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h2 class="text-base font-semibold text-gray-800">Scholarship Program Status</h2>
            <a href="{{ route('municipality.reports') }}" class="text-sm text-teal-600 hover:underline">View full reports</a>
        </div>
        <div class="p-6">
            {{-- Application Status Breakdown --}}
            <div class="space-y-4">
                @foreach ([
                    ['label' => 'Approved', 'count' => 0, 'color' => 'bg-green-500', 'pct' => 0],
                    ['label' => 'Pending Review', 'count' => 0, 'color' => 'bg-yellow-400', 'pct' => 0],
                    ['label' => 'Rejected', 'count' => 0, 'color' => 'bg-red-400', 'pct' => 0],
                ] as $item)
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-600">{{ $item['label'] }}</span>
                        <span class="font-medium text-gray-900">{{ $item['count'] }}</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2">
                        <div class="{{ $item['color'] }} h-2 rounded-full" style="width: {{ $item['pct'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-6 grid grid-cols-3 gap-4 pt-4 border-t border-gray-100 text-center">
                <div>
                    <p class="text-2xl font-bold text-gray-900">0</p>
                    <p class="text-xs text-gray-500">Total Applications</p>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900">0%</p>
                    <p class="text-xs text-gray-500">Approval Rate</p>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900">0%</p>
                    <p class="text-xs text-gray-500">Compliance Rate</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Links --}}
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-base font-semibold text-gray-800">Quick Access</h2>
        </div>
        <div class="p-6 flex flex-col gap-3">
            <a href="{{ route('municipality.reports') }}" class="inline-flex items-center px-4 py-2.5 bg-slate-900 text-white text-sm font-medium rounded-md hover:bg-slate-700">
                <i class="fas fa-chart-pie mr-2"></i> Fund Distribution Report
            </a>
            <a href="{{ route('municipality.compliance') }}" class="inline-flex items-center px-4 py-2.5 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-50">
                <i class="fas fa-clipboard-check mr-2"></i> Compliance Summary
            </a>
            <a href="{{ route('municipality.reports') }}" class="inline-flex items-center px-4 py-2.5 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-50">
                <i class="fas fa-users mr-2"></i> Applicant & Scholar Counts
            </a>
        </div>
    </div>
</div>
@endsection
