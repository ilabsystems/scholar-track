@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-gray-50">
<!-- Scholarship Types -->
<section id="scholarships" class="py-24 sm:py-32 bg-white">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Available Scholarship Programs</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Multiple scholarship opportunities designed to support different educational needs and achievements.</p>
        </div>
        
        @if($scholarships->isEmpty())
            <div class="mx-auto mt-16 text-center">
                <i class="fas fa-inbox text-gray-400 text-6xl mb-4"></i>
                <p class="text-lg text-gray-600 mt-4">No scholarships are currently available. Please check back later.</p>
            </div>
        @else
            <div class="mx-auto mt-16 grid max-w-7xl auto-rows-fr gap-8 sm:mt-20 lg:grid-cols-2 xl:grid-cols-3">
                @foreach($scholarships as $scholarship)
                    <article class="relative isolate flex flex-col justify-between overflow-hidden rounded-lg bg-white border border-gray-200 shadow-sm hover:shadow-md transition p-6">
                        <div>
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h3 class="text-xl font-semibold leading-6 text-gray-900">{{ $scholarship->name }}</h3>
                                    <div class="mt-2 flex flex-wrap gap-2">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700">
                                            {{ str_replace('-', ' ', $scholarship->award_type) }}
                                        </span>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700">
                                            {{ str_replace('-', ' ', $scholarship->coverage) }}
                                        </span>
                                    </div>
                                </div>
                                @auth
                                    <form action="{{ route('scholarships.favorite', $scholarship) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-gray-400 hover:text-red-500 transition">
                                            <i class="fas fa-heart text-lg"></i>
                                        </button>
                                    </form>
                                @endauth
                            </div>
                            
                            <p class="text-sm leading-6 text-gray-600 mb-4 line-clamp-2">{{ $scholarship->description }}</p>
                            
                            <div class="space-y-2 text-sm text-gray-600 mb-4">
                                <div><strong>Deadline:</strong> {{ $scholarship->deadline->format('M d, Y') }}</div>
                                <div><strong>Award Amount:</strong> ${{ number_format($scholarship->amount, 2) }}</div>
                                @if($scholarship->gpa_requirement)
                                    <div><strong>Min. GPA:</strong> {{ number_format($scholarship->gpa_requirement, 1) }}</div>
                                @endif
                            </div>
                        </div>
                        
                        <div>
                            <details class="mb-4">
                                <summary class="cursor-pointer text-sm text-blue-600 hover:text-blue-700 font-medium">View Criteria & Eligibility</summary>
                                <div class="mt-2 text-sm text-gray-600 bg-gray-50 p-3 rounded whitespace-pre-wrap">{{ $scholarship->criteria }}</div>
                            </details>
                            
                            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 w-full justify-center">
                                <i class="fas fa-edit mr-2"></i>Apply Now
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</section>
</div>
@endsection
