<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of roles.
     */
    public function index(): View
    {
        $roles = Role::withCount('permissions')->latest()->get();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     */
    public function create(): View
    {
        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created role in storage.
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $role = Role::create([
            'name' => $request->validated('name'),
            'description' => $request->validated('description'),
        ]);

        $role->syncPermissions($request->validated('permissions', []));

        return redirect()->route('admin.roles.edit', $role)
            ->with('status', 'role-created');
    }

    /**
     * Show the form for editing the specified role.
     */
    public function edit(Role $role): View
    {
        $permissions = Permission::all();
        $role->load('permissions');

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified role in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        $role->update([
            'name' => $request->validated('name'),
            'description' => $request->validated('description'),
        ]);

        $role->syncPermissions($request->validated('permissions', []));

        return redirect()->route('admin.roles.index')
            ->with('status', 'role-updated');
    }

    /**
     * Delete the specified role from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        // Prevent deletion of protected roles
        if (in_array($role->name, ['admin', 'staff', 'reviewer'])) {
            return redirect()->route('admin.roles.index')
                ->with('error', "The {$role->name} role cannot be deleted.");
        }

        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('status', 'role-deleted');
    }
}
