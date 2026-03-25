<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/** @use HasFactory<\Database\Factories\ScholarshipFactory> */
class Scholarship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'amount',
        'criteria',
        'deadline',
        'award_type',
        'coverage',
        'gpa_requirement',
        'demographics',
        'field_of_study',
        'status',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'gpa_requirement' => 'decimal:1',
            'deadline' => 'date',
        ];
    }

    /**
     * Get the user who created this scholarship.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the users who favorited this scholarship.
     */
    public function favoritedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'scholarship_favorites');
    }

    /**
     * Get the scholars awarded this scholarship.
     */
    public function scholarProfiles(): HasMany
    {
        return $this->hasMany(ScholarProfile::class);
    }

    /**
     * Get the applications for this scholarship.
     */
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    /**
     * Check if the scholarship deadline has passed.
     */
    public function isDeadlinePassed(): bool
    {
        return $this->deadline?->isPast() ?? false;
    }

    /**
     * Check if a user has already applied to this scholarship.
     */
    public function userHasApplied(User $user): bool
    {
        return $this->applications()->where('user_id', $user->id)->exists();
    }
}
