<?php

use App\Models\Scholarship;
use App\Models\User;

describe('Admin Scholarship Management', function () {
    beforeEach(function () {
        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');
    });

    test('admin can view scholarship index', function () {
        $scholarship = Scholarship::factory()->create(['status' => 'active']);

        $response = $this->actingAs($this->admin)->get(route('admin.scholarships.index'));

        $response->assertStatus(200);
        $response->assertSee($scholarship->name);
    });

    test('admin can view scholarship create form', function () {
        $response = $this->actingAs($this->admin)->get(route('admin.scholarships.create'));

        $response->assertStatus(200);
        $response->assertSee('Create Scholarship');
    });

    test('admin can create scholarship with valid data', function () {
        $scholarshipData = [
            'name' => 'Merit Excellence Award',
            'description' => 'Award for outstanding academic achievement',
            'amount' => '15000.00',
            'criteria' => 'GPA 3.5 or higher, dean\'s list required',
            'deadline' => date('Y-m-d', strtotime('+2 months')),
            'award_type' => 'yearly',
            'coverage' => 'full-tuition',
            'gpa_requirement' => '3.5',
            'demographics' => 'All students',
            'field_of_study' => 'Engineering',
            'status' => 'active',
        ];

        $response = $this->actingAs($this->admin)->post(
            route('admin.scholarships.store'),
            $scholarshipData
        );

        $response->assertRedirect(route('admin.scholarships.index'));
        $this->assertDatabaseHas('scholarships', [
            'name' => 'Merit Excellence Award',
            'amount' => '15000.00',
        ]);
    });

    test('admin can view scholarship details', function () {
        $scholarship = Scholarship::factory()->create();

        $response = $this->actingAs($this->admin)->get(
            route('admin.scholarships.show', $scholarship)
        );

        $response->assertStatus(200);
        $response->assertSee($scholarship->name);
        $response->assertSee($scholarship->description);
    });

    test('admin can view scholarship edit form', function () {
        $scholarship = Scholarship::factory()->create();

        $response = $this->actingAs($this->admin)->get(
            route('admin.scholarships.edit', $scholarship)
        );

        $response->assertStatus(200);
        $response->assertSee($scholarship->name);
    });

    test('admin can update scholarship with valid data', function () {
        $scholarship = Scholarship::factory()->create();

        $updateData = [
            'name' => 'Updated Scholarship Name',
            'description' => 'Updated description',
            'amount' => '20000.00',
            'criteria' => 'Updated criteria',
            'deadline' => date('Y-m-d', strtotime('+3 months')),
            'award_type' => 'monthly',
            'coverage' => 'partial',
            'gpa_requirement' => '3.0',
            'demographics' => 'First generation',
            'field_of_study' => 'Business',
            'status' => 'inactive',
        ];

        $response = $this->actingAs($this->admin)->put(
            route('admin.scholarships.update', $scholarship),
            $updateData
        );

        $response->assertRedirect(route('admin.scholarships.index'));
        $this->assertDatabaseHas('scholarships', [
            'id' => $scholarship->id,
            'name' => 'Updated Scholarship Name',
        ]);
    });

    test('admin can delete scholarship', function () {
        $scholarship = Scholarship::factory()->create();

        $response = $this->actingAs($this->admin)->delete(
            route('admin.scholarships.destroy', $scholarship)
        );

        $response->assertRedirect(route('admin.scholarships.index'));
        $this->assertDatabaseMissing('scholarships', ['id' => $scholarship->id]);
    });

    test('admin cannot create scholarship with invalid data', function () {
        $invalidData = [
            'name' => '', // Required
            'description' => '', // Required
            'amount' => 'invalid', // Must be numeric
            'criteria' => '', // Required
            'deadline' => 'invalid', // Must be valid date
            'award_type' => 'invalid', // Must be one of enum values
            'coverage' => 'invalid', // Must be one of enum values
            'status' => 'invalid', // Must be one of enum values
        ];

        $response = $this->actingAs($this->admin)->post(
            route('admin.scholarships.store'),
            $invalidData
        );

        $response->assertSessionHasErrors([
            'name',
            'description',
            'amount',
            'criteria',
            'deadline',
            'award_type',
            'coverage',
            'status',
        ]);
    });
});

describe('Public Scholarship Viewing', function () {
    test('public can view available scholarships', function () {
        $activeScholarship = Scholarship::factory()->create(['status' => 'active']);
        $inactiveScholarship = Scholarship::factory()->create(['status' => 'inactive']);

        $response = $this->get(route('scholarships'));

        $response->assertStatus(200);
        $response->assertSee($activeScholarship->name);
        $response->assertDontSee($inactiveScholarship->name);
    });

    test('public sees empty message when no scholarships available', function () {
        $response = $this->get(route('scholarships'));

        $response->assertStatus(200);
        $response->assertSee('No scholarships are currently available');
    });

    test('scholarship shows all required details', function () {
        $scholarship = Scholarship::factory()->create([
            'status' => 'active',
            'name' => 'Test Scholarship',
            'amount' => '15000.00',
            'deadline' => now()->addMonth(),
            'award_type' => 'yearly',
            'coverage' => 'partial',
        ]);

        $response = $this->get(route('scholarships'));

        $response->assertStatus(200);
        $response->assertSee('Test Scholarship');
        $response->assertSee('15,000.00');
        $response->assertSee('yearly');
        $response->assertSee('partial');
    });
});

describe('Scholarship Favorites', function () {
    beforeEach(function () {
        $this->user = User::factory()->create();
    });

    test('authenticated user can favorite a scholarship', function () {
        $scholarship = Scholarship::factory()->create(['status' => 'active']);

        $response = $this->actingAs($this->user)->post(
            route('scholarships.favorite', $scholarship)
        );

        $response->assertRedirect();
        $this->assertTrue(
            $this->user->favoriteScholarships()->where('scholarship_id', $scholarship->id)->exists()
        );
    });

    test('authenticated user can remove scholarship from favorites', function () {
        $scholarship = Scholarship::factory()->create(['status' => 'active']);
        $this->user->favoriteScholarships()->attach($scholarship);

        $response = $this->actingAs($this->user)->post(
            route('scholarships.favorite', $scholarship)
        );

        $response->assertRedirect();
        $this->assertFalse(
            $this->user->favoriteScholarships()->where('scholarship_id', $scholarship->id)->exists()
        );
    });

    test('unauthenticated user cannot favorite a scholarship', function () {
        $scholarship = Scholarship::factory()->create(['status' => 'active']);

        $response = $this->post(route('scholarships.favorite', $scholarship));

        $response->assertRedirect(route('login'));
    });

    test('user can retrieve favorited scholarships', function () {
        $scholarship1 = Scholarship::factory()->create(['status' => 'active']);
        $scholarship2 = Scholarship::factory()->create(['status' => 'active']);
        $scholarship3 = Scholarship::factory()->create(['status' => 'active']);

        $this->user->favoriteScholarships()->attach([$scholarship1->id, $scholarship2->id]);

        $favorites = $this->user->favoriteScholarships()->get();

        $this->assertCount(2, $favorites);
        $this->assertTrue($favorites->contains($scholarship1));
        $this->assertTrue($favorites->contains($scholarship2));
        $this->assertFalse($favorites->contains($scholarship3));
    });
});
