<?php

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

describe('Permission Management', function () {
    beforeEach(function () {
        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');

        $this->nonAdmin = User::factory()->create();
        $this->nonAdmin->assignRole('applicant');
    });

    describe('Authorization', function () {
        it('prevents non-admin users from accessing permission index', function () {
            $response = $this->actingAs($this->nonAdmin)
                ->get(route('admin.permissions.index'));

            $response->assertStatus(403);
        });

        it('prevents non-admin users from accessing permission create', function () {
            $response = $this->actingAs($this->nonAdmin)
                ->get(route('admin.permissions.create'));

            $response->assertStatus(403);
        });

        it('allows admin users to access permission management pages', function () {
            $response = $this->actingAs($this->admin)
                ->get(route('admin.permissions.index'));

            $response->assertSuccessful();
        });
    });

    describe('Permission CRUD Operations', function () {
        it('displays list of permissions', function () {
            Permission::create(['name' => 'test-permission', 'description' => 'Test permission']);

            $response = $this->actingAs($this->admin)
                ->get(route('admin.permissions.index'));

            $response->assertSuccessful();
            $response->assertSee('test-permission');
            $response->assertSee('Test permission');
        });

        it('shows create permission form', function () {
            $response = $this->actingAs($this->admin)
                ->get(route('admin.permissions.create'));

            $response->assertSuccessful();
            $response->assertSee('Create Permission');
        });

        it('creates a new permission', function () {
            $response = $this->actingAs($this->admin)->post(
                route('admin.permissions.store'),
                [
                    'name' => 'new-permission',
                    'description' => 'A new test permission',
                ]
            );

            $response->assertRedirect(route('admin.permissions.index'));

            $permission = Permission::where('name', 'new-permission')->first();
            expect($permission)->not->toBeNull();
            expect($permission->description)->toBe('A new test permission');
        });

        it('validates required fields when creating permission', function () {
            $response = $this->actingAs($this->admin)
                ->post(route('admin.permissions.store'), []);

            $response->assertSessionHasErrors(['name', 'description']);
        });

        it('prevents duplicate permission names', function () {
            Permission::create(['name' => 'duplicate-perm', 'description' => 'Duplicate']);

            $response = $this->actingAs($this->admin)
                ->post(route('admin.permissions.store'), [
                    'name' => 'duplicate-perm',
                    'description' => 'Another description',
                ]);

            $response->assertSessionHasErrors('name');
        });

        it('updates permission', function () {
            $permission = Permission::create(['name' => 'update-test', 'description' => 'Original']);

            $response = $this->actingAs($this->admin)->put(
                route('admin.permissions.update', $permission),
                [
                    'name' => 'update-test',
                    'description' => 'Updated description',
                ]
            );

            $response->assertRedirect(route('admin.permissions.index'));

            $permission->refresh();
            expect($permission->description)->toBe('Updated description');
        });

        it('shows edit permission form', function () {
            $permission = Permission::create(['name' => 'edit-test', 'description' => 'Test']);

            $response = $this->actingAs($this->admin)
                ->get(route('admin.permissions.edit', $permission));

            $response->assertSuccessful();
            $response->assertSee('edit-test');
        });
    });

    describe('Protected Role Constraints', function () {
        it('prevents deletion of permission assigned to protected role', function () {
            $permission = Permission::create(['name' => 'protected-perm', 'description' => 'Protected']);

            // Assign to admin role (protected)
            $adminRole = Role::where('name', 'admin')->first();
            $adminRole->givePermissionTo('protected-perm');

            $response = $this->actingAs($this->admin)
                ->delete(route('admin.permissions.destroy', $permission));

            $response->assertRedirect(route('admin.permissions.index'));
            $response->assertSessionHas('error');

            expect(Permission::where('name', 'protected-perm')->exists())->toBeTrue();
        });

        it('allows deletion of permission not assigned to protected roles', function () {
            $permission = Permission::create(['name' => 'deletable-perm', 'description' => 'Deletable']);

            $response = $this->actingAs($this->admin)
                ->delete(route('admin.permissions.destroy', $permission));

            $response->assertRedirect(route('admin.permissions.index'));
            $response->assertSessionHas('status', 'permission-deleted');

            expect(Permission::where('name', 'deletable-perm')->exists())->toBeFalse();
        });

        it('displays role count for permissions', function () {
            $permission = Permission::create(['name' => 'count-test', 'description' => 'Count test']);
            $role = Role::create(['name' => 'count-role', 'description' => 'Count test role']);
            $role->givePermissionTo('count-test');

            $response = $this->actingAs($this->admin)
                ->get(route('admin.permissions.index'));

            $response->assertSuccessful();
            $response->assertSee('1 role');
        });
    });

    describe('Permission Assignment to Roles', function () {
        it('allows assigning permission to role', function () {
            $permission = Permission::create(['name' => 'assign-test', 'description' => 'Test']);
            $role = Role::create(['name' => 'assign-role', 'description' => 'Test role']);

            $response = $this->actingAs($this->admin)->put(
                route('admin.roles.update', $role),
                [
                    'name' => 'assign-role',
                    'description' => 'Test role',
                    'permissions' => ['assign-test'],
                ]
            );

            $response->assertRedirect(route('admin.roles.index'));

            $role->refresh();
            expect($role->hasPermissionTo('assign-test'))->toBeTrue();
        });

        it('allows removing permission from role', function () {
            $permission = Permission::create(['name' => 'remove-test', 'description' => 'Test']);
            $role = Role::create(['name' => 'remove-role', 'description' => 'Test role']);
            $role->givePermissionTo('remove-test');

            expect($role->hasPermissionTo('remove-test'))->toBeTrue();

            $response = $this->actingAs($this->admin)->put(
                route('admin.roles.update', $role),
                [
                    'name' => 'remove-role',
                    'description' => 'Test role',
                    'permissions' => [],
                ]
            );

            $response->assertRedirect(route('admin.roles.index'));

            $role->refresh();
            expect($role->hasPermissionTo('remove-test'))->toBeFalse();
        });
    });
});
