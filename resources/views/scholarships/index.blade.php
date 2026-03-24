@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900">Scholarships</h2>
            <p class="mt-2 text-gray-600">Browse and save your favorite scholarship opportunities</p>
        </div>

        <!-- Search and Filters -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <form method="GET" action="{{ route('scholarships.index') }}" class="space-y-4">
                <!-- Search Bar -->
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               id="search"
                               value="{{ $searchQuery }}"
                               placeholder="Search scholarships by name or description..."
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-sm">
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <!-- Filter Tabs -->
                <div class="flex gap-2 border-t pt-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" 
                               name="favorites" 
                               value="0" 
                               {{ !$showingFavorites ? 'checked' : '' }}
                               onchange="this.form.submit()"
                               class="w-4 h-4">
                        <span class="text-sm text-gray-700">All Scholarships</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" 
                               name="favorites" 
                               value="1" 
                               {{ $showingFavorites ? 'checked' : '' }}
                               onchange="this.form.submit()"
                               class="w-4 h-4">
                        <span class="text-sm text-gray-700"><i class="fas fa-heart text-red-500 mr-1"></i>My Favorites</span>
                    </label>
                </div>
            </form>
        </div>

        <!-- Scholarships Grid -->
        @if($scholarships->isEmpty())
            <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                <i class="fas fa-inbox text-gray-400 text-6xl mb-4 block"></i>
                <p class="text-lg text-gray-600 mt-4">
                    {{ $showingFavorites 
                        ? 'You haven\'t saved any scholarships yet. Try removing filters or searching to find scholarships you like.' 
                        : 'No scholarships match your search. Try adjusting your search terms.' }}
                </p>
                @if($searchQuery || $showingFavorites)
                    <a href="{{ route('scholarships.index') }}" class="inline-flex items-center px-4 py-2 mt-6 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-redo mr-2"></i>Clear Filters
                    </a>
                @endif
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($scholarships as $scholarship)
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition flex flex-col">
                        <!-- Card Header with Favorite Button -->
                        <div class="p-6 border-b border-gray-100">
                            <div class="flex items-start justify-between gap-4">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $scholarship->name }}</h3>
                                    <div class="mt-2 flex flex-wrap gap-2">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700">
                                            {{ str_replace('-', ' ', $scholarship->award_type) }}
                                        </span>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700">
                                            {{ str_replace('-', ' ', $scholarship->coverage) }}
                                        </span>
                                    </div>
                                </div>
                                <form action="{{ route('scholarships.favorite', $scholarship) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="shrink-0 transition hover:scale-110" title="{{ in_array($scholarship->id, $favoriteIds) ? 'Remove from favorites' : 'Add to favorites' }}">
                                        @if(in_array($scholarship->id, $favoriteIds))
                                            <i class="fas fa-heart text-red-500 text-xl"></i>
                                        @else
                                            <i class="fas fa-heart text-gray-400 text-xl hover:text-gray-600"></i>
                                        @endif
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6 flex-1 flex flex-col gap-4">
                            <p class="text-sm text-gray-600 line-clamp-2">{{ $scholarship->description }}</p>

                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Award Amount:</span>
                                    <span class="font-semibold text-gray-900">${{ number_format($scholarship->amount, 2) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Deadline:</span>
                                    <span class="font-semibold text-gray-900">{{ $scholarship->deadline->format('M d, Y') }}</span>
                                </div>
                                @if($scholarship->gpa_requirement)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Min. GPA:</span>
                                        <span class="font-semibold text-gray-900">{{ number_format($scholarship->gpa_requirement, 1) }}</span>
                                    </div>
                                @endif
                            </div>

                            <details class="text-sm">
                                <summary class="cursor-pointer text-blue-600 hover:text-blue-700 font-medium">View Criteria & Eligibility</summary>
                                <div class="mt-2 text-gray-600 bg-gray-50 p-3 rounded text-xs whitespace-pre-wrap max-h-40 overflow-y-auto">{{ $scholarship->criteria }}</div>
                            </details>
                        </div>

                        <!-- Card Footer -->
                        <div class="p-6 border-t border-gray-100 bg-gray-50">
                            <a href="{{ route('scholarships.show', $scholarship) }}" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 transition">
                                <i class="fas fa-file-alt mr-2"></i>View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($scholarships->hasPages())
                <div class="mt-8">
                    {{ $scholarships->appends(request()->query())->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
@endsection
