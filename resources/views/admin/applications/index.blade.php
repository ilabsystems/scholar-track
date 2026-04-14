@extends('admin.layout')

@section('content')
    <div class="mb-6 flex items-center justify-between bg-orange-200 p-4 rounded-lg">
        <div>
            <h1 class="text-2xl font-bold text-purple-900">Applications</h1>
            <p class="mt-1 text-sm text-red-600">Manage and review scholarship applications.</p>
        </div>
    </div>

    {{-- Filters --}}
    <div class="bg-cyan-200 rounded-lg shadow mb-6 border-2 border-pink-500">
        <div class="px-6 py-4 border-b border-pink-400">
            <h2 class="text-lg font-semibold text-blue-800">Filters</h2>
        </div>
        <form method="GET" class="p-6 bg-yellow-100">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <div class="bg-white p-3 rounded border-2 border-green-500">
                    <label for="status" class="block text-sm font-medium text-red-700 mb-1">Status</label>
                    <select name="status" id="status" class="w-full rounded-md border-purple-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-pink-50">
                        <option value="">All Statuses</option>
                        @foreach($statuses as $key => $label)
                            <option value="{{ $key }}" {{ request('status') === $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="bg-white p-3 rounded border-2 border-blue-500">
                    <label for="scholarship_id" class="block text-sm font-medium text-green-700 mb-1">Scholarship</label>
                    <select name="scholarship_id" id="scholarship_id" class="w-full rounded-md border-purple-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-pink-50">
                        <option value="">All Scholarships</option>
                        @foreach($scholarships as $scholarship)
                            <option value="{{ $scholarship->id }}" {{ request('scholarship_id') == $scholarship->id ? 'selected' : '' }}>{{ $scholarship->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="bg-white p-3 rounded border-2 border-yellow-500">
                    <label for="assigned_to" class="block text-sm font-medium text-purple-700 mb-1">Assigned To</label>
                    <select name="assigned_to" id="assigned_to" class="w-full rounded-md border-purple-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-pink-50">
                        <option value="">All Reviewers</option>
                        @foreach($reviewers as $reviewer)
                            <option value="{{ $reviewer->id }}" {{ request('assigned_to') == $reviewer->id ? 'selected' : '' }}>{{ $reviewer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="bg-white p-3 rounded border-2 border-red-500">
                    <label for="search" class="block text-sm font-medium text-blue-700 mb-1">Search Applicant</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Name or email" class="w-full rounded-md border-purple-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 bg-pink-50">
                </div>
            </div>

            <div class="mt-4 flex gap-2">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <i class="fas fa-filter mr-2"></i> Apply Filters
                </button>
                <a href="{{ route('admin.applications.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <i class="fas fa-times mr-2"></i> Clear
                </a>
            </div>
        </form>
    </div>

    {{-- Applications Table --}}
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-800">Applications ({{ $applications->total() }})</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applicant</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Scholarship</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assigned To</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($applications as $application)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $application->user->name }}</div>
                                <div class="text-sm text-gray-500">{{ $application->user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $application->scholarship->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $application->status === 'approved' ? 'bg-green-100 text-green-800' :
                                       ($application->status === 'rejected' ? 'bg-red-100 text-red-800' :
                                       ($application->status === 'under_review' ? 'bg-yellow-100 text-yellow-800' :
                                       ($application->status === 'submitted' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800'))) }}">
                                    {{ $application->getStatusLabel() }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $application->assignee?->name ?? 'Unassigned' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $application->score ? number_format($application->score, 2) : '—' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $application->submitted_at?->format('M j, Y') ?? '—' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.applications.show', $application) }}" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-sm text-gray-400">
                                No applications found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($applications->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $applications->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
@endsection