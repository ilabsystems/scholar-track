<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRolesRequest;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @throws AuthorizationException
     */
    public function index(): View
    {
        if (! auth()->user()->hasRole('admin')) {
            throw new AuthorizationException('Unauthorized');
        }

        $query = User::with('roles')->latest();

        if (request('search')) {
            $search = request('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if (request('role')) {
            $query->whereHas('roles', fn($q) => $q->where('name', request('role')));
        }

        $users = $query->paginate(15)->withQueryString();
        $roles = Role::all();

        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for editing user roles.
     *
     * @throws AuthorizationException
     */
    public function editRoles(User $user): View
    {
        if (! auth()->user()->hasRole('admin')) {
            throw new AuthorizationException('Unauthorized');
        }

        $user->load('roles');
        $roles = Role::all();

        return view('admin.users.edit-roles', compact('user', 'roles'));
    }

    /**
     * Update the specified user's roles.
     */
    public function updateRoles(UpdateUserRolesRequest $request, User $user): RedirectResponse
    {
        $user->syncRoles($request->validated('roles', []));

        return redirect()->route('admin.users.index')
            ->with('status', 'user-roles-updated');
    }
}
