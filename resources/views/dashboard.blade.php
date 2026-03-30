@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Welcome Header -->
    <div class="bg-gradient-to-r from-blue-900 to-blue-700 rounded-lg px-8 py-10 text-white">
        <h1 class="text-3xl font-bold">Welcome back, {{ Auth::user()->name }}!</h1>
        <p class="mt-2 text-blue-200">Manage your scholarship applications and track your progress.</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">My Applications</p>
                    <p class="text-2xl font-semibold text-gray-900">0</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 bg-yellow-100 rounded-lg">
                    <i class="fas fa-hourglass-half text-yellow-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Pending Review</p>
                    <p class="text-2xl font-semibold text-gray-900">0</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 bg-green-100 rounded-lg">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Approved</p>
                    <p class="text-2xl font-semibold text-gray-900">0</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 bg-purple-100 rounded-lg">
                    <i class="fas fa-bell text-purple-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Notifications</p>
                    <p class="text-2xl font-semibold text-gray-900">0</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
            <div class="space-y-3">
                <a href="{{ route('scholarships.index') }}" class="flex items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition text-blue-700 font-medium">
                    <i class="fas fa-search mr-3"></i> Browse Scholarships
                </a>
                <a href="{{ route('applications.index') }}" class="flex items-center p-3 bg-green-50 rounded-lg hover:bg-green-100 transition text-green-700 font-medium">
                    <i class="fas fa-file-alt mr-3"></i> My Applications
                </a>
                <a href="{{ route('compliance.index') }}" class="flex items-center p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition text-purple-700 font-medium">
                    <i class="fas fa-clipboard-check mr-3"></i> Submit Grades
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition text-gray-700 font-medium">
                    <i class="fas fa-user-edit mr-3"></i> Complete Profile
                </a>
            </div>
        </div>

        <!-- Recent Applications -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900">Recent Applications</h2>
                <a href="{{ route('applications.index') }}" class="text-sm text-blue-600 hover:underline">View all</a>
            </div>
            <div class="flex flex-col items-center justify-center py-12 text-gray-400">
                <i class="fas fa-file-circle-plus text-5xl mb-4 text-gray-300"></i>
                <p class="text-gray-500 font-medium">No applications yet</p>
                <p class="text-sm mt-1">Browse scholarships and submit your first application.</p>
                <a href="{{ route('scholarships.index') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm font-medium">
                    <i class="fas fa-search mr-2"></i> Browse Scholarships
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
