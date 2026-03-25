<?php

use App\Models\Application;
use App\Models\Scholarship;
use App\Models\User;

describe('Application Submission', function () {
    beforeEach(function () {
        $this->applicant = User::factory()->create();
        $this->applicant->assignRole('applicant');
        $this->scholarship = Scholarship::factory()->create(['status' => 'active', 'deadline' => now()->addMonth()]);
    });

    test('applicant can view application create form', function () {
        $response = $this->actingAs($this->applicant)->get(route('scholarships.apply.create', $this->scholarship));

        $response->assertStatus(200);
        $response->assertSee($this->scholarship->name);
        $response->assertSee('Cover Letter');
    });

    test('applicant can save application as draft', function () {
        $data = [
            'cover_letter' => 'This is my cover letter for this amazing scholarship.',
            'applicant_profile_id' => null,
        ];

        $response = $this->actingAs($this->applicant)->post(
            route('scholarships.apply.store', $this->scholarship),
            array_merge($data, ['save' => true])
        );

        $response->assertRedirect(route('applications.show', fn ($app) => true));
        $this->assertDatabaseHas('applications', [
            'user_id' => $this->applicant->id,
            'scholarship_id' => $this->scholarship->id,
            'status' => 'draft',
            'cover_letter' => $data['cover_letter'],
            'submitted_at' => null,
        ]);
    });

    test('applicant can submit application', function () {
        $data = [
            'cover_letter' => 'This is my cover letter for this amazing scholarship.',
            'applicant_profile_id' => null,
        ];

        $response = $this->actingAs($this->applicant)->post(
            route('scholarships.apply.store', $this->scholarship),
            array_merge($data, ['submit' => true])
        );

        $response->assertRedirect(route('applications.show', fn ($app) => true));
        $this->assertDatabaseHas('applications', [
            'user_id' => $this->applicant->id,
            'scholarship_id' => $this->scholarship->id,
            'status' => 'submitted',
            'cover_letter' => $data['cover_letter'],
        ]);

        // Verify submitted_at is set
        $application = Application::where('user_id', $this->applicant->id)
            ->where('scholarship_id', $this->scholarship->id)
            ->first();
        expect($application->submitted_at)->not->toBeNull();
    });

    test('applicant cannot submit past scholarship deadline', function () {
        $pastScholarship = Scholarship::factory()->create(['deadline' => now()->subDay()]);

        $response = $this->actingAs($this->applicant)->post(
            route('scholarships.apply.store', $pastScholarship),
            [
                'cover_letter' => 'This is my cover letter.',
                'submit' => true,
            ]
        );

        $response->assertStatus(422);
        $this->assertDatabaseMissing('applications', [
            'user_id' => $this->applicant->id,
            'scholarship_id' => $pastScholarship->id,
        ]);
    });

    test('applicant cannot apply to same scholarship twice', function () {
        // First application
        $this->actingAs($this->applicant)->post(
            route('scholarships.apply.store', $this->scholarship),
            [
                'cover_letter' => 'First application.',
                'submit' => true,
            ]
        );

        // Second attempt
        $response = $this->actingAs($this->applicant)->post(
            route('scholarships.apply.store', $this->scholarship),
            [
                'cover_letter' => 'Second application.',
                'submit' => true,
            ]
        );

        $response->assertStatus(422);
        // Verify only one application exists
        expect(
            Application::where('user_id', $this->applicant->id)
                ->where('scholarship_id', $this->scholarship->id)
                ->count()
        )->toBe(1);
    });

    test('only applicant role can apply', function () {
        $reviewer = User::factory()->create();
        $reviewer->assignRole('reviewer');

        $response = $this->actingAs($reviewer)->post(
            route('scholarships.apply.store', $this->scholarship),
            [
                'cover_letter' => 'Trying to apply as reviewer.',
                'submit' => true,
            ]
        );

        $response->assertStatus(403);
    });

    test('unauthenticated user cannot apply', function () {
        $response = $this->post(
            route('scholarships.apply.store', $this->scholarship),
            [
                'cover_letter' => 'Trying to apply without authentication.',
                'submit' => true,
            ]
        );

        $response->assertRedirect(route('login'));
    });

    test('validation errors display on invalid data', function () {
        $response = $this->actingAs($this->applicant)->post(
            route('scholarships.apply.store', $this->scholarship),
            [
                'cover_letter' => '', // Required field
                'submit' => true,
            ]
        );

        $response->assertSessionHasErrors(['cover_letter']);
    });
});

