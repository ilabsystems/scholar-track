<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of permissions.
     */
    public function index(): View
    {
        $permissions = Permission::withCount('roles')->latest()->get();

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new permission.
     */
    public function create(): View
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created permission in storage.
     */
    public function store(StorePermissionRequest $request): RedirectResponse
    {
        Permission::create([
            'name' => $request->validated('name'),
            'description' => $request->validated('description'),
        ]);

        return redirect()->route('admin.permissions.index')
            ->with('status', 'permission-created');
    }

    /**
     * Show the form for editing the specified permission.
     */
    public function edit(Permission $permission): View
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified permission in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission): RedirectResponse
    {
        $permission->update([
            'name' => $request->validated('name'),
            'description' => $request->validated('description'),
        ]);

        return redirect()->route('admin.permissions.index')
            ->with('status', 'permission-updated');
    }

    /**
     * Delete the specified permission from storage.
     */
    public function destroy(Permission $permission): RedirectResponse
    {
        // Prevent deletion of permission if assigned to protected roles
        $protectedRoles = ['admin', 'staff', 'reviewer'];
        $assignedToProtected = Role::whereIn('name', $protectedRoles)
            ->whereHas('permissions', function ($query) use ($permission) {
                $query->where('permissions.id', $permission->id);
            })
            ->exists();

        if ($assignedToProtected) {
            return redirect()->route('admin.permissions.index')
                ->with('error', 'This permission cannot be deleted because it is assigned to a protected role.');
        }

        $permission->delete();

        return redirect()->route('admin.permissions.index')
            ->with('status', 'permission-deleted');
    }
}
