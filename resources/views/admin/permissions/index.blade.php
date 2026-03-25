@extends('admin.layout')

@section('content')
<div class="flex flex-col">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 p-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">Permissions</h1>
            <a href="{{ route('admin.permissions.create') }}" class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-md text-sm font-medium">
                <i class="fas fa-plus mr-2"></i>
                New Permission
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        @if(session('status'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-md flex items-center">
                <i class="fas fa-check-circle mr-3"></i>
                {{ session('status') === 'permission-created' ? 'Permission created successfully!' : (session('status') === 'permission-updated' ? 'Permission updated successfully!' : 'Permission deleted successfully!') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-800 rounded-md flex items-center">
                <i class="fas fa-times-circle mr-3"></i>
                {{ session('error') }}
            </div>
        @endif

        @if($permissions->isEmpty())
            <div class="bg-white rounded-lg shadow p-12 text-center">
                <i class="fas fa-lock text-gray-400 text-5xl mb-4"></i>
                <p class="text-gray-600 text-lg">No permissions found.</p>
                <a href="{{ route('admin.permissions.create') }}" class="mt-4 inline-block bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-md text-sm font-medium">
                    Create First Permission
                </a>
            </div>
        @else
            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                Description
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                Assigned To Roles
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($permissions as $permission)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ ucfirst(str_replace('-', ' ', $permission->name)) }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $permission->description ?? '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $permission->roles_count }} {{ $permission->roles_count === 1 ? 'role' : 'roles' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <a href="{{ route('admin.permissions.edit', $permission) }}" class="text-blue-900 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this permission?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
