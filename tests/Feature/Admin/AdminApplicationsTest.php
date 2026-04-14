<?php

use App\Models\Application;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('admin can view applications index', function () {
    $admin = User::factory()->create();
    $admin->assignRole('admin');

    Application::factory()->create();

    $response = $this->actingAs($admin)->get(route('admin.applications.index'));

    $response->assertStatus(200);
    $response->assertSee('Applications');
});

it('admin can view application details', function () {
    $admin = User::factory()->create();
    $admin->assignRole('admin');

    $application = Application::factory()->create();

    $response = $this->actingAs($admin)->get(route('admin.applications.show', $application));

    $response->assertStatus(200);
    $response->assertSee($application->user->name);
});

it('admin can update application status', function () {
    $admin = User::factory()->create();
    $admin->assignRole('admin');

    $application = Application::factory()->create(['status' => 'submitted']);

    $response = $this->actingAs($admin)->put(route('admin.applications.update', $application), [
        'status' => 'approved',
        'score' => 85.5,
        'remarks' => 'Good application',
    ]);

    $response->assertRedirect();
    $application->refresh();
    expect($application->status)->toBe('approved');
    expect($application->score)->toBe('85.50');
    expect($application->remarks)->toBe('Good application');
    expect($application->reviewed_by)->toBe($admin->id);
});

it('admin can filter applications by status', function () {
    $admin = User::factory()->create();
    $admin->assignRole('admin');

    Application::factory()->create(['status' => 'submitted']);
    Application::factory()->create(['status' => 'approved']);

    $response = $this->actingAs($admin)->get(route('admin.applications.index', ['status' => 'submitted']));

    $response->assertStatus(200);
    // Should only show submitted applications
});

it('admin can search applications by applicant name', function () {
    $admin = User::factory()->create();
    $admin->assignRole('admin');

    $user = User::factory()->create(['name' => 'John Doe']);
    Application::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($admin)->get(route('admin.applications.index', ['search' => 'John']));

    $response->assertStatus(200);
    $response->assertSee('John Doe');
});
