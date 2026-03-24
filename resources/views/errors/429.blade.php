@extends('public.layout')

@section('content')
    @include('errors.partials.page', [
        'code' => '429',
        'title' => 'Too many requests',
        'summary' => 'You have sent too many requests in a short period of time.',
        'message' => 'Please wait a moment before trying again so the system can recover safely.',
        'primaryLabel' => 'Go to home',
        'primaryUrl' => route('welcome'),
        'secondaryLabel' => 'Sign in',
        'secondaryUrl' => route('login'),
        'tips' => [
            [
                'title' => 'Pause briefly',
                'body' => 'Give the system a few seconds before repeating the action.',
            ],
            [
                'title' => 'Avoid repeated refreshes',
                'body' => 'Multiple reloads can extend the cooldown period.',
            ],
        ],
        'statusNote' => 'This response helps keep Scholar Track stable for everyone.',
    ])
@endsection