<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $application->scholarship->name }}
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    Application Status
                </p>
            </div>
            <a href="{{ route('applications.index') }}" class="text-blue-900 hover:text-blue-700">
                ← {{ __('Back to Applications') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('status'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('status') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="md:col-span-2">
                    <!-- Scholarship Details Card -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="px-6 py-4 bg-slate-50 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ __('Scholarship Details') }}
                            </h3>
                        </div>
                        <div class="px-6 py-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">{{ __('Amount') }}</dt>
                                    <dd class="mt-1 text-lg text-gray-900">${{ number_format($application->scholarship->amount, 2) }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">{{ __('Deadline') }}</dt>
                                    <dd class="mt-1 text-lg text-gray-900">{{ $application->scholarship->deadline?->format('M d, Y') }}</dd>
                                </div>
                                <div class="col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">{{ __('Description') }}</dt>
                                    <dd class="mt-1 text-gray-900">{{ $application->scholarship->description }}</dd>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Application Details Card -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="px-6 py-4 bg-slate-50 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ __('Your Application') }}
                            </h3>
                        </div>
                        <div class="px-6 py-4">
                            <div class="mb-6">
                                <dt class="text-sm font-medium text-gray-500 mb-2">{{ __('Cover Letter') }}</dt>
                                <dd class="text-gray-900 whitespace-pre-wrap bg-slate-50 p-4 rounded">
                                    {{ $application->cover_letter ?? 'No cover letter provided.' }}
                                </dd>
                            </div>

                            @if($application->applicantProfile)
                                <div class="border-t pt-4">
                                    <dt class="text-sm font-medium text-gray-500 mb-2">{{ __('Linked Profile') }}</dt>
                                    <dd class="text-gray-900">
                                        <span class="text-green-600">✓</span> Profile with GPA: {{ $application->applicantProfile->gpa }}
                                    </dd>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Timeline Card -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="px-6 py-4 bg-slate-50 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ __('Timeline') }}
                            </h3>
                        </div>
                        <div class="px-6 py-4">
                            <div class="space-y-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-blue-900 text-white">
                                            ✓
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <dt class="text-sm font-medium text-gray-500">{{ __('Created') }}</dt>
                                        <dd class="text-gray-900">{{ $application->created_at->format('M d, Y H:i') }}</dd>
                                    </div>
                                </div>

                                @if($application->submitted_at)
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center h-10 w-10 rounded-full bg-blue-900 text-white">
                                                ✓
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <dt class="text-sm font-medium text-gray-500">{{ __('Submitted') }}</dt>
                                            <dd class="text-gray-900">{{ $application->submitted_at->format('M d, Y H:i') }}</dd>
                                        </div>
                                    </div>
                                @endif

                                @if($application->reviewed_at)
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center h-10 w-10 rounded-full bg-green-600 text-white">
                                                ✓
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <dt class="text-sm font-medium text-gray-500">{{ __('Reviewed') }}</dt>
                                            <dd class="text-gray-900">{{ $application->reviewed_at->format('M d, Y H:i') }}</dd>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div>
                    <!-- Status Card -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="px-6 py-4">
                            <div class="text-center">
                                <span class="px-4 py-2 inline-flex text-lg leading-5 font-semibold rounded-full
                                    @if($application->status === 'draft') bg-gray-100 text-gray-800
                                    @elseif($application->status === 'submitted') bg-blue-100 text-blue-800
                                    @elseif($application->status === 'under_review') bg-yellow-100 text-yellow-800
                                    @elseif($application->status === 'approved') bg-green-100 text-green-800
                                    @elseif($application->status === 'rejected') bg-red-100 text-red-800
                                    @else bg-slate-100 text-slate-800
                                    @endif">
                                    {{ $application->getStatusLabel() }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Score Card (if reviewed) -->
                    @if($application->score)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                            <div class="px-6 py-4">
                                <div class="text-center">
                                    <dt class="text-sm font-medium text-gray-500">{{ __('Score') }}</dt>
                                    <dd class="mt-2 text-3xl font-bold text-gray-900">
                                        {{ $application->score }}
                                    </dd>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Remarks Card (if rejected) -->
                    @if($application->remarks && $application->status === 'rejected')
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 border-l-4 border-red-500">
                            <div class="px-6 py-4">
                                <dt class="text-sm font-medium text-gray-500 mb-2">{{ __('Remarks') }}</dt>
                                <dd class="text-gray-900">{{ $application->remarks }}</dd>
                            </div>
                        </div>
                    @endif

                    <!-- Actions -->
                    @if($application->canWithdraw())
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="px-6 py-4">
                                <form method="POST" action="{{ route('applications.withdraw', $application) }}" onsubmit="return confirm('Are you sure you want to withdraw this application?')">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                                        {{ __('Withdraw Application') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
