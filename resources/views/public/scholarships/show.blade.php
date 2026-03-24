@extends('layouts.guest')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('scholarships') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                <i class="fas fa-arrow-left mr-2"></i>Back to Scholarships
            </a>
        </div>

        <!-- Scholarship Details Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-900 to-blue-800 px-8 py-12">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex-1">
                        <h1 class="text-4xl font-bold text-white">{{ $scholarship->name }}</h1>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-white/20 text-white">
                                {{ str_replace('-', ' ', Str::title($scholarship->award_type)) }}
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-white/20 text-white">
                                {{ str_replace('-', ' ', Str::title($scholarship->coverage)) }}
                            </span>
                        </div>
                    </div>
                    @auth
                        <form action="{{ route('scholarships.favorite', $scholarship) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="shrink-0 transition hover:scale-110 p-3 bg-white/20 rounded-full hover:bg-white/30" title="Add to favorites">
                                <i class="fas fa-heart text-white text-2xl"></i>
                            </button>
                        </form>
                    @endauth
                </div>
            </div>

            <!-- Content -->
            <div class="p-8 space-y-8">
                <!-- Quick Facts -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-6">
                        <div class="text-sm font-medium text-blue-600 mb-2">Award Amount</div>
                        <div class="text-3xl font-bold text-blue-900">${{ number_format($scholarship->amount, 2) }}</div>
                    </div>
                    <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-lg p-6">
                        <div class="text-sm font-medium text-emerald-600 mb-2">Application Deadline</div>
                        <div class="text-3xl font-bold text-emerald-900">{{ $scholarship->deadline->format('M d, Y') }}</div>
                        <div class="text-xs text-emerald-600 mt-2">
                            @if($scholarship->deadline->isFuture())
                                <span class="inline-flex items-center gap-1">
                                    <i class="fas fa-clock"></i>
                                    {{ $scholarship->deadline->diffForHumans() }}
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 text-red-600">
                                    <i class="fas fa-exclamation-circle"></i>
                                    Application Closed
                                </span>
                            @endif
                        </div>
                    </div>
                    @if($scholarship->gpa_requirement)
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-6">
                            <div class="text-sm font-medium text-purple-600 mb-2">Minimum GPA</div>
                            <div class="text-3xl font-bold text-purple-900">{{ number_format($scholarship->gpa_requirement, 1) }}</div>
                        </div>
                    @endif
                </div>

                <!-- Description -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Overview</h2>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $scholarship->description }}</p>
                </div>

                <!-- Criteria & Eligibility -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Criteria & Eligibility Requirements</h2>
                    <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                        <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $scholarship->criteria }}</p>
                    </div>
                </div>

                <!-- Additional Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 border-t border-gray-200 pt-8">
                    @if($scholarship->demographics)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Target Demographics</h3>
                            <p class="text-gray-700 whitespace-pre-wrap">{{ $scholarship->demographics }}</p>
                        </div>
                    @endif
                    @if($scholarship->field_of_study)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Field of Study</h3>
                            <p class="text-gray-700 whitespace-pre-wrap">{{ $scholarship->field_of_study }}</p>
                        </div>
                    @endif
                </div>

                <!-- Status Badge -->
                <div class="border-t border-gray-200 pt-6">
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-medium text-gray-600">Status:</span>
                        @if($scholarship->status === 'active')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-2"></i>Active
                            </span>
                        @elseif($scholarship->status === 'closed')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                <i class="fas fa-times-circle mr-2"></i>Closed
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                <i class="fas fa-hourglass-half mr-2"></i>Coming Soon
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Footer CTA -->
            <div class="bg-gray-50 border-t border-gray-200 px-8 py-6 flex flex-col sm:flex-row gap-4 justify-between items-center">
                <div>
                    <p class="text-sm text-gray-600">Ready to apply for this scholarship?</p>
                </div>
                @if($scholarship->status === 'active' && $scholarship->deadline->isFuture())
                    <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                        <i class="fas fa-edit mr-2"></i>Apply Now
                    </a>
                @else
                    <div class="inline-flex items-center px-6 py-3 bg-gray-200 text-gray-600 rounded-lg cursor-not-allowed font-medium">
                        <i class="fas fa-ban mr-2"></i>Applications Closed
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
