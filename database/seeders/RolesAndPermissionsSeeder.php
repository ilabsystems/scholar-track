<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create MVP-aligned permissions only.
        $permissions = [
            // Applicant / Scholar permissions
            'create-account',
            'fill-application-form',
            'upload-documents',
            'track-application-status',

            // Admin / Staff pipeline permissions
            'manage-scholarship-programs',
            'review-applications',
            'verify-documents',
            'approve-reject-applications',
            'manage-scholar-profiles',

            // Admin access control
            'manage-users-roles',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $roles = [
            'applicant' => [
                'create-account',
                'fill-application-form',
                'upload-documents',
                'track-application-status',
            ],
            'scholar' => [
                'create-account',
                'fill-application-form',
                'upload-documents',
                'track-application-status',
            ],
            'staff' => [
                'manage-scholarship-programs',
                'review-applications',
                'verify-documents',
                'approve-reject-applications',
                'manage-scholar-profiles',
            ],
            'reviewer' => [
                'review-applications',
                'verify-documents',
                'approve-reject-applications',
            ],
            'finance' => [
                'track-application-status',
            ],
            'admin' => [
                'manage-users-roles',
                // Admins can also do the complete application pipeline.
                'create-account',
                'manage-scholarship-programs',
                'fill-application-form',
                'upload-documents',
                'track-application-status',
                'review-applications',
                'verify-documents',
                'approve-reject-applications',
                'manage-scholar-profiles',
            ],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }
    }
}
