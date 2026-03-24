<?php

use Illuminate\Support\ViewErrorBag;

it('renders the public views', function (string $view, string $expectedText) {
    $content = view($view, [
        'errors' => new ViewErrorBag,
    ])->render();

    expect($content)->toContain('Scholar Track');
    expect($content)->toContain($expectedText);
})->with([
    ['public.welcome', 'Municipal Scholarship Management System'],
    ['auth.login', 'Manage and track your scholarship applications'],
    ['auth.register', 'Why create an account?'],
]);
