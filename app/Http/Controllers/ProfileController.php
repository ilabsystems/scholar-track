<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantProfileUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Display the user's applicant profile form.
     */
    public function editApplicant(Request $request): View
    {
        return view('profile.applicant', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's applicant profile information.
     */
    public function updateApplicant(ApplicantProfileUpdateRequest $request): RedirectResponse
    {
        $applicantProfile = $request->user()->applicantProfile()->firstOrCreate([]);

        $applicantProfile->fill($request->validated());
        $applicantProfile->save();

        return Redirect::route('profile.applicant.edit')->with('status', 'applicant-profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
