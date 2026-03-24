@extends('admin.layout')

@section('content')
<div class="flex flex-col">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 p-6">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="{{ route('admin.scholarships.index') }}" class="text-blue-900 hover:text-blue-800">
                    <i class="fas fa-arrow-left mr-2"></i>Back
                </a>
                <h1 class="text-3xl font-bold text-gray-900 ml-4">{{ $scholarship->name }}</h1>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.scholarships.edit', $scholarship) }}" class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-md text-sm font-medium">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <form action="{{ route('admin.scholarships.destroy', $scholarship) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-trash mr-2"></i>Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Info Cards -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-white rounded-lg shadow p-4">
                        <p class="text-gray-600 text-sm font-medium mb-1">Award Amount</p>
                        <p class="text-3xl font-bold text-blue-900\">${{ number_format($scholarship->amount, 2) }}</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-4">
                        <p class="text-gray-600 text-sm font-medium mb-1">Application Deadline</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $scholarship->deadline->format('M d, Y') }}</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-4">
                        <p class="text-gray-600 text-sm font-medium mb-1">Award Type</p>
                        <p class="text-lg font-semibold text-gray-900 capitalize">{{ str_replace('-', ' ', $scholarship->award_type) }}</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-4">
                        <p class="text-gray-600 text-sm font-medium mb-1">Coverage</p>
                        <p class="text-lg font-semibold text-gray-900 capitalize">{{ str_replace('-', ' ', $scholarship->coverage) }}</p>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Description</h2>
                    <p class="text-gray-700 whitespace-pre-wrap">{{ $scholarship->description }}</p>
                </div>

                <!-- Criteria -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Criteria & Requirements</h2>
                    <p class="text-gray-700 whitespace-pre-wrap">{{ $scholarship->criteria }}</p>
                </div>

                <!-- Additional Requirements -->
                @if($scholarship->gpa_requirement || $scholarship->demographics || $scholarship->field_of_study)
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Additional Requirements</h2>
                        <div class="space-y-3">
                            @if($scholarship->gpa_requirement)
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                    <div>
                                        <p class="text-gray-700 font-medium">Minimum GPA</p>
                                        <p class="text-gray-600">{{ number_format($scholarship->gpa_requirement, 1) }} or higher</p>
                                    </div>
                                </div>
                            @endif
                            @if($scholarship->demographics)
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                    <div>
                                        <p class="text-gray-700 font-medium">Demographics</p>
                                        <p class="text-gray-600">{{ $scholarship->demographics }}</p>
                                    </div>
                                </div>
                            @endif
                            @if($scholarship->field_of_study)
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                    <div>
                                        <p class="text-gray-700 font-medium">Field of Study</p>
                                        <p class="text-gray-600">{{ $scholarship->field_of_study }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Status Card -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Status</h3>
                    <div class="flex items-center justify-between">
                        <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full
                            {{ $scholarship->status === 'active' ? 'bg-green-100 text-green-800' : ($scholarship->status === 'archived' ? 'bg-gray-100 text-gray-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ ucfirst($scholarship->status) }}
                        </span>
                    </div>
                </div>

                <!-- Creator Info -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Created By</h3>
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-blue-900 flex items-center justify-center text-white font-medium">
                            {{ substr($scholarship->creator->name, 0, 1) }}
                        </div>
                        <div class="ml-3">
                            <p class="text-gray-900 font-medium">{{ $scholarship->creator->name }}</p>
                            <p class="text-gray-600 text-sm">{{ $scholarship->creator->email }}</p>
                        </div>
                    </div>
                </div>

                <!-- Dates -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Information</h3>
                    <div class="space-y-3 text-sm">
                        <div>
                            <p class="text-gray-600">Created</p>
                            <p class="text-gray-900 font-medium">{{ $scholarship->created_at->format('M d, Y \a\t g:i A') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Last Updated</p>
                            <p class="text-gray-900 font-medium">{{ $scholarship->updated_at->format('M d, Y \a\t g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

