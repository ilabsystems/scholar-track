@extends('public.layout')

@section('content')
    @include('errors.partials.page', [
        'code' => '403',
        'title' => 'Access denied',
        'summary' => 'You do not have permission to access this page.',
        'message' => 'This area may be restricted to staff or to signed-in users with the right permissions.',
        'primaryLabel' => 'Go to home',
        'primaryUrl' => route('welcome'),
        'secondaryLabel' => 'Sign in',
        'secondaryUrl' => route('login'),
        'tips' => [
            [
                'title' => 'Use the right account',
                'body' => 'Try logging in with an account that has access to this page.',
            ],
            [
                'title' => 'Contact support',
                'body' => 'If you believe this is a mistake, ask the system administrator for access.',
            ],
        ],
    ])
@endsection