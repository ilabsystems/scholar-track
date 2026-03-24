<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScholarshipRequest;
use App\Http\Requests\UpdateScholarshipRequest;
use App\Models\Scholarship;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $scholarships = Scholarship::with('creator')->latest()->get();

        return view('admin.scholarships.index', compact('scholarships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.scholarships.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScholarshipRequest $request): RedirectResponse
    {
        Scholarship::create([
            ...$request->validated(),
            'created_by' => $request->user()->id,
        ]);

        return redirect()->route('admin.scholarships.index')
            ->with('status', 'scholarship-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Scholarship $scholarship): View
    {
        $scholarship->load('creator');

        return view('admin.scholarships.show', compact('scholarship'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scholarship $scholarship): View
    {
        return view('admin.scholarships.edit', compact('scholarship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScholarshipRequest $request, Scholarship $scholarship): RedirectResponse
    {
        $scholarship->update($request->validated());

        return redirect()->route('admin.scholarships.index')
            ->with('status', 'scholarship-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scholarship $scholarship): RedirectResponse
    {
        $scholarship->delete();

        return redirect()->route('admin.scholarships.index')
            ->with('status', 'scholarship-deleted');
    }
}
