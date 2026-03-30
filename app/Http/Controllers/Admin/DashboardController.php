<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplicantProfile;
use App\Models\Scholarship;
use App\Models\ScholarProfile;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users'       => User::count(),
            'total_scholarships' => Scholarship::count(),
            'total_applications' => ApplicantProfile::count(),
            'active_scholars'   => ScholarProfile::where('status', 'active')->count(),
            'pending_applications' => ApplicantProfile::where('application_status', 'pending')->count(),
            'active_scholarships'  => Scholarship::where('status', 'active')->count(),
        ];

        $recent_applications = ApplicantProfile::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_applications'));
    }
}
