@extends('public.layout')

@section('content')
    @include('errors.partials.page', [
        'code' => '419',
        'title' => 'Session expired',
        'summary' => 'Your session timed out before the request was completed.',
        'message' => 'For security, the page needs to be refreshed and submitted again.',
        'primaryLabel' => 'Reload page',
        'primaryUrl' => url()->current(),
        'secondaryLabel' => 'Go back',
        'secondaryUrl' => url()->previous() ?: route('welcome'),
        'tips' => [
            [
                'title' => 'Refresh and retry',
                'body' => 'Reload the page, then submit your form again.',
            ],
            [
                'title' => 'Stay signed in',
                'body' => 'Use the login page again if your session was inactive for a while.',
            ],
        ],
        'statusNote' => 'Scholar Track protects your data by expiring inactive sessions.',
    ])
@endsection