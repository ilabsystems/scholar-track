@extends('admin.layout')

@section('content')
<div class="flex flex-col">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 p-6">
        <div class="flex items-center">
            <a href="{{ route('admin.permissions.index') }}" class="text-blue-900 hover:text-blue-800">
                <i class="fas fa-arrow-left mr-2"></i>Back
            </a>
            <h1 class="text-3xl font-bold text-gray-900 ml-4">Edit Permission</h1>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <div class="max-w-4xl bg-white rounded-lg shadow">
            <form action="{{ route('admin.permissions.update', $permission) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Permission Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name', $permission->name) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-900 focus:border-transparent focus:outline-none @error('name') border-red-500 @enderror" placeholder="e.g., create-posts, delete-users">
                        <p class="mt-1 text-xs text-gray-500">Use lowercase with hyphens</p>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-900 focus:border-transparent focus:outline-none @error('description') border-red-500 @enderror">{{ old('description', $permission->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Actions -->
                <div class="mt-8 flex items-center justify-between border-t border-gray-200 pt-6">
                    <a href="{{ route('admin.permissions.index') }}" class="text-gray-600 hover:text-gray-800">
                        Cancel
                    </a>
                    <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white px-6 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-save mr-2"></i>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
