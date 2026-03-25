<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Models\Application;
use App\Models\Scholarship;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    /**
     * Show the form for creating a new application to a scholarship.
     */
    public function create(Scholarship $scholarship): View
    {
        $this->authorize('create', [Application::class, $scholarship]);

        $userApplicantProfile = auth()->user()->applicantProfile;

        return view('applications.create', [
            'scholarship' => $scholarship,
            'userApplicantProfile' => $userApplicantProfile,
        ]);
    }

    /**
     * Store a newly created application or update an existing draft.
     */
    public function store(StoreApplicationRequest $request, Scholarship $scholarship): RedirectResponse
    {
        $data = $request->validated();

        $application = Application::updateOrCreate(
            [
                'user_id' => $request->user()->id,
                'scholarship_id' => $scholarship->id,
            ],
            [
                ...$data,
                'status' => $request->has('submit') ? 'submitted' : 'draft',
                'submitted_at' => $request->has('submit') ? now() : null,
            ]
        );

        $message = $request->has('submit')
            ? 'Application submitted successfully!'
            : 'Application saved as draft.';

        return redirect()->route('applications.show', $application)
            ->with('status', $message);
    }

    /**
     * Display a listing of the authenticated user's applications.
     */
    public function index(): View
    {
        $applications = auth()->user()->applications()
            ->with(['scholarship', 'applicantProfile'])
            ->latest('created_at')
            ->paginate(15);

        $statusCounts = [
            'draft' => auth()->user()->applications()->where('status', 'draft')->count(),
            'submitted' => auth()->user()->applications()->where('status', 'submitted')->count(),
            'under_review' => auth()->user()->applications()->where('status', 'under_review')->count(),
            'approved' => auth()->user()->applications()->where('status', 'approved')->count(),
            'rejected' => auth()->user()->applications()->where('status', 'rejected')->count(),
            'withdrawn' => auth()->user()->applications()->where('status', 'withdrawn')->count(),
        ];

        return view('applications.index', [
            'applications' => $applications,
            'statusCounts' => $statusCounts,
        ]);
    }

    /**
     * Display the specified application.
     */
    public function show(Application $application): View
    {
        $this->authorize('view', $application);

        $application->load(['scholarship', 'applicantProfile', 'assignee', 'reviewer']);

        return view('applications.show', [
            'application' => $application,
        ]);
    }

    /**
     * Withdraw the specified application.
     */
    public function withdraw(Application $application): RedirectResponse
    {
        $this->authorize('update', $application);

        if (! $application->canWithdraw()) {
            return back()->with('error', 'This application cannot be withdrawn.');
        }

        $application->update([
            'status' => 'withdrawn',
        ]);

        return redirect()->route('applications.index')
            ->with('status', 'Application withdrawn successfully.');
    }
}
