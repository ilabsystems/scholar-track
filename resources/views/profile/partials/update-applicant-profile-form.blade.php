<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Applicant Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update your application details and personal information.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.applicant.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">{{ __('Phone Number') }}</label>
                <input id="phone" name="phone" type="tel" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-900 focus:border-transparent @error('phone') border-red-500 @enderror" value="{{ old('phone', auth()->user()->applicantProfile->first()?->phone ?? '') }}" />
                @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="date_of_birth" class="block text-sm font-medium text-gray-700">{{ __('Date of Birth') }}</label>
                <input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-900 focus:border-transparent @error('date_of_birth') border-red-500 @enderror" value="{{ old('date_of_birth', auth()->user()->applicantProfile->first()?->date_of_birth ?? '') }}" />
                @error('date_of_birth')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="field_of_study" class="block text-sm font-medium text-gray-700">{{ __('Field of Study') }}</label>
                <input id="field_of_study" name="field_of_study" type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-900 focus:border-transparent @error('field_of_study') border-red-500 @enderror" value="{{ old('field_of_study', auth()->user()->applicantProfile->first()?->field_of_study ?? '') }}" />
                @error('field_of_study')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="gpa" class="block text-sm font-medium text-gray-700">{{ __('GPA') }}</label>
                <input id="gpa" name="gpa" type="number" step="0.01" min="0" max="4" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-900 focus:border-transparent @error('gpa') border-red-500 @enderror" value="{{ old('gpa', auth()->user()->applicantProfile->first()?->gpa ?? '') }}" />
                @error('gpa')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="education_level" class="block text-sm font-medium text-gray-700">{{ __('Education Level') }}</label>
                <select id="education_level" name="education_level" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-900 focus:border-transparent @error('education_level') border-red-500 @enderror">
                    <option value="">{{ __('Select education level') }}</option>
                    <option value="High School" @selected(old('education_level', auth()->user()->applicantProfile->first()?->education_level ?? '') === 'High School')>{{ __('High School') }}</option>
                    <option value="Associate Degree" @selected(old('education_level', auth()->user()->applicantProfile->first()?->education_level ?? '') === 'Associate Degree')>{{ __('Associate Degree') }}</option>
                    <option value="Bachelor Degree" @selected(old('education_level', auth()->user()->applicantProfile->first()?->education_level ?? '') === 'Bachelor Degree')>{{ __('Bachelor Degree') }}</option>
                </select>
                @error('education_level')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="employment_status" class="block text-sm font-medium text-gray-700">{{ __('Employment Status') }}</label>
                <select id="employment_status" name="employment_status" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-900 focus:border-transparent @error('employment_status') border-red-500 @enderror">
                    <option value="">{{ __('Select employment status') }}</option>
                    <option value="Student" @selected(old('employment_status', auth()->user()->applicantProfile->first()?->employment_status ?? '') === 'Student')>{{ __('Student') }}</option>
                    <option value="Unemployed" @selected(old('employment_status', auth()->user()->applicantProfile->first()?->employment_status ?? '') === 'Unemployed')>{{ __('Unemployed') }}</option>
                    <option value="Part-time" @selected(old('employment_status', auth()->user()->applicantProfile->first()?->employment_status ?? '') === 'Part-time')>{{ __('Part-time') }}</option>
                    <option value="Full-time" @selected(old('employment_status', auth()->user()->applicantProfile->first()?->employment_status ?? '') === 'Full-time')>{{ __('Full-time') }}</option>
                </select>
                @error('employment_status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="household_income" class="block text-sm font-medium text-gray-700">{{ __('Household Income') }}</label>
                <input id="household_income" name="household_income" type="number" step="0.01" min="0" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-900 focus:border-transparent @error('household_income') border-red-500 @enderror" value="{{ old('household_income', auth()->user()->applicantProfile->first()?->household_income ?? '') }}" />
                @error('household_income')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">{{ __('Address') }}</label>
            <textarea id="address" name="address" rows="3" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-900 focus:border-transparent @error('address') border-red-500 @enderror">{{ old('address', auth()->user()->applicantProfile->first()?->address ?? '') }}</textarea>
            @error('address')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="essay_response" class="block text-sm font-medium text-gray-700">{{ __('Essay Response') }}</label>
            <textarea id="essay_response" name="essay_response" rows="5" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-900 focus:border-transparent @error('essay_response') border-red-500 @enderror">{{ old('essay_response', auth()->user()->applicantProfile->first()?->essay_response ?? '') }}</textarea>
            @error('essay_response')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center justify-center rounded-full bg-blue-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-800">
                {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'applicant-profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600 font-medium">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
