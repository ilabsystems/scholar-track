@extends('layouts.guest')

@section('content')
    @include('errors.partials.page', [
        'code' => '503',
        'title' => 'Service unavailable',
        'summary' => 'Scholar Track is temporarily unavailable for maintenance or recovery.',
        'message' => 'The system is likely being updated or restarted. Please check back soon.',
        'primaryLabel' => 'Go to home',
        'primaryUrl' => route('welcome'),
        'secondaryLabel' => 'Sign in',
        'secondaryUrl' => route('login'),
        'tips' => [
            [
                'title' => 'Check back later',
                'body' => 'Maintenance windows are usually short and the app should return shortly.',
            ],
            [
                'title' => 'Review updates',
                'body' => 'If needed, refresh the page after a short wait to see whether service is restored.',
            ],
        ],
        'statusNote' => 'This page appears while the system is intentionally offline or recovering.',
    ])
@endsection