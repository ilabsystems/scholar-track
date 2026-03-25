<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the scholarships created by this user.
     */
    public function createdScholarships(): HasMany
    {
        return $this->hasMany(Scholarship::class, 'created_by');
    }

    /**
     * Get the scholarships favorited by this user.
     */
    public function favoriteScholarships(): BelongsToMany
    {
        return $this->belongsToMany(Scholarship::class, 'scholarship_favorites');
    }

    /**
     * Get the applicant profile for this user.
     */
    public function applicantProfile(): HasMany
    {
        return $this->hasMany(ApplicantProfile::class);
    }

    /**
     * Get the scholar profile for this user.
     */
    public function scholarProfile(): HasMany
    {
        return $this->hasMany(ScholarProfile::class);
    }

    /**
     * Get the applications submitted by this user.
     */
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    /**
     * Get the applications assigned to this user for review.
     */
    public function assignedApplications(): HasMany
    {
        return $this->hasMany(Application::class, 'assigned_to');
    }

    /**
     * Get the applications reviewed by this user.
     */
    public function reviewedApplications(): HasMany
    {
        return $this->hasMany(Application::class, 'reviewed_by');
    }
}
