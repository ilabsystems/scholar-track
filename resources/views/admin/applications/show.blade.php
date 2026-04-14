@extends('admin.layout')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Application Details</h1>
            <p class="mt-1 text-sm text-gray-500">Review and manage application #{{ $application->id }}</p>
        </div>
        <a href="{{ route('admin.applications.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400">
            <i class="fas fa-arrow-left mr-2"></i> Back to Applications
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Application Details --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Applicant Information --}}
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">Applicant Information</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Name</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $application->user->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $application->user->email }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Phone</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $application->applicantProfile->phone ?? '—' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $application->applicantProfile->date_of_birth?->format('M j, Y') ?? '—' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Field of Study</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $application->applicantProfile->field_of_study ?? '—' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">GPA</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $application->applicantProfile->gpa ?? '—' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Education Level</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $application->applicantProfile->education_level ?? '—' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Employment Status</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $application->applicantProfile->employment_status ?? '—' }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Address</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $application->applicantProfile->address ?? '—' }}</p>
                    </div>
                </div>
            </div>

            {{-- Scholarship Information --}}
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">Scholarship Information</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Scholarship</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $application->scholarship->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Amount</label>
                            <p class="mt-1 text-sm text-gray-900">${{ number_format($application->scholarship->amount, 2) }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Deadline</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $application->scholarship->deadline->format('M j, Y') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <p class="mt-1 text-sm text-gray-900">{{ ucfirst($application->scholarship->status) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Application Content --}}
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">Application Content</h2>
                </div>
                <div class="p-6 space-y-4">
                    @if($application->cover_letter)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Cover Letter</label>
                            <div class="mt-1 text-sm text-gray-900 bg-gray-50 p-3 rounded-md whitespace-pre-wrap">{{ $application->cover_letter }}</div>
                        </div>
                    @endif

                    @if($application->essay_response)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Essay Response</label>
                            <div class="mt-1 text-sm text-gray-900 bg-gray-50 p-3 rounded-md whitespace-pre-wrap">{{ $application->essay_response }}</div>
                        </div>
                    @endif

                    @if($application->documents)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Documents</label>
                            <div class="mt-1">
                                @foreach($application->documents as $document)
                                    <div class="text-sm text-blue-600">
                                        <i class="fas fa-file mr-2"></i>
                                        {{ $document['name'] ?? 'Document' }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Management Panel --}}
        <div class="space-y-6">
            {{-- Status & Assignment --}}
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">Review & Assign</h2>
                </div>
                <form method="POST" action="{{ route('admin.applications.update', $application) }}" class="p-6">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <option value="draft" {{ $application->status === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="submitted" {{ $application->status === 'submitted' ? 'selected' : '' }}>Submitted</option>
                                <option value="under_review" {{ $application->status === 'under_review' ? 'selected' : '' }}>Under Review</option>
                                <option value="approved" {{ $application->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                <option value="withdrawn" {{ $application->status === 'withdrawn' ? 'selected' : '' }}>Withdrawn</option>
                            </select>
                        </div>

                        <div>
                            <label for="assigned_to" class="block text-sm font-medium text-gray-700">Assign To</label>
                            <select name="assigned_to" id="assigned_to" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Unassigned</option>
                                @foreach($reviewers as $reviewer)
                                    <option value="{{ $reviewer->id }}" {{ $application->assigned_to == $reviewer->id ? 'selected' : '' }}>{{ $reviewer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="score" class="block text-sm font-medium text-gray-700">Score (0-100)</label>
                            <input type="number" name="score" id="score" value="{{ $application->score }}" min="0" max="100" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="remarks" class="block text-sm font-medium text-gray-700">Remarks</label>
                            <textarea name="remarks" id="remarks" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Add review notes...">{{ $application->remarks }}</textarea>
                        </div>

                        <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <i class="fas fa-save mr-2"></i> Update Application
                        </button>
                    </div>
                </form>
            </div>

            {{-- Application Timeline --}}
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">Timeline</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        @if($application->created_at)
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-gray-900">Application created</p>
                                    <p class="text-xs text-gray-500">{{ $application->created_at->format('M j, Y g:i A') }}</p>
                                </div>
                            </div>
                        @endif

                        @if($application->submitted_at)
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-gray-900">Application submitted</p>
                                    <p class="text-xs text-gray-500">{{ $application->submitted_at->format('M j, Y g:i A') }}</p>
                                </div>
                            </div>
                        @endif

                        @if($application->reviewed_at)
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-2 h-2 bg-purple-500 rounded-full mt-2"></div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-gray-900">Application reviewed by {{ $application->reviewer?->name ?? 'Unknown' }}</p>
                                    <p class="text-xs text-gray-500">{{ $application->reviewed_at->format('M j, Y g:i A') }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection