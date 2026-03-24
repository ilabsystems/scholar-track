<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use Illuminate\Http\RedirectResponse;

class ScholarshipController extends Controller
{
    /**
     * Toggle scholarship favorite status for the authenticated user.
     */
    public function favorite(Scholarship $scholarship): RedirectResponse
    {
        $user = auth()->user();

        if ($user->favoriteScholarships()->where('scholarship_id', $scholarship->id)->exists()) {
            $user->favoriteScholarships()->detach($scholarship);
        } else {
            $user->favoriteScholarships()->attach($scholarship);
        }

        return back()->with('status', 'scholarship-favorite-updated');
    }
}
