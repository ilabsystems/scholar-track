@extends('public.layout')

@section('content')
<div class="min-h-screen bg-gray-50">
<!-- Scholarship Types -->
<section id="scholarships" class="py-24 sm:py-32 bg-white">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Available Scholarship Programs</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Multiple scholarship opportunities designed to support different educational needs and achievements.</p>
        </div>
        <div class="mx-auto mt-16 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gradient-to-br from-blue-50 to-blue-100 px-8 pb-8 pt-16">
                <div class="flex items-center gap-2 mb-4">
                    <i class="fas fa-graduation-cap text-blue-600 text-2xl"></i>
                    <h3 class="text-xl font-semibold leading-6 text-gray-900">Academic Scholarship</h3>
                </div>
                <p class="text-sm leading-6 text-gray-600 mb-4">Full financial support for outstanding academic performers with excellent grades and leadership qualities.</p>
                <div class="text-xs text-gray-500 mb-4">
                    <strong>Eligibility:</strong> GPA 1.5 or higher, enrolled in accredited schools
                </div>
                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    <i class="fas fa-edit mr-2"></i>Apply Now
                </a>
            </article>
            <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gradient-to-br from-green-50 to-green-100 px-8 pb-8 pt-16">
                <div class="flex items-center gap-2 mb-4">
                    <i class="fas fa-hand-holding-heart text-green-600 text-2xl"></i>
                    <h3 class="text-xl font-semibold leading-6 text-gray-900">Financial Assistance Grant</h3>
                </div>
                <p class="text-sm leading-6 text-gray-600 mb-4">Need-based support for students facing financial difficulties, focusing on accessibility to education.</p>
                <div class="text-xs text-gray-500 mb-4">
                    <strong>Eligibility:</strong> Low-income households, barangay certification required
                </div>
                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                    <i class="fas fa-edit mr-2"></i>Apply Now
                </a>
            </article>
            <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gradient-to-br from-purple-50 to-purple-100 px-8 pb-8 pt-16">
                <div class="flex items-center gap-2 mb-4">
                    <i class="fas fa-trophy text-purple-600 text-2xl"></i>
                    <h3 class="text-xl font-semibold leading-6 text-gray-900">Special Scholarship</h3>
                </div>
                <p class="text-sm leading-6 text-gray-600 mb-4">Recognition for exceptional talents in athletics, arts, leadership, and community service.</p>
                <div class="text-xs text-gray-500 mb-4">
                    <strong>Eligibility:</strong> Awards, recognitions, or demonstrated excellence in special fields
                </div>
                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700">
                    <i class="fas fa-edit mr-2"></i>Apply Now
                </a>
            </article>
        </div>
    </div>
</section>
</div>
@endsection
