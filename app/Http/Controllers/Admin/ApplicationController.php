<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    public function index(Request $request): View
    {
        $query = Application::with(['user', 'scholarship', 'applicantProfile', 'assignee', 'reviewer']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by scholarship
        if ($request->filled('scholarship_id')) {
            $query->where('scholarship_id', $request->scholarship_id);
        }

        // Filter by assignee
        if ($request->filled('assigned_to')) {
            $query->where('assigned_to', $request->assigned_to);
        }

        // Search by applicant name or email
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $applications = $query->latest()->paginate(15);

        $scholarships = Scholarship::orderBy('name')->get();
        $reviewers = User::role(['admin', 'staff', 'reviewer', 'municipality', 'peso_officer'])
            ->orderBy('name')
            ->get();

        $statuses = [
            'draft' => 'Draft',
            'submitted' => 'Submitted',
            'under_review' => 'Under Review',
            'approved' => 'Approved',
            'rejected' => 'Rejected',
            'withdrawn' => 'Withdrawn',
        ];

        return view('admin.applications.index', compact(
            'applications',
            'scholarships',
            'reviewers',
            'statuses'
        ));
    }

    public function show(Application $application): View
    {
        $application->load([
            'user',
            'scholarship',
            'applicantProfile',
            'assignee',
            'reviewer',
        ]);

        $reviewers = User::role(['admin', 'staff', 'reviewer', 'municipality', 'peso_officer'])
            ->orderBy('name')
            ->get();

        return view('admin.applications.show', compact('application', 'reviewers'));
    }

    public function update(Request $request, Application $application): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:draft,submitted,under_review,approved,rejected,withdrawn',
            'assigned_to' => 'nullable|exists:users,id',
            'score' => 'nullable|numeric|min:0|max:100',
            'remarks' => 'nullable|string|max:1000',
        ]);

        $data = $request->only(['status', 'assigned_to', 'score', 'remarks']);

        if ($request->filled('assigned_to')) {
            $data['assigned_to'] = $request->assigned_to;
        } else {
            $data['assigned_to'] = null;
        }

        // Set reviewed_at if status changed to approved/rejected
        if (in_array($request->status, ['approved', 'rejected']) && ! in_array($application->status, ['approved', 'rejected'])) {
            $data['reviewed_at'] = now();
            $data['reviewed_by'] = auth()->id();
        }

        $application->update($data);

        return redirect()->back()->with('success', 'Application updated successfully.');
    }
}
