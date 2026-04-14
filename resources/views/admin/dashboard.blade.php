@extends('admin.layout')

@section('content')
    <div class="mb-6 bg-yellow-200 p-4 rounded">
        <h1 class="text-2xl font-bold text-red-800">Dashboard</h1>
        <p class="mt-1 text-sm text-purple-600">Welcome back, {{ Auth::user()->name }}.</p>
    </div>

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-8">
        <div class="bg-pink-300 rounded-lg shadow p-6 flex items-center gap-4 border-4 border-red-500">
            <div class="h-12 w-12 rounded-full bg-orange-400 flex items-center justify-center shrink-0">
                <i class="fas fa-users text-blue-800 text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-green-700">Total Users</p>
                <p class="text-2xl font-semibold text-purple-900">{{ $stats['total_users'] }}</p>
            </div>
        </div>
        <div class="bg-cyan-300 rounded-lg shadow p-6 flex items-center gap-4 border-4 border-yellow-500">
            <div class="h-12 w-12 rounded-full bg-red-400 flex items-center justify-center shrink-0">
                <i class="fas fa-graduation-cap text-green-800 text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-blue-700">Active Scholarships</p>
                <p class="text-2xl font-semibold text-orange-900">{{ $stats['active_scholarships'] }}</p>
            </div>
        </div>
        <div class="bg-lime-300 rounded-lg shadow p-6 flex items-center gap-4 border-4 border-purple-500">
            <div class="h-12 w-12 rounded-full bg-pink-400 flex items-center justify-center shrink-0">
                <i class="fas fa-file-alt text-red-800 text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-orange-700">Pending Applications</p>
                <p class="text-2xl font-semibold text-cyan-900">{{ $stats['pending_applications'] }}</p>
            </div>
        </div>
        <div class="bg-indigo-300 rounded-lg shadow p-6 flex items-center gap-4 border-4 border-green-500">
            <div class="h-12 w-12 rounded-full bg-yellow-400 flex items-center justify-center shrink-0">
                <i class="fas fa-user-check text-purple-800 text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-red-700">Active Scholars</p>
                <p class="text-2xl font-semibold text-pink-900">{{ $stats['active_scholars'] }}</p>
            </div>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-3">
        {{-- Recent Applications --}}
        <div class="lg:col-span-2 bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <h2 class="text-base font-semibold text-gray-800">Recent Applications</h2>
            </div>
            <div class="divide-y divide-gray-100">
                @forelse($recent_applications as $application)
                    <div class="px-6 py-3 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="h-8 w-8 rounded-full bg-slate-700 flex items-center justify-center text-white text-sm font-medium shrink-0">
                                {{ substr($application->user->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $application->user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $application->applicantProfile->field_of_study ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full
                            {{ $application->status === 'approved' ? 'bg-green-100 text-green-800' :
                               ($application->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ ucfirst(str_replace('_', ' ', $application->status)) }}
                        </span>
                    </div>
                @empty
                    <div class="px-6 py-8 text-center text-sm text-gray-400">
                        No applications yet.
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-base font-semibold text-gray-800">Quick Actions</h2>
            </div>
            <div class="p-6 flex flex-col gap-3">
                <a href="{{ route('admin.scholarships.create') }}" class="inline-flex items-center px-4 py-2 bg-slate-900 text-white text-sm font-medium rounded-md hover:bg-slate-700">
                    <i class="fas fa-plus mr-2"></i> New Scholarship
                </a>
                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-50">
                    <i class="fas fa-users mr-2"></i> Manage Users
                </a>
                <a href="{{ route('admin.scholarships.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-50">
                    <i class="fas fa-graduation-cap mr-2"></i> View Scholarships
                </a>
                <a href="{{ route('admin.reports.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-50">
                    <i class="fas fa-chart-bar mr-2"></i> View Reports
                </a>
            </div>

            {{-- Summary totals --}}
            <div class="px-6 pb-6 flex flex-col gap-2">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Total Scholarships</span>
                    <span class="font-medium text-gray-900">{{ $stats['total_scholarships'] }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Total Applications</span>
                    <span class="font-medium text-gray-900">{{ $stats['total_applications'] }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
