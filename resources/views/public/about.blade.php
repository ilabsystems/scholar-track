@extends('public.layout')

@section('content')
<div class="min-h-screen bg-gray-50">
<!-- About the Program -->
<section id="about" class="py-24 sm:py-32 bg-gray-50">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">About the Municipal Scholarship Program</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Our commitment to educational excellence and community development through targeted financial assistance.</p>
        </div>
        <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
            <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                <div class="flex flex-col">
                    <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                        <i class="fas fa-graduation-cap text-blue-600 text-lg"></i>
                        Educational Support
                    </dt>
                    <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                        <p class="flex-auto">Comprehensive financial assistance covering tuition fees, school supplies, and educational materials for qualified students.</p>
                    </dd>
                </div>
                <div class="flex flex-col">
                    <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                        <i class="fas fa-building text-blue-600 text-lg"></i>
                        Municipality Funded
                    </dt>
                    <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                        <p class="flex-auto">Fully funded and administered by the local government unit to support our community's educational goals and development.</p>
                    </dd>
                </div>
                <div class="flex flex-col">
                    <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                        <i class="fas fa-users text-blue-600 text-lg"></i>
                        Community Focus
                    </dt>
                    <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                        <p class="flex-auto">Prioritizing residents of our municipality with a focus on academic excellence, leadership potential, and community service.</p>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</section>
</div>
@endsection
