@extends('admin.layout')

@section('content')
<div class="flex flex-col">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 p-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">Users</h1>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        @if(session('status'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-md flex items-center">
                <i class="fas fa-check-circle mr-3"></i>
                {{ session('status') === 'user-roles-updated' ? 'User roles updated successfully!' : 'Operation completed successfully!' }}
            </div>
        @endif

        @if($users->isEmpty())
            <div class="bg-white rounded-lg shadow p-12 text-center">
                <i class="fas fa-users text-gray-400 text-5xl mb-4"></i>
                <p class="text-gray-600 text-lg">No users found.</p>
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
                                Email
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                Roles
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                Created
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    @if($user->roles->isEmpty())
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            No roles
                                        </span>
                                    @else
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($user->roles as $role)
                                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    {{ ucfirst($role->name) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $user->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <a href="{{ route('admin.users.edit-roles', $user) }}" class="text-blue-900 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                    </a>
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
