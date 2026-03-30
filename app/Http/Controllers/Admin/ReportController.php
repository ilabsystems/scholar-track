<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplicantProfile;
use App\Models\Scholarship;
use App\Models\User;
use Spatie\Permission\Models\Role;

class ReportController extends Controller
{
    public function index()
    {
        $applicationStats = ApplicantProfile::selectRaw('application_status as status, count(*) as total')
            ->groupBy('application_status')
            ->pluck('total', 'status');

        $scholarshipStats = Scholarship::selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $userStats = Role::withCount('users')->get()->pluck('users_count', 'name');

        $applications = ApplicantProfile::with('user')
            ->latest()
            ->paginate(15);

        return view('admin.reports.index', compact(
            'applicationStats',
            'scholarshipStats',
            'userStats',
            'applications'
        ));
    }
}
