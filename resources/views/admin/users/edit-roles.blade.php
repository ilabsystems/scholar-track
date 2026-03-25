@extends('admin.layout')

@section('content')
<div class="flex flex-col">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 p-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Edit User Roles</h1>
                <p class="text-gray-600 mt-1">{{ $user->name }} ({{ $user->email }})</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="text-blue-900 hover:text-blue-800">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Users
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <div class="max-w-2xl">
            <div class="bg-white rounded-lg shadow p-6">
                <form action="{{ route('admin.users.update-roles', $user) }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-900 mb-3">
                            Assign Roles
                        </label>
                        <div class="space-y-3">
                            @forelse($roles as $role)
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        id="role_{{ $role->id }}"
                                        name="roles[]"
                                        value="{{ $role->name }}"
                                        {{ $user->hasRole($role->name) ? 'checked' : '' }}
                                        class="h-4 w-4 text-blue-900 focus:ring-blue-900 border-gray-300 rounded"
                                    >
                                    <label for="role_{{ $role->id }}" class="ml-3 block text-sm text-gray-700 cursor-pointer">
                                        <span class="font-medium">{{ ucfirst($role->name) }}</span>
                                        @if($role->permissions->count() > 0)
                                            <span class="text-gray-500 text-xs ml-2">
                                                ({{ $role->permissions->count() }} permission{{ $role->permissions->count() !== 1 ? 's' : '' }})
                                            </span>
                                        @endif
                                    </label>
                                </div>
                            @empty
                                <p class="text-gray-600">No roles available.</p>
                            @endforelse
                        </div>
                        @error('roles')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center space-x-3 pt-6 border-t border-gray-200">
                        <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-save mr-2"></i>
                            Save Roles
                        </button>
                        <a href="{{ route('admin.users.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-900 px-4 py-2 rounded-md text-sm font-medium">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>

            <!-- Role Details Section -->
            @if($user->roles->isNotEmpty())
                <div class="mt-8 bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Current Roles & Permissions</h2>
                    <div class="space-y-6">
                        @foreach($user->roles as $role)
                            <div class="border-l-4 border-blue-900 pl-4">
                                <h3 class="font-medium text-gray-900">{{ ucfirst($role->name) }}</h3>
                                @if($role->permissions->isNotEmpty())
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-600 mb-2">Permissions:</p>
                                        <ul class="grid grid-cols-2 gap-2">
                                            @foreach($role->permissions as $permission)
                                                <li class="text-sm text-gray-600">
                                                    <i class="fas fa-check text-green-600 mr-2"></i>
                                                    {{ ucfirst(str_replace('-', ' ', $permission->name)) }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <p class="text-sm text-gray-600 mt-2">No permissions assigned.</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