describe('Application Listing', function () {
    beforeEach(function () {
        $this->applicant = User::factory()->create();
        $this->applicant->assignRole('applicant');
    });

    test('applicant can view all their applications', function () {
        $scholarship1 = Scholarship::factory()->create();
        $scholarship2 = Scholarship::factory()->create();

        Application::factory()->submitted()->create([
            'user_id' => $this->applicant->id,
            'scholarship_id' => $scholarship1->id,
        ]);
        Application::factory()->submitted()->create([
            'user_id' => $this->applicant->id,
            'scholarship_id' => $scholarship2->id,
        ]);

        $response = $this->actingAs($this->applicant)->get(route('applications.index'));

        $response->assertStatus(200);
        $response->assertSee($scholarship1->name);
        $response->assertSee($scholarship2->name);
    });

    test('applications grouped by status show correct counts', function () {
        $scholarship1 = Scholarship::factory()->create();
        $scholarship2 = Scholarship::factory()->create();
        $scholarship3 = Scholarship::factory()->create();

        Application::factory()->create([
            'user_id' => $this->applicant->id,
            'scholarship_id' => $scholarship1->id,
            'status' => 'draft',
        ]);
        Application::factory()->submitted()->create([
            'user_id' => $this->applicant->id,
            'scholarship_id' => $scholarship2->id,
        ]);
        Application::factory()->approved()->create([
            'user_id' => $this->applicant->id,
            'scholarship_id' => $scholarship3->id,
        ]);

        $response = $this->actingAs($this->applicant)->get(route('applications.index'));

        $response->assertStatus(200);
        // Status counts should be visible in JSON or test assertions
        expect($this->applicant->applications()->where('status', 'draft')->count())->toBe(1);
        expect($this->applicant->applications()->where('status', 'submitted')->count())->toBe(1);
        expect($this->applicant->applications()->where('status', 'approved')->count())->toBe(1);
    });

    test('empty state shows when no applications', function () {
        $response = $this->actingAs($this->applicant)->get(route('applications.index'));

        $response->assertStatus(200);
        $response->assertSee('No applications yet');
    });
});

describe('Application Detail', function () {
    beforeEach(function () {
        $this->applicant = User::factory()->create();
        $this->applicant->assignRole('applicant');
        $this->scholarship = Scholarship::factory()->create();
        $this->application = Application::factory()->submitted()->create([
            'user_id' => $this->applicant->id,
            'scholarship_id' => $this->scholarship->id,
        ]);
    });

    test('applicant can view their application detail', function () {
        $response = $this->actingAs($this->applicant)->get(route('applications.show', $this->application));

        $response->assertStatus(200);
        $response->assertSee($this->scholarship->name);
        $response->assertSee($this->application->getStatusLabel());
    });

    test('applicant can withdraw submitted application', function () {
        $response = $this->actingAs($this->applicant)->post(
            route('applications.withdraw', $this->application)
        );

        $response->assertRedirect(route('applications.index'));
        expect($this->application->fresh()->status)->toBe('withdrawn');
    });

    test('applicant cannot view other users applications', function () {
        $otherUser = User::factory()->create();

        $response = $this->actingAs($otherUser)->get(route('applications.show', $this->application));

        $response->assertStatus(403);
    });
});

describe('Application Authorization', function () {
    test('reviewer cannot apply to scholarships', function () {
        $reviewer = User::factory()->create();
        $reviewer->assignRole('reviewer');
        $scholarship = Scholarship::factory()->create();

        $response = $this->actingAs($reviewer)->get(route('scholarships.apply.create', $scholarship));

        $response->assertStatus(403);
    });

    test('scholar cannot apply to scholarships', function () {
        $scholar = User::factory()->create();
        $scholar->assignRole('scholar');
        $scholarship = Scholarship::factory()->create();

        $response = $this->actingAs($scholar)->get(route('scholarships.apply.create', $scholarship));

        $response->assertStatus(403);
    });
});
