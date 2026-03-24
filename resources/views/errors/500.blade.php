@extends('layouts.guest')

@section('content')
    @include('errors.partials.page', [
        'code' => '500',
        'title' => 'Server error',
        'summary' => 'Scholar Track hit an unexpected issue while processing your request.',
        'message' => 'The team has been notified. Please try again in a moment or return to the home page.',
        'primaryLabel' => 'Go to home',
        'primaryUrl' => route('welcome'),
        'secondaryLabel' => 'Sign in',
        'secondaryUrl' => route('login'),
        'tips' => [
            [
                'title' => 'Try again shortly',
                'body' => 'Temporary issues usually resolve quickly once the service recovers.',
            ],
            [
                'title' => 'Save your work',
                'body' => 'If you were entering information, keep a copy so you can submit it again safely.',
            ],
        ],
        'statusNote' => 'If the problem persists, the application administrator should review the server logs.',
    ])
@endsection