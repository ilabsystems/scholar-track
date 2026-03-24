@extends('public.layout')

@section('content')
    @include('errors.partials.page', [
        'code' => '4xx',
        'title' => 'Request error',
        'summary' => 'The request could not be completed as submitted.',
        'message' => 'Something in the request needs to be corrected before it can be processed successfully.',
        'primaryLabel' => 'Go to home',
        'primaryUrl' => route('welcome'),
        'secondaryLabel' => 'Sign in',
        'secondaryUrl' => route('login'),
        'tips' => [
            [
                'title' => 'Check the request',
                'body' => 'Verify any form values, links, or filters you used before retrying.',
            ],
            [
                'title' => 'Use the main navigation',
                'body' => 'The home page and public pages are the safest place to continue from.',
            ],
        ],
    ])
@endsection