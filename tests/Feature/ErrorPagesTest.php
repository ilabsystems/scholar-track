<?php

it('renders the custom error pages', function (string $view, string $expectedText) {
    $content = view($view)->render();

    expect($content)->toContain('Scholar Track');
    expect($content)->toContain($expectedText);
})->with([
    ['errors.404', 'Page not found'],
    ['errors.403', 'Access denied'],
    ['errors.419', 'Session expired'],
    ['errors.429', 'Too many requests'],
    ['errors.500', 'Server error'],
    ['errors.503', 'Service unavailable'],
    ['errors.4xx', 'Request error'],
    ['errors.5xx', 'System error'],
]);
