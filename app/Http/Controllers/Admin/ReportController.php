<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Scholarship;
use Spatie\Permission\Models\Role;

class ReportController extends Controller
{
    public function index()
    {
        $applicationStats = Application::selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $scholarshipStats = Scholarship::selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $userStats = Role::withCount('users')->get()->pluck('users_count', 'name');

        $applications = Application::with(['user', 'applicantProfile'])
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
