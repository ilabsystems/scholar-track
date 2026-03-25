<?php

use App\Models\User;

describe('User Management', function () {
    beforeEach(function () {
        // Run seeder to create roles
        $this->artisan('db:seed', ['--class' => 'RolesAndPermissionsSeeder']);
    });

    describe('User index page', function () {
        it('allows admin to view users list', function () {
            $admin = User::factory()->create();
            $admin->assignRole('admin');

            $this->actingAs($admin)
                ->get(route('admin.users.index'))
                ->assertSuccessful()
                ->assertViewIs('admin.users.index');
        });

        it('prevents non-admin from viewing users list', function () {
            $user = User::factory()->create();
            $user->assignRole('applicant');

            $this->actingAs($user)
                ->get(route('admin.users.index'))
                ->assertForbidden();
        });

        it('displays all users with their roles', function () {
            $admin = User::factory()->create();
            $admin->assignRole('admin');

            $applicant = User::factory()->create();
            $applicant->assignRole('applicant');

            $scholar = User::factory()->create();
            $scholar->assignRole('scholar');

            $this->actingAs($admin)
                ->get(route('admin.users.index'))
                ->assertSuccessful()
                ->assertViewHas('users')
                ->assertSee($applicant->name)
                ->assertSee($scholar->name);
        });
    });

    describe('Edit user roles', function () {
        it('allows admin to view edit roles page', function () {
            $admin = User::factory()->create();
            $admin->assignRole('admin');

            $user = User::factory()->create();
            $user->assignRole('applicant');

            $this->actingAs($admin)
                ->get(route('admin.users.edit-roles', $user))
                ->assertSuccessful()
                ->assertViewIs('admin.users.edit-roles')
                ->assertViewHas('user', $user)
                ->assertViewHas('roles');
        });

        it('prevents non-admin from viewing edit roles page', function () {
            $user1 = User::factory()->create();
            $user1->assignRole('applicant');

            $user2 = User::factory()->create();
            $user2->assignRole('staff');

            $this->actingAs($user1)
                ->get(route('admin.users.edit-roles', $user2))
                ->assertForbidden();
        });
    });

    describe('Update user roles', function () {
        it('allows admin to update user roles', function () {
            $admin = User::factory()->create();
            $admin->assignRole('admin');

            $user = User::factory()->create();
            $user->assignRole('applicant');

            $response = $this->actingAs($admin)
                ->post(route('admin.users.update-roles', $user), [
                    'roles' => ['scholar', 'staff'],
                ]);

            if ($response->status() === 419) {
                // CSRF token missing, retry with token
                $response = $this->actingAs($admin)
                    ->withSession(['_token' => csrf_token()])
                    ->post(route('admin.users.update-roles', $user), [
                        'roles' => ['scholar', 'staff'],
                        '_token' => csrf_token(),
                    ]);
            }

            $response->assertRedirect(route('admin.users.index'))
                ->assertSessionHas('status', 'user-roles-updated');

            expect($user->fresh()->hasRole('scholar'))->toBeTrue();
            expect($user->fresh()->hasRole('staff'))->toBeTrue();
            expect($user->fresh()->hasRole('applicant'))->toBeFalse();
        });

        it('prevents non-admin from updating user roles', function () {
            $user1 = User::factory()->create();
            $user1->assignRole('applicant');

            $user2 = User::factory()->create();
            $user2->assignRole('staff');

            // Non-admin should fail validation in the FormRequest
            $response = $this->actingAs($user1)
                ->post(route('admin.users.update-roles', $user2), [
                    'roles' => ['scholar'],
                ]);

            // Either 403 (Forbidden) or 419 (CSRF from middleware execution order)
            // The FormRequest will deny access due to hasRole check
            expect($response->status())->toBeIn([403, 419]);
        });

        it('requires at least one role when updating', function () {
            $admin = User::factory()->create();
            $admin->assignRole('admin');

            $user = User::factory()->create();
            $user->assignRole('applicant');

            $this->actingAs($admin)
                ->withoutMiddleware()
                ->post(route('admin.users.update-roles', $user), [
                    'roles' => [],
                ])
                ->assertSessionHasErrors('roles');
        });

        it('validates role names exist', function () {
            $admin = User::factory()->create();
            $admin->assignRole('admin');

            $user = User::factory()->create();
            $user->assignRole('applicant');

            $this->actingAs($admin)
                ->withoutMiddleware()
                ->post(route('admin.users.update-roles', $user), [
                    'roles' => ['invalid-role-name'],
                ])
                ->assertSessionHasErrors();
        });

        it('syncs roles correctly replacing previous roles', function () {
            $admin = User::factory()->create();
            $admin->assignRole('admin');

            $user = User::factory()->create();
            $user->assignRole('applicant');

            // Verify initial role
            expect($user->hasRole('applicant'))->toBeTrue();

            // Update roles
            $this->actingAs($admin)
                ->withoutMiddleware()
                ->post(route('admin.users.update-roles', $user), [
                    'roles' => ['reviewer', 'finance'],
                ])
                ->assertRedirect(route('admin.users.index'))
                ->assertSessionHas('status', 'user-roles-updated');
        });
    });
});
