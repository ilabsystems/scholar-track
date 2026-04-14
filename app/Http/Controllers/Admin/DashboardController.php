<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ScholarProfile;
use App\Models\Scholarship;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_scholarships' => Scholarship::count(),
            'total_applications' => Application::count(),
            'active_scholars' => ScholarProfile::where('status', 'active')->count(),
            'pending_applications' => Application::whereIn('status', ['submitted', 'under_review'])->count(),
            'active_scholarships' => Scholarship::where('status', 'active')->count(),
        ];

        $recent_applications = Application::with(['user', 'applicantProfile'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_applications'));
    }
}
