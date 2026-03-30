@extends('admin.layout')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Reports</h1>
            <p class="mt-1 text-sm text-gray-500">Generate and export program reports and dashboards.</p>
        </div>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-medium text-gray-500">Applications by Status</h3>
                <i class="fas fa-file-alt text-gray-400"></i>
            </div>
            <div class="space-y-2">
                @foreach($applicationStats as $status => $count)
                    <div class="flex items-center justify-between text-sm">
                        <span class="capitalize text-gray-600">{{ $status }}</span>
                        <span class="font-semibold text-gray-900">{{ $count }}</span>
                    </div>
                @endforeach
                @if($applicationStats->isEmpty())
                    <p class="text-sm text-gray-400">No data available.</p>
                @endif
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-medium text-gray-500">Scholarships by Status</h3>
                <i class="fas fa-graduation-cap text-gray-400"></i>
            </div>
            <div class="space-y-2">
                @foreach($scholarshipStats as $status => $count)
                    <div class="flex items-center justify-between text-sm">
                        <span class="capitalize text-gray-600">{{ $status }}</span>
                        <span class="font-semibold text-gray-900">{{ $count }}</span>
                    </div>
                @endforeach
                @if($scholarshipStats->isEmpty())
                    <p class="text-sm text-gray-400">No data available.</p>
                @endif
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-medium text-gray-500">Users by Role</h3>
                <i class="fas fa-users text-gray-400"></i>
            </div>
            <div class="space-y-2">
                @foreach($userStats as $role => $count)
                    <div class="flex items-center justify-between text-sm">
                        <span class="capitalize text-gray-600">{{ $role }}</span>
                        <span class="font-semibold text-gray-900">{{ $count }}</span>
                    </div>
                @endforeach
                @if($userStats->isEmpty())
                    <p class="text-sm text-gray-400">No data available.</p>
                @endif
            </div>
        </div>
    </div>

    {{-- Recent Applications Table --}}
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h2 class="text-base font-semibold text-gray-800">All Applications</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applicant</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Field of Study</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">GPA</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($applications as $application)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $application->user->name }}</div>
                                <div class="text-xs text-gray-500">{{ $application->user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $application->field_of_study ?? '—' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $application->gpa ?? '—' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $application->application_status === 'approved' ? 'bg-green-100 text-green-800' :
                                       ($application->application_status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($application->application_status ?? 'pending') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $application->submitted_at ? $application->submitted_at->format('M d, Y') : '—' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-sm text-gray-400">No applications found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($applications->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $applications->links() }}
            </div>
        @endif
    </div>
@endsection
