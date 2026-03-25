@extends('admin.layout')

@section('content')
<div class="flex flex-col">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 p-6">
        <div class="flex items-center">
            <a href="{{ route('admin.roles.index') }}" class="text-blue-900 hover:text-blue-800">
                <i class="fas fa-arrow-left mr-2"></i>Back
            </a>
            <h1 class="text-3xl font-bold text-gray-900 ml-4">Create Role</h1>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <div class="max-w-4xl bg-white rounded-lg shadow">
            <form action="{{ route('admin.roles.store') }}" method="POST" class="p-8">
                @csrf

                <div class="grid grid-cols-1 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Role Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-900 focus:border-transparent focus:outline-none @error('name') border-red-500 @enderror" placeholder="e.g., moderator, editor">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-900 focus:border-transparent focus:outline-none @error('description') border-red-500 @enderror" placeholder="Describe the purpose of this role...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Permissions -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-4">
                            Assign Permissions
                        </label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 bg-gray-50 rounded-md border border-gray-200">
                            @forelse($permissions as $permission)
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="w-4 h-4 text-blue-900 rounded border-gray-300 focus:ring-blue-900" {{ in_array($permission->name, old('permissions', [])) ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-700">
                                        <strong>{{ ucfirst(str_replace('-', ' ', $permission->name)) }}</strong>
                                        @if($permission->description)
                                            <br>
                                            <span class="text-gray-500 text-xs">{{ $permission->description }}</span>
                                        @endif
                                    </span>
                                </label>
                            @empty
                                <p class="text-gray-600 text-sm">No permissions available. Create permissions first.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="mt-8 flex items-center justify-between border-t border-gray-200 pt-6">
                    <a href="{{ route('admin.roles.index') }}" class="text-gray-600 hover:text-gray-800">
                        Cancel
                    </a>
                    <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white px-6 py-2 rounded-md text-sm font-medium">
                        <i class="fas fa-save mr-2"></i>
                        Create Role
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
