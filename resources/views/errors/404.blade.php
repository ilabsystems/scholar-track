@extends('layouts.guest')

@section('content')
    @include('errors.partials.page', [
        'code' => '404',
        'title' => 'Page not found',
        'summary' => 'The scholarship page you tried to reach could not be found.',
        'message' => 'The page may have moved, the link may be outdated, or the address may have been typed incorrectly.',
        'primaryLabel' => 'Go to home',
        'primaryUrl' => route('welcome'),
        'secondaryLabel' => 'Sign in',
        'secondaryUrl' => route('login'),
        'tips' => [
            [
                'title' => 'Check the address',
                'body' => 'Make sure the URL is spelled correctly before trying again.',
            ],
            [
                'title' => 'Return to Scholar Track',
                'body' => 'Go back to the home page and continue browsing available scholarships.',
            ],
        ],
    ])
@endsection