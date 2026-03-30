@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Notifications</h1>
            <p class="mt-1 text-sm text-gray-500">Stay updated on deadlines and application status changes.</p>
        </div>
        <button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-600 hover:bg-gray-50 transition">
            <i class="fas fa-check-double mr-2"></i> Mark all as read
        </button>
    </div>

    <!-- Filter Tabs -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="border-b border-gray-200 px-6">
            <nav class="-mb-px flex space-x-8">
                <a href="#" class="border-blue-600 text-blue-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    All <span class="ml-2 inline-flex items-center justify-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-600">0</span>
                </a>
                <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Unread <span class="ml-2 inline-flex items-center justify-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">0</span>
                </a>
            </nav>
        </div>

        <!-- Notifications List -->
        <div class="divide-y divide-gray-100">
            {{-- Empty state --}}
            <div class="flex flex-col items-center justify-center py-16 text-gray-400">
                <i class="fas fa-bell-slash text-6xl mb-4 text-gray-300"></i>
                <p class="text-gray-500 font-medium text-lg">No notifications yet</p>
                <p class="text-sm mt-1">You'll be notified about deadlines and application status updates here.</p>
            </div>

            {{-- Notification item example (shown when items exist) --}}
            {{--
            <div class="flex items-start gap-4 px-6 py-4 bg-blue-50 hover:bg-blue-100 transition cursor-pointer">
                <div class="flex-shrink-0 mt-1">
                    <div class="h-9 w-9 rounded-full bg-blue-600 flex items-center justify-center">
                        <i class="fas fa-check-circle text-white text-sm"></i>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-900">Application Approved</p>
                    <p class="text-sm text-gray-600 mt-0.5">Your application for <strong>Scholarship Name</strong> has been approved.</p>
                    <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                </div>
                <div class="flex-shrink-0">
                    <span class="inline-block w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                </div>
            </div>

            <div class="flex items-start gap-4 px-6 py-4 hover:bg-gray-50 transition cursor-pointer">
                <div class="flex-shrink-0 mt-1">
                    <div class="h-9 w-9 rounded-full bg-yellow-100 flex items-center justify-center">
                        <i class="fas fa-clock text-yellow-600 text-sm"></i>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">Deadline Reminder</p>
                    <p class="text-sm text-gray-600 mt-0.5">The application deadline for <strong>Scholarship Name</strong> is in 3 days.</p>
                    <p class="text-xs text-gray-400 mt-1">Yesterday</p>
                </div>
            </div>
            --}}
        </div>
    </div>
</div>
@endsection
