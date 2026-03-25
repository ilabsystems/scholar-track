<?php

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

describe('Role Management', function () {
    beforeEach(function () {
        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');

        $this->nonAdmin = User::factory()->create();
        $this->nonAdmin->assignRole('applicant');
    });

    describe('Authorization', function () {
        it('prevents non-admin users from accessing role index', function () {
            $response = $this->actingAs($this->nonAdmin)
                ->get(route('admin.roles.index'));

            $response->assertStatus(403);
        });

        it('prevents non-admin users from accessing role create', function () {
            $response = $this->actingAs($this->nonAdmin)
                ->get(route('admin.roles.create'));

            $response->assertStatus(403);
        });

        it('allows admin users to access role management pages', function () {
            $response = $this->actingAs($this->admin)
                ->get(route('admin.roles.index'));

            $response->assertSuccessful();
        });
    });

    describe('Role CRUD Operations', function () {
        it('displays list of roles', function () {
            Role::create(['name' => 'test-role', 'description' => 'Test role']);

            $response = $this->actingAs($this->admin)
                ->get(route('admin.roles.index'));

            $response->assertSuccessful();
            $response->assertSee('test-role');
            $response->assertSee('Test role');
        });

        it('shows create role form', function () {
            $response = $this->actingAs($this->admin)
                ->get(route('admin.roles.create'));

            $response->assertSuccessful();
            $response->assertSee('Create Role');
        });

        it('creates a new role with permissions', function () {
            Permission::create(['name' => 'test-permission', 'description' => 'Test permission']);

            $response = $this->actingAs($this->admin)->post(
                route('admin.roles.store'),
                [
                    'name' => 'new-role',
                    'description' => 'A new test role',
                    'permissions' => ['test-permission'],
                ]
            );

            $response->assertRedirect(route('admin.roles.edit', Role::where('name', 'new-role')->first()));

            $role = Role::where('name', 'new-role')->first();
            expect($role)->not->toBeNull();
            expect($role->description)->toBe('A new test role');
            expect($role->hasPermissionTo('test-permission'))->toBeTrue();
        });

        it('validates required fields when creating role', function () {
            $response = $this->actingAs($this->admin)
                ->post(route('admin.roles.store'), []);

            $response->assertSessionHasErrors(['name', 'description']);
        });

        it('prevents duplicate role names', function () {
            Role::create(['name' => 'duplicate-role', 'description' => 'Duplicate']);

            $response = $this->actingAs($this->admin)
                ->post(route('admin.roles.store'), [
                    'name' => 'duplicate-role',
                    'description' => 'Another description',
                ]);

            $response->assertSessionHasErrors('name');
        });

        it('updates role with new permissions', function () {
            $permission1 = Permission::create(['name' => 'perm1', 'description' => 'Permission 1']);
            $permission2 = Permission::create(['name' => 'perm2', 'description' => 'Permission 2']);

            $role = Role::create(['name' => 'editable-role', 'description' => 'Original']);
            $role->givePermissionTo('perm1');

            $response = $this->actingAs($this->admin)->put(
                route('admin.roles.update', $role),
                [
                    'name' => 'editable-role',
                    'description' => 'Updated role',
                    'permissions' => ['perm2'],
                ]
            );

            $response->assertRedirect(route('admin.roles.index'));

            $role->refresh();
            expect($role->description)->toBe('Updated role');
            expect($role->hasPermissionTo('perm1'))->toBeFalse();
            expect($role->hasPermissionTo('perm2'))->toBeTrue();
        });

        it('shows edit role form', function () {
            $role = Role::create(['name' => 'edit-test', 'description' => 'Test']);

            $response = $this->actingAs($this->admin)
                ->get(route('admin.roles.edit', $role));

            $response->assertSuccessful();
            $response->assertSee('edit-test');
        });
    });

    describe('Protected Roles', function () {
        it('prevents deletion of protected roles', function () {
            foreach (['admin', 'staff', 'reviewer'] as $roleName) {
                $role = Role::where('name', $roleName)->first();

                $response = $this->actingAs($this->admin)
                    ->delete(route('admin.roles.destroy', $role));

                $response->assertRedirect(route('admin.roles.index'));
                $response->assertSessionHas('error');

                expect(Role::where('name', $roleName)->exists())->toBeTrue();
            }
        });

        it('allows deletion of non-protected roles', function () {
            $role = Role::create(['name' => 'deletable-role', 'description' => 'Can be deleted']);

            $response = $this->actingAs($this->admin)
                ->delete(route('admin.roles.destroy', $role));

            $response->assertRedirect(route('admin.roles.index'));
            $response->assertSessionHas('status', 'role-deleted');

            expect(Role::where('name', 'deletable-role')->exists())->toBeFalse();
        });

        it('displays protected role badge on index', function () {
            $response = $this->actingAs($this->admin)
                ->get(route('admin.roles.index'));

            $response->assertSee('Protected');
        });
    });
});
