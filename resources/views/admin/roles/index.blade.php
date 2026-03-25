@extends('admin.layout')

@section('content')
<div class="flex flex-col">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 p-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">Roles</h1>
            <a href="{{ route('admin.roles.create') }}" class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-md text-sm font-medium">
                <i class="fas fa-plus mr-2"></i>
                New Role
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        @if(session('status'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-md flex items-center">
                <i class="fas fa-check-circle mr-3"></i>
                {{ session('status') === 'role-created' ? 'Role created successfully!' : (session('status') === 'role-updated' ? 'Role updated successfully!' : 'Role deleted successfully!') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-800 rounded-md flex items-center">
                <i class="fas fa-times-circle mr-3"></i>
                {{ session('error') }}
            </div>
        @endif

        @if($roles->isEmpty())
            <div class="bg-white rounded-lg shadow p-12 text-center">
                <i class="fas fa-shield-alt text-gray-400 text-5xl mb-4"></i>
                <p class="text-gray-600 text-lg">No roles found.</p>
                <a href="{{ route('admin.roles.create') }}" class="mt-4 inline-block bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-md text-sm font-medium">
                    Create First Role
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
                                Permissions
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($roles as $role)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ ucfirst($role->name) }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $role->description ?? '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $role->permissions_count }} {{ $role->permissions_count === 1 ? 'permission' : 'permissions' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if(in_array($role->name, ['admin', 'staff', 'reviewer']))
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Protected
                                        </span>
                                    @else
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            Editable
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <a href="{{ route('admin.roles.edit', $role) }}" class="text-blue-900 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    @if(!in_array($role->name, ['admin', 'staff', 'reviewer']))
                                        <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this role?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </button>
                                        </form>
                                    @endif
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
