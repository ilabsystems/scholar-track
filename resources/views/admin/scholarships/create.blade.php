@extends('admin.layout')

@section('content')
<div class="md:ml-64 flex flex-col flex-1">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 p-6">
        <div class="flex items-center">
            <a href="{{ route('admin.scholarships.index') }}" class="text-blue-900 hover:text-blue-800">
                <i class="fas fa-arrow-left mr-2"></i>Back
            </a>
            <h1 class="text-3xl font-bold text-gray-900 ml-4">Create Scholarship</h1>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <div class="max-w-4xl bg-white rounded-lg shadow">
            <form action="{{ route('admin.scholarships.store') }}" method="POST" class="p-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Scholarship Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-900 focus:border-transparent focus:outline-none @error('name') border-red-500 @enderror" placeholder="e.g., Merit Excellence Award">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-900 focus:border-transparent focus:outline-none @error('description') border-red-500 @enderror" placeholder="Detailed description of the scholarship...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Amount -->
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">
                            Award Amount ($) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="amount" name="amount" value="{{ old('amount') }}" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-900 focus:border-transparent focus:outline-none @error('amount') border-red-500 @enderror" placeholder="0.00">
                        @error('amount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Award Type -->
                    <div>
                        <label for="award_type" class="block text-sm font-medium text-gray-700 mb-2">
                            Award Type <span class="text-red-500">*</span>
                        </label>
                        <select id="award_type" name="award_type" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-900 focus:border-transparent focus:outline-none @error('award_type') border-red-500 @enderror">
                            <option value="">Select Award Type</option>
                            <option value="one-time" {{ old('award_type') === 'one-time' ? 'selected' : '' }}>One-Time</option>
                            <option value="yearly" {{ old('award_type') === 'yearly' ? 'selected' : '' }}>Yearly</option>
                            <option value="monthly" {{ old('award_type') === 'monthly' ? 'selected' : '' }}>Monthly</option>
                        </select>
                        @error('award_type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Coverage -->
                    <div>
                        <label for="coverage" class="block text-sm font-medium text-gray-700 mb-2">
                            Coverage <span class="text-red-500">*</span>
                        </label>
                        <select id="coverage" name="coverage" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-900 focus:border-transparent focus:outline-none @error('coverage') border-red-500 @enderror">
                            <option value="">Select Coverage</option>
                            <option value="full-tuition" {{ old('coverage') === 'full-tuition' ? 'selected' : '' }}>Full Tuition</option>
                            <option value="partial" {{ old('coverage') === 'partial' ? 'selected' : '' }}>Partial</option>
                            <option value="books" {{ old('coverage') === 'books' ? 'selected' : '' }}>Books</option>
                            <option value="other" {{ old('coverage') === 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('coverage')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deadline -->
                    <div>
                        <label for="deadline" class="block text-sm font-medium text-gray-700 mb-2">
                            Application Deadline <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="deadline" name="deadline" value="{{ old('deadline') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-900 focus:border-transparent focus:outline-none @error('deadline') border-red-500 @enderror">
                        @error('deadline')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- GPA Requirement -->
                    <div>
                        <label for="gpa_requirement" class="block text-sm font-medium text-gray-700 mb-2">
                            Minimum GPA (Optional)
                        </label>
                        <input type="number" id="gpa_requirement" name="gpa_requirement" value="{{ old('gpa_requirement') }}" step="0.1" min="0" max="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-900 focus:border-transparent focus:outline-none @error('gpa_requirement') border-red-500 @enderror" placeholder="e.g., 3.5">
                        @error('gpa_requirement')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Demographics -->
                    <div>
                        <label for="demographics" class="block text-sm font-medium text-gray-700 mb-2">
                            Demographics (Optional)
                        </label>
                        <input type="text" id="demographics" name="demographics" value="{{ old('demographics') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-900 focus:border-transparent focus:outline-none @error('demographics') border-red-500 @enderror" placeholder="e.g., First generation, Female students">
                        @error('demographics')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Field of Study -->
                    <div>
                        <label for="field_of_study" class="block text-sm font-medium text-gray-700 mb-2">
                            Field of Study (Optional)
                        </label>
                        <input type="text" id="field_of_study" name="field_of_study" value="{{ old('field_of_study') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-900 focus:border-transparent focus:outline-none @error('field_of_study') border-red-500 @enderror" placeholder="e.g., STEM, Business">
                        @error('field_of_study')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Criteria -->
                    <div class="md:col-span-2">
                        <label for="criteria" class="block text-sm font-medium text-gray-700 mb-2">
                            Criteria & Requirements <span class="text-red-500">*</span>
                        </label>
                        <textarea id="criteria" name="criteria" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-900 focus:border-transparent focus:outline-none @error('criteria') border-red-500 @enderror" placeholder="List the required criteria and eligibility requirements...">{{ old('criteria') }}</textarea>
                        @error('criteria')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="md:col-span-2">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select id="status" name="status" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-900 focus:border-transparent focus:outline-none @error('status') border-red-500 @enderror">
                            <option value="">Select Status</option>
                            <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="archived" {{ old('status') === 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mt-8 flex items-center justify-between border-t border-gray-200 pt-6">
                    <a href="{{ route('admin.scholarships.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">
                        Cancel
                    </a>
                    <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white px-6 py-2 rounded-md font-medium">
                        <i class="fas fa-save mr-2"></i>
                        Create Scholarship
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

