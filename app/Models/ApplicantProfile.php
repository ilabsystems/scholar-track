<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ApplicantProfile extends Model
{
    /** @use HasFactory<\Database\Factories\ApplicantProfileFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'date_of_birth',
        'field_of_study',
        'gpa',
        'education_level',
        'employment_status',
        'household_income',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'gpa' => 'decimal:2',
            'household_income' => 'decimal:2',
        ];
    }

    /**
     * Get the user associated with this applicant profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the scholar profile if this applicant was approved.
     */
    public function scholarProfile(): HasOne
    {
        return $this->hasOne(ScholarProfile::class);
    }

    /**
     * Get all applications for this profile.
     */
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}
