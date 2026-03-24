@extends('public.layout')

@section('content')
<div class="bg-gray-50">
    <!-- Hero Section -->
    <section class="relative isolate px-6 pt-14 lg:px-8">
        <div class="mx-auto max-w-4xl py-32 sm:py-48 lg:py-56">
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">{{ $aboutData['title'] }}</h1>
                <p class="mt-6 text-lg leading-8 text-gray-600">{{ $aboutData['subtitle'] }}</p>
                <p class="mt-6 text-lg leading-8 text-gray-600 max-w-2xl mx-auto">{{ $aboutData['description'] }}</p>

                <!-- Hero Stats -->
                <div class="mt-16 grid grid-cols-2 gap-8 md:grid-cols-4">
                    @foreach($aboutData['hero_stats'] as $stat)
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-900">{{ $stat['number'] }}</div>
                        <div class="text-sm text-gray-600">{{ $stat['label'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Key Features -->
    <section class="py-24 sm:py-32 bg-slate-900">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Why Choose Our System?</h2>
                <p class="mt-6 text-lg leading-8 text-slate-300">Experience the future of scholarship management with cutting-edge technology and user-centric design.</p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                    @foreach($aboutData['features'] as $feature)
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-white">
                            <i class="{{ $feature['icon'] }} text-blue-400 text-lg"></i>
                            {{ $feature['title'] }}
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-slate-300">
                            <p class="flex-auto">{{ $feature['description'] }}</p>
                        </dd>
                    </div>
                    @endforeach
                </dl>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-24 sm:py-32 bg-white">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Benefits for Everyone</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">Our system is designed to serve students, parents, and administrators with tailored experiences.</p>
            </div>
            <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach($aboutData['benefits'] as $benefitGroup)
                <div class="flex flex-col justify-between rounded-3xl bg-white p-8 shadow-lg ring-1 ring-gray-200 xl:p-10">
                    <div>
                        <div class="flex items-center gap-x-3">
                            <i class="{{ $benefitGroup['icon'] }} text-blue-900 text-2xl"></i>
                            <h3 class="text-lg font-semibold leading-8 text-gray-900">{{ $benefitGroup['title'] }}</h3>
                        </div>
                        <ul class="mt-8 space-y-3 text-sm leading-6 text-gray-600">
                            @foreach($benefitGroup['items'] as $item)
                            <li class="flex gap-x-3">
                                <i class="fas fa-check text-green-600 mt-0.5"></i>
                                {{ $item }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-24 sm:py-32 bg-slate-50">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $aboutData['how_it_works']['title'] }}</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">From application to disbursement, our streamlined process ensures efficiency and transparency.</p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <div class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-5">
                    @foreach($aboutData['how_it_works']['steps'] as $step)
                    <div class="flex flex-col items-center text-center">
                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-blue-900 text-white text-xl font-bold mb-4">
                            {{ $step['step'] }}
                        </div>
                        <h3 class="text-lg font-semibold leading-8 text-gray-900 mb-2">{{ $step['title'] }}</h3>
                        <p class="text-base leading-7 text-gray-600">{{ $step['description'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-24 sm:py-32 bg-slate-900">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">What Our Users Say</h2>
                <p class="mt-6 text-lg leading-8 text-slate-300">Real experiences from students, parents, and administrators using our system.</p>
            </div>
            <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach($aboutData['testimonials'] as $testimonial)
                <div class="flex flex-col justify-between rounded-3xl bg-slate-800 p-8 shadow-lg ring-1 ring-slate-700 xl:p-10">
                    <div>
                        <div class="flex text-yellow-400 mb-4">
                            @for($i = 1; $i <= $testimonial['rating']; $i++)
                            <i class="fas fa-star"></i>
                            @endfor
                        </div>
                        <blockquote class="text-slate-100 text-lg leading-8">
                            "{{ $testimonial['quote'] }}"
                        </blockquote>
                    </div>
                    <div class="mt-6">
                        <div class="font-semibold text-white">{{ $testimonial['author'] }}</div>
                        <div class="text-slate-400">{{ $testimonial['role'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="relative isolate px-6 py-24 sm:py-32 lg:px-8 bg-white">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $aboutData['call_to_action']['title'] }}</h2>
            <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-gray-600">{{ $aboutData['call_to_action']['description'] }}</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ $aboutData['call_to_action']['primary_button']['url'] }}" class="rounded-md bg-blue-900 px-6 py-3 text-base font-semibold text-white shadow-sm hover:bg-blue-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-900">
                    {{ $aboutData['call_to_action']['primary_button']['text'] }}
                </a>
                <a href="{{ $aboutData['call_to_action']['secondary_button']['url'] }}" class="text-base font-semibold leading-6 text-gray-900 hover:text-blue-900">
                    {{ $aboutData['call_to_action']['secondary_button']['text'] }} <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
