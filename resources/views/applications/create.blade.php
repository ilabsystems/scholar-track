<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Apply for Scholarship') }}
            </h2>
            <a href="{{ route('scholarships.show', $scholarship) }}" class="text-blue-900 hover:text-blue-700">
                ← {{ __('Back to Scholarship') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @if(session('status'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Scholarship Summary Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="px-6 py-4 bg-slate-50 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        {{ $scholarship->name }}
                    </h3>
                </div>
                <div class="px-6 py-4">
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Award Amount') }}</dt>
                            <dd class="mt-1 text-lg text-gray-900">${{ number_format($scholarship->amount, 2) }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Deadline') }}</dt>
                            <dd class="mt-1 text-lg text-gray-900">{{ $scholarship->deadline?->format('M d, Y') }}</dd>
                        </div>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 mb-2">{{ __('Description') }}</dt>
                        <dd class="text-gray-900">{{ $scholarship->description }}</dd>
                    </div>
                </div>
            </div>

            <!-- Application Form -->
            <form method="POST" action="{{ route('scholarships.apply.store', $scholarship) }}" class="space-y-6">
                @csrf

                <!-- Profile Section -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 bg-slate-50 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ __('Applicant Profile') }}
                        </h3>
                    </div>
                    <div class="px-6 py-4">
                        @if($userApplicantProfile)
                            <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded">
                                <p class="text-green-800">
                                    <span class="font-semibold">✓ Profile Complete</span> - GPA: {{ $userApplicantProfile->gpa }}
                                </p>
                                <p class="text-sm text-green-700 mt-1">
                                    Your profile will be linked to this application.
                                </p>
                            </div>
                            <div class="mb-4">
                                <label for="applicant_profile_id" class="block text-sm font-medium text-gray-700">
                                    {{ __('Link Your Profile (Optional)') }}
                                </label>
                                <select id="applicant_profile_id" name="applicant_profile_id" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">{{ __('Select a profile...') }}</option>
                                    <option value="{{ $userApplicantProfile->id }}" selected>
                                        {{ __('Current Profile') }} (GPA: {{ $userApplicantProfile->gpa }})
                                    </option>
                                </select>
                                @error('applicant_profile_id')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        @else
                            <div class="mb-4 p-4 bg-yellow-50 border border-yellow-200 rounded">
                                <p class="text-yellow-800">
                                    <span class="font-semibold">⚠ No Profile Yet</span>
                                </p>
                                <p class="text-sm text-yellow-700 mt-1">
                                    You can apply without a complete profile, but it's recommended to
                                    <a href="{{ route('profile.applicant.edit') }}" class="underline font-semibold">create one first</a>.
                                </p>
                            </div>
                            <div>
                                <label for="applicant_profile_id" class="block text-sm font-medium text-gray-700">
                                    {{ __('Applicant Profile (Optional)') }}
                                </label>
                                <select id="applicant_profile_id" name="applicant_profile_id" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">{{ __('No profile') }}</option>
                                </select>
                                @error('applicant_profile_id')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Cover Letter Section -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 bg-slate-50 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ __('Cover Letter') }}
                        </h3>
                    </div>
                    <div class="px-6 py-4">
                        <label for="cover_letter" class="block text-sm font-medium text-gray-700">
                            {{ __('Tell us why you deserve this scholarship') }}
                        </label>
                        <textarea
                            id="cover_letter"
                            name="cover_letter"
                            rows="8"
                            maxlength="5000"
                            class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('cover_letter') border-red-500 @enderror"
                            placeholder="Share your background, goals, and why this scholarship is important to you..."
                        >{{ old('cover_letter') }}</textarea>
                        <p class="mt-2 text-sm text-gray-500">Maximum 5000 characters</p>
                        @error('cover_letter')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Essay Response Section -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 bg-slate-50 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ __('Essay Response') }}
                        </h3>
                    </div>
                    <div class="px-6 py-4">
                        <label for="essay_response" class="block text-sm font-medium text-gray-700">
                            {{ __('Please write a short essay about your academic goals and aspirations') }}
                        </label>
                        <textarea
                            id="essay_response"
                            name="essay_response"
                            rows="8"
                            maxlength="5000"
                            class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('essay_response') border-red-500 @enderror"
                            placeholder="Share your academic goals, personal achievements, and why you're a strong candidate for this scholarship..."
                        >{{ old('essay_response') }}</textarea>
                        <p class="mt-2 text-sm text-gray-500">Maximum 5000 characters</p>
                        @error('essay_response')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Documents Section (Future Enhancement) -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 bg-slate-50 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ __('Documents') }}
                        </h3>
                    </div>
                    <div class="px-6 py-4">
                        <p class="text-gray-700 mb-4">
                            {{ __('Document uploads coming soon!') }}
                        </p>
                        <div class="p-4 bg-slate-50 border border-dashed border-gray-300 rounded text-center">
                            <p class="text-gray-500">
                                📄 {{ __('Upload transcripts, recommendation letters, and other supporting documents') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 flex gap-4">
                        <button
                            type="submit"
                            name="save"
                            class="flex-1 px-4 py-2 bg-slate-400 text-white rounded-md hover:bg-slate-500 transition font-medium"
                        >
                            {{ __('Save as Draft') }}
                        </button>
                        <button
                            type="submit"
                            name="submit"
                            class="flex-1 px-4 py-2 bg-blue-900 text-white rounded-md hover:bg-blue-800 transition font-medium"
                        >
                            {{ __('Submit Application') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
