@extends('admin.layout')

@section('content')
<div class="flex flex-col">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200 p-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Users</h1>
                <p class="mt-1 text-sm text-gray-500">Manage all registered users and their roles.</p>
            </div>
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

        {{-- Filters --}}
        <form method="GET" action="{{ route('admin.users.index') }}" class="mb-4 flex flex-wrap gap-3">
            <div class="relative flex-1 min-w-48">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fas fa-search text-gray-400 text-sm"></i>
                </div>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search name or email..."
                    class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-slate-500">
            </div>
            <select name="role" class="border border-gray-300 rounded-md text-sm px-3 py-2 focus:outline-none focus:ring-1 focus:ring-slate-500">
                <option value="">All Roles</option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}" {{ request('role') === $role->name ? 'selected' : '' }}>{{ ucfirst($role->name) }}</option>
                @endforeach
            </select>
            <button type="submit" class="px-4 py-2 bg-slate-900 text-white text-sm font-medium rounded-md hover:bg-slate-700">
                Filter
            </button>
            @if(request('search') || request('role'))
                <a href="{{ route('admin.users.index') }}" class="px-4 py-2 border border-gray-300 text-gray-600 text-sm font-medium rounded-md hover:bg-gray-50">
                    Clear
                </a>
            @endif
        </form>

        {{-- Table --}}
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-9 w-9 rounded-full bg-slate-700 flex items-center justify-center text-white text-sm font-medium shrink-0">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @foreach($user->roles as $role)
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ ucfirst($role->name) }}
                                    </span>
                                @endforeach
                                @if($user->roles->isEmpty())
                                    <span class="text-xs text-gray-400">No role</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.users.edit-roles', $user) }}" class="text-blue-900 hover:text-blue-800">
                                    <i class="fas fa-edit"></i> Edit Roles
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-sm text-gray-400">
                                <i class="fas fa-users text-3xl mb-3 block"></i>
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if($users->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
