@extends('peso.layout')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
    <p class="mt-1 text-sm text-gray-500">Employment outcomes overview — {{ now()->format('F d, Y') }}</p>
</div>

{{-- Stat Cards --}}
<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
    <div class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
        <div class="h-12 w-12 rounded-full bg-orange-100 flex items-center justify-center shrink-0">
            <i class="fas fa-user-graduate text-orange-600 text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500">Endorsed Graduates</p>
            <p class="text-2xl font-semibold text-gray-900">0</p>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
        <div class="h-12 w-12 rounded-full bg-green-100 flex items-center justify-center shrink-0">
            <i class="fas fa-briefcase text-green-600 text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500">Employed</p>
            <p class="text-2xl font-semibold text-gray-900">0</p>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
        <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center shrink-0">
            <i class="fas fa-handshake text-blue-600 text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500">Referrals Made</p>
            <p class="text-2xl font-semibold text-gray-900">0</p>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
        <div class="h-12 w-12 rounded-full bg-yellow-100 flex items-center justify-center shrink-0">
            <i class="fas fa-clock text-yellow-600 text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500">Awaiting Update</p>
            <p class="text-2xl font-semibold text-gray-900">0</p>
        </div>
    </div>
</div>

<div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">
    {{-- Employment Status Breakdown --}}
    <div class="lg:col-span-2 bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h2 class="text-base font-semibold text-gray-800">Employment Status Breakdown</h2>
            <a href="{{ route('peso.reports') }}" class="text-sm text-orange-600 hover:underline">View full report</a>
        </div>
        <div class="p-6 space-y-4">
            @foreach ([
                ['label' => 'Employed (Regular)',    'count' => 0, 'color' => 'bg-green-500',  'pct' => 0],
                ['label' => 'Employed (Contractual)','count' => 0, 'color' => 'bg-teal-400',   'pct' => 0],
                ['label' => 'Self-Employed',         'count' => 0, 'color' => 'bg-blue-400',   'pct' => 0],
                ['label' => 'Unemployed / Seeking',  'count' => 0, 'color' => 'bg-yellow-400', 'pct' => 0],
                ['label' => 'Continuing Studies',    'count' => 0, 'color' => 'bg-purple-400', 'pct' => 0],
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
            <div class="border-t border-gray-100 pt-3 flex justify-between text-sm">
                <span class="text-gray-500">Employment Rate</span>
                <span class="font-bold text-gray-900">0%</span>
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-base font-semibold text-gray-800">Quick Actions</h2>
        </div>
        <div class="p-6 flex flex-col gap-3">
            <a href="{{ route('peso.scholars') }}" class="inline-flex items-center px-4 py-2.5 bg-slate-900 text-white text-sm font-medium rounded-md hover:bg-slate-700">
                <i class="fas fa-user-graduate mr-2"></i> View Scholar Records
            </a>
            <a href="{{ route('peso.employment') }}" class="inline-flex items-center px-4 py-2.5 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-50">
                <i class="fas fa-pen mr-2"></i> Update Employment Status
            </a>
            <a href="{{ route('peso.employment') }}" class="inline-flex items-center px-4 py-2.5 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-50">
                <i class="fas fa-handshake mr-2"></i> Record Referral
            </a>
            <a href="{{ route('peso.reports') }}" class="inline-flex items-center px-4 py-2.5 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-50">
                <i class="fas fa-chart-bar mr-2"></i> View Reports
            </a>
        </div>
    </div>
</div>
@endsection
