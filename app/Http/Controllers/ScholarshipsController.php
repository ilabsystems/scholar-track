<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScholarshipsController extends Controller
{
    /**
     * Display a listing of available scholarships for the authenticated user.
     */
    public function index(Request $request): View
    {
        $query = Scholarship::query();

        // Filter by favorites if requested
        if ($request->boolean('favorites')) {
            $query->whereHas('favoritedBy', function ($q) {
                $q->where('users.id', auth()->id());
            });
        }

        // Search by name or description
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Get scholarships with pagination
        $scholarships = $query->paginate(12);

        // Get user's favorite scholarship IDs for frontend highlighting
        $favoriteIds = auth()->user()->favoriteScholarships()
            ->pluck('scholarship_id')
            ->toArray();

        return view('scholarships.index', [
            'scholarships' => $scholarships,
            'favoriteIds' => $favoriteIds,
            'showingFavorites' => $request->boolean('favorites'),
            'searchQuery' => $request->input('search'),
        ]);
    }

    /**
     * Display a single scholarship.
     */
    public function show(Scholarship $scholarship): View
    {
        $isFavorited = auth()->user()->favoriteScholarships()
            ->where('scholarship_id', $scholarship->id)
            ->exists();

        return view('scholarships.show', [
            'scholarship' => $scholarship,
            'isFavorited' => $isFavorited,
        ]);
    }
}
