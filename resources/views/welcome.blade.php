<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'MSMMS') }} — Scholarship Portal</title>
    <meta name="description" content="Apply for the Municipality of Aparri Scholarship Management and Monitoring System. Streamlined financial education grants for Aparri students.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', sans-serif; }

        /* Eligibility toggle */
        .toggle-track { transition: background-color .2s; }
        .toggle-thumb { transition: transform .2s; }
        input[type=checkbox]:checked + .toggle-track { background-color: #2563eb; }
        input[type=checkbox]:checked + .toggle-track .toggle-thumb { transform: translateX(1.5rem); }

        /* Glow CTA */
        .cta-glow { box-shadow: 0 0 0 0 rgba(37,99,235,0); transition: box-shadow .4s, transform .2s; }
        .cta-glow.active { box-shadow: 0 0 0 8px rgba(37,99,235,.25), 0 8px 32px rgba(37,99,235,.45); }

        /* FAQ answer collapse */
        .faq-answer { max-height: 0; overflow: hidden; transition: max-height .3s ease; }
        .faq-answer.open { max-height: 300px; }

        /* Countdown card */
        .countdown-unit { background: #1e3a8a; }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased">

@include('partials.welcome.navigation')

@include('partials.welcome.hero')

@include('partials.welcome.eligibility')

@include('partials.welcome.stats')

@include('partials.welcome.requirements')

@include('partials.welcome.renewal')

@include('partials.welcome.announcements')

@include('partials.welcome.faq')

@include('partials.welcome.cta')

@include('partials.welcome.footer')

@include('partials.welcome.scripts')

</body>
</html>
