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

        // Create permissions
        $permissions = [
            // Scholar/Applicant permissions
            'create-account',
            'verify-identity',
            'fill-application-form',
            'upload-documents',
            'view-checklist',
            'track-application-status',
            'receive-notifications',
            'submit-renewal-requirements',
            'view-scholarship-terms',
            'view-disbursement-schedule',
            'download-award-notice',

            // Staff permissions
            'manage-scholarship-programs',
            'encode-scholar-records',
            'validate-documents',
            'flag-application-correction',
            'detect-duplicates',
            'assign-applications',
            'filter-search-scholars',
            'export-applicant-lists',

            // Reviewer permissions
            'view-assigned-applications',
            'score-applicants',
            'add-remarks-recommendations',
            'view-ranked-list',
            'approve-deny-applications',
            'bulk-approve-batch',

            // Finance permissions
            'generate-disbursement-batches',
            'set-disbursement-tranches',
            'mark-tranche-released',
            'handle-exceptions',
            'reconcile-budget',
            'export-payout-reports',

            // Admin permissions
            'manage-users-roles',
            'configure-requirement-templates',
            'configure-scoring-criteria',
            'manage-master-data',
            'view-audit-logs',
            'set-data-retention',

            // Reporting permissions (cross-role)
            'view-dashboard-totals',
            'view-reports-by-location',
            'view-compliance-reports',
            'generate-scholar-history',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $roles = [
            'applicant' => [
                'create-account',
                'verify-identity',
                'fill-application-form',
                'upload-documents',
                'view-checklist',
                'view-scholarship-terms',
                'view-dashboard-totals',
            ],
            'scholar' => [
                'create-account',
                'verify-identity',
                'fill-application-form',
                'upload-documents',
                'view-checklist',
                'track-application-status',
                'receive-notifications',
                'submit-renewal-requirements',
                'view-scholarship-terms',
                'view-disbursement-schedule',
                'download-award-notice',
                'view-dashboard-totals',
                'view-reports-by-location',
                'view-compliance-reports',
                'generate-scholar-history',
            ],
            'staff' => [
                'manage-scholarship-programs',
                'encode-scholar-records',
                'validate-documents',
                'flag-application-correction',
                'detect-duplicates',
                'assign-applications',
                'filter-search-scholars',
                'export-applicant-lists',
                'view-dashboard-totals',
                'view-reports-by-location',
                'view-compliance-reports',
                'generate-scholar-history',
            ],
            'reviewer' => [
                'view-assigned-applications',
                'score-applicants',
                'add-remarks-recommendations',
                'view-ranked-list',
                'approve-deny-applications',
                'bulk-approve-batch',
                'view-dashboard-totals',
                'view-reports-by-location',
                'view-compliance-reports',
                'generate-scholar-history',
            ],
            'finance' => [
                'generate-disbursement-batches',
                'set-disbursement-tranches',
                'mark-tranche-released',
                'handle-exceptions',
                'reconcile-budget',
                'export-payout-reports',
                'view-dashboard-totals',
                'view-reports-by-location',
                'view-compliance-reports',
                'generate-scholar-history',
            ],
            'admin' => [
                'manage-users-roles',
                'configure-requirement-templates',
                'configure-scoring-criteria',
                'manage-master-data',
                'view-audit-logs',
                'set-data-retention',
                'view-dashboard-totals',
                'view-reports-by-location',
                'view-compliance-reports',
                'generate-scholar-history',
                // Admins can also do everything else
                'manage-scholarship-programs',
                'encode-scholar-records',
                'validate-documents',
                'flag-application-correction',
                'detect-duplicates',
                'assign-applications',
                'filter-search-scholars',
                'export-applicant-lists',
                'view-assigned-applications',
                'score-applicants',
                'add-remarks-recommendations',
                'view-ranked-list',
                'approve-deny-applications',
                'bulk-approve-batch',
                'generate-disbursement-batches',
                'set-disbursement-tranches',
                'mark-tranche-released',
                'handle-exceptions',
                'reconcile-budget',
                'export-payout-reports',
            ],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }
    }
}
