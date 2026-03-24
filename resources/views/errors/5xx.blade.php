@extends('layouts.guest')

@section('content')
    @include('errors.partials.page', [
        'code' => '5xx',
        'title' => 'System error',
        'summary' => 'Scholar Track encountered a server-side problem.',
        'message' => 'The application could not finish processing your request. Please try again later.',
        'primaryLabel' => 'Go to home',
        'primaryUrl' => route('welcome'),
        'secondaryLabel' => 'Sign in',
        'secondaryUrl' => route('login'),
        'tips' => [
            [
                'title' => 'Try again later',
                'body' => 'Server-side problems often resolve once the application is back in a stable state.',
            ],
            [
                'title' => 'Report the issue',
                'body' => 'If the problem keeps happening, share the details with the system administrator.',
            ],
        ],
    ])
@endsection