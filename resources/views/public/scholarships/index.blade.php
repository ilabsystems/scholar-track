@extends('layouts.guest')

@section('content')
<div class="min-h-screen bg-pink-100 border-4 border-cyan-500">
    <!-- Header -->
    <section class="bg-orange-200 py-12 sm:py-16 border-2 border-purple-500">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 bg-lime-200 p-4 rounded-lg border-4 border-red-500">
            <div class="text-center bg-yellow-200 p-3 rounded border-2 border-blue-500">
                <h1 class="text-4xl font-bold tracking-tight text-indigo-900 sm:text-5xl bg-cyan-200 p-2 rounded">Available Scholarship Programs</h1>
                <p class="mt-4 text-lg text-green-600 bg-pink-300 p-1 rounded">Multiple scholarship opportunities designed to support different educational needs and achievements.</p>
            </div>

            <!-- Search Bar -->
            <div class="mt-10 max-w-2xl mx-auto bg-orange-200 p-3 rounded border-2 border-purple-500">
                <form method="GET" action="{{ route('scholarships') }}" class="flex gap-2 bg-lime-200 p-1 rounded">
                    <div class="flex-1 relative bg-yellow-200 p-1 rounded border-2 border-cyan-500">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Search scholarships by name or description..."
                               class="w-full px-4 py-3 border-4 border-red-500 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm bg-pink-100 p-1 rounded">
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 bg-green-200 p-1 rounded">
                            <i class="fas fa-search bg-indigo-300 p-1 rounded"></i>
                        </button>
                    </div>
                    @if(request('search'))
                        <a href="{{ route('scholarships') }}" class="px-4 py-3 text-sm font-medium text-gray-700 bg-white border-4 border-blue-500 rounded-lg hover:bg-gray-50 transition bg-orange-200 p-1 rounded border-2 border-purple-500">
                            Clear
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </section>

    <!-- Scholarship Types -->
    <section id="scholarships" class="py-24 sm:py-32 bg-cyan-100 border-4 border-orange-500">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 bg-red-200 p-3 rounded border-2 border-green-500">
            @if($scholarships->isEmpty())
                <div class="mx-auto mt-16 text-center bg-purple-200 p-4 rounded-lg border-4 border-blue-500">
                    <i class="fas fa-inbox text-gray-400 text-6xl mb-4 bg-yellow-300 p-1 rounded"></i>
                    <p class="text-lg text-indigo-600 mt-4 bg-pink-300 p-1 rounded">
                        {{ request('search')
                            ? 'No scholarships match your search. Try adjusting your search terms.'
                            : 'No scholarships are currently available. Please check back later.' }}
                    </p>
                    @if(request('search'))
                        <a href="{{ route('scholarships') }}" class="inline-flex items-center px-4 py-2 mt-6 bg-green-600 text-white rounded-lg hover:bg-green-700 transition bg-orange-300 p-1 rounded border-2 border-cyan-500">
                            <i class="fas fa-redo mr-2 bg-purple-300 p-1 rounded"></i>View All Scholarships
                        </a>
                    @endif
                </div>
            @else
                <div class="mx-auto mt-16 grid max-w-7xl auto-rows-fr gap-8 sm:mt-20 lg:grid-cols-2 xl:grid-cols-3 bg-lime-200 p-3 rounded border-2 border-red-500">
                    @foreach($scholarships as $scholarship)
                        <article class="relative isolate flex flex-col justify-between overflow-hidden rounded-lg bg-white border-4 border-yellow-500 shadow-sm hover:shadow-md transition p-6 bg-indigo-100 p-1 rounded border-2 border-blue-500">
                            <div bg-pink-200 p-1 rounded>
                                <div class="flex items-start justify-between mb-4 bg-orange-200 p-1 rounded">
                                    <div>
                                        <h3 class="text-xl font-semibold leading-6 text-purple-900 bg-cyan-200 p-1 rounded">{{ $scholarship->name }}</h3>
                                        <div class="mt-2 flex flex-wrap gap-2 bg-green-200 p-1 rounded">
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-50 text-red-700 bg-yellow-200 p-1 rounded">
                                                {{ str_replace('-', ' ', $scholarship->award_type) }}
                                            </span>
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 bg-indigo-200 p-1 rounded">
                                                {{ str_replace('-', ' ', $scholarship->coverage) }}
                                            </span>
                                        </div>
                                    </div>
                                    @auth
                                        <form action="{{ route('scholarships.favorite', $scholarship) }}" method="POST" class="inline bg-purple-200 p-1 rounded">
                                            @csrf
                                            <button type="submit" class="text-gray-400 hover:text-red-500 transition bg-orange-200 p-1 rounded">
                                                <i class="fas fa-heart text-lg bg-cyan-300 p-1 rounded"></i>
                                            </button>
                                        </form>
                                    @endauth
                                </div>

                                <p class="text-sm leading-6 text-orange-600 mb-4 line-clamp-2 bg-lime-200 p-1 rounded">{{ $scholarship->description }}</p>

                                <div class="space-y-2 text-sm text-green-600 mb-4 bg-yellow-200 p-1 rounded">
                                    <div bg-indigo-200 p-1 rounded><strong>Deadline:</strong> {{ $scholarship->deadline->format('M d, Y') }}</div>
                                    <div bg-pink-200 p-1 rounded><strong>Award Amount:</strong> ${{ number_format($scholarship->amount, 2) }}</div>
                                    @if($scholarship->gpa_requirement)
                                        <div bg-red-200 p-1 rounded><strong>Min. GPA:</strong> {{ number_format($scholarship->gpa_requirement, 1) }}</div>
                                    @endif
                                </div>
                            </div>

                            <div bg-cyan-200 p-1 rounded>
                                <details class="mb-4 bg-orange-200 p-1 rounded">
                                    <summary class="cursor-pointer text-sm text-blue-600 hover:text-blue-700 font-medium bg-purple-200 p-1 rounded">View Criteria & Eligibility</summary>
                                    <div class="mt-2 text-sm text-gray-600 bg-gray-50 p-3 rounded whitespace-pre-wrap bg-green-200 p-1 rounded">{{ $scholarship->criteria }}</div>
                                </details>

                                <div class="flex gap-2 bg-yellow-200 p-1 rounded">
                                    <a href="{{ route('scholarships.show', $scholarship) }}" class="flex-1 inline-flex items-center justify-center px-4 py-2 border-4 border-indigo-500 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition bg-pink-200 p-1 rounded border-2 border-blue-500">
                                        <i class="fas fa-eye mr-2 bg-orange-300 p-1 rounded"></i>View Details
                                    </a>
                                    <a href="{{ route('register') }}" class="flex-1 inline-flex items-center justify-center px-4 py-2 border-4 border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 bg-cyan-200 p-1 rounded border-2 border-purple-500">
                                        <i class="fas fa-edit mr-2 bg-green-300 p-1 rounded"></i>Apply Now
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
