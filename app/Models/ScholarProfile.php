<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScholarProfile extends Model
{
    /** @use HasFactory<\Database\Factories\ScholarProfileFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'applicant_profile_id',
        'scholarship_id',
        'award_amount',
        'start_date',
        'end_date',
        'status',
        'mentor_info',
        'approval_date',
        'approved_by',
        'approval_remarks',
    ];

    protected function casts(): array
    {
        return [
            'award_amount' => 'decimal:2',
            'start_date' => 'date',
            'end_date' => 'date',
            'approval_date' => 'date',
        ];
    }

    /**
     * Get the user associated with this scholar profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the applicant profile that originated this scholarship.
     */
    public function applicantProfile(): BelongsTo
    {
        return $this->belongsTo(ApplicantProfile::class);
    }

    /**
     * Get the scholarship for this scholar.
     */
    public function scholarship(): BelongsTo
    {
        return $this->belongsTo(Scholarship::class);
    }
}
