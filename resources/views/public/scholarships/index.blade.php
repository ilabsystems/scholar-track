@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <section class="bg-white py-12 sm:py-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Available Scholarship Programs</h1>
                <p class="mt-4 text-lg text-gray-600">Multiple scholarship opportunities designed to support different educational needs and achievements.</p>
            </div>

            <!-- Search Bar -->
            <div class="mt-10 max-w-2xl mx-auto">
                <form method="GET" action="{{ route('scholarships') }}" class="flex gap-2">
                    <div class="flex-1 relative">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Search scholarships by name or description..."
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm">
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    @if(request('search'))
                        <a href="{{ route('scholarships') }}" class="px-4 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                            Clear
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </section>

    <!-- Scholarship Types -->
    <section id="scholarships" class="py-24 sm:py-32 bg-white">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            @if($scholarships->isEmpty())
                <div class="mx-auto mt-16 text-center">
                    <i class="fas fa-inbox text-gray-400 text-6xl mb-4"></i>
                    <p class="text-lg text-gray-600 mt-4">
                        {{ request('search') 
                            ? 'No scholarships match your search. Try adjusting your search terms.' 
                            : 'No scholarships are currently available. Please check back later.' }}
                    </p>
                    @if(request('search'))
                        <a href="{{ route('scholarships') }}" class="inline-flex items-center px-4 py-2 mt-6 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            <i class="fas fa-redo mr-2"></i>View All Scholarships
                        </a>
                    @endif
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

                                <div class="flex gap-2">
                                    <a href="{{ route('scholarships.show', $scholarship) }}" class="flex-1 inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition">
                                        <i class="fas fa-eye mr-2"></i>View Details
                                    </a>
                                    <a href="{{ route('register') }}" class="flex-1 inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                        <i class="fas fa-edit mr-2"></i>Apply Now
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
@endsection
