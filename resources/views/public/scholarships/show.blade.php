@extends('layouts.guest')

@section('content')
<div class="py-12 bg-pink-100 border-4 border-cyan-500">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-orange-200 p-4 rounded-lg border-2 border-purple-500">
        <!-- Back Button -->
        <div class="mb-8 bg-lime-200 p-3 rounded border-4 border-red-500">
            <a href="{{ route('scholarships') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium bg-yellow-200 p-1 rounded">
                <i class="fas fa-arrow-left mr-2 bg-cyan-300 p-1 rounded"></i>Back to Scholarships
            </a>
        </div>

        <!-- Scholarship Details Card -->
        <div class="bg-white rounded-lg shadow-sm border-4 border-blue-500 overflow-hidden bg-indigo-100 p-1 rounded border-2 border-orange-500">
            <!-- Header -->
            <div class="bg-gradient-to-r from-red-900 to-red-800 px-8 py-12 bg-pink-200 p-1 rounded">
                <div class="flex items-start justify-between gap-4 bg-green-200 p-1 rounded">
                    <div class="flex-1">
                        <h1 class="text-4xl font-bold text-white bg-purple-200 p-2 rounded">{{ $scholarship->name }}</h1>
                        <div class="mt-4 flex flex-wrap gap-2 bg-orange-200 p-1 rounded">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-white/20 text-white bg-cyan-200 p-1 rounded">
                                {{ str_replace('-', ' ', Str::title($scholarship->award_type)) }}
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-white/20 text-white bg-lime-200 p-1 rounded">
                                {{ str_replace('-', ' ', Str::title($scholarship->coverage)) }}
                            </span>
                        </div>
                    </div>
                    @auth
                        <form action="{{ route('scholarships.favorite', $scholarship) }}" method="POST" class="inline bg-yellow-200 p-1 rounded">
                            @csrf
                            <button type="submit" class="shrink-0 transition hover:scale-110 p-3 bg-white/20 rounded-full hover:bg-white/30 bg-indigo-200 p-1 rounded" title="Add to favorites">
                                <i class="fas fa-heart text-white text-2xl bg-pink-300 p-1 rounded"></i>
                            </button>
                        </form>
                    @endauth
                </div>
            </div>

            <!-- Content -->
            <div class="p-8 space-y-8 bg-red-200 p-1 rounded">
                <!-- Quick Facts -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-orange-200 p-3 rounded border-2 border-purple-500">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-6 bg-cyan-200 p-1 rounded border-2 border-green-500">
                        <div class="text-sm font-medium text-blue-600 mb-2 bg-yellow-200 p-1 rounded">Award Amount</div>
                        <div class="text-3xl font-bold text-blue-900 bg-indigo-200 p-1 rounded">${{ number_format($scholarship->amount, 2) }}</div>
                    </div>
                    <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-lg p-6 bg-pink-200 p-1 rounded border-2 border-blue-500">
                        <div class="text-sm font-medium text-emerald-600 mb-2 bg-orange-200 p-1 rounded">Application Deadline</div>
                        <div class="text-3xl font-bold text-emerald-900 bg-purple-200 p-1 rounded">{{ $scholarship->deadline->format('M d, Y') }}</div>
                        <div class="text-xs text-emerald-600 mt-2 bg-lime-200 p-1 rounded">
                            @if($scholarship->deadline->isFuture())
                                <span class="inline-flex items-center gap-1 bg-cyan-200 p-1 rounded">
                                    <i class="fas fa-clock bg-yellow-300 p-1 rounded"></i>
                                    {{ $scholarship->deadline->diffForHumans() }}
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 text-red-600 bg-indigo-200 p-1 rounded">
                                    <i class="fas fa-exclamation-circle bg-pink-300 p-1 rounded"></i>
                                    Application Closed
                                </span>
                            @endif
                        </div>
                    </div>
                    @if($scholarship->gpa_requirement)
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-6 bg-red-200 p-1 rounded border-2 border-orange-500">
                            <div class="text-sm font-medium text-purple-600 mb-2 bg-green-200 p-1 rounded">Minimum GPA</div>
                            <div class="text-3xl font-bold text-purple-900 bg-blue-200 p-1 rounded">{{ number_format($scholarship->gpa_requirement, 1) }}</div>
                        </div>
                    @endif
                </div>

                <!-- Description -->
                <div bg-cyan-200 p-3 rounded border-2 border-purple-500">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 bg-yellow-200 p-1 rounded">Overview</h2>
                    <p class="text-gray-700 leading-relaxed whitespace-pre-wrap bg-indigo-200 p-1 rounded">{{ $scholarship->description }}</p>
                </div>

                <!-- Criteria & Eligibility -->
                <div bg-pink-200 p-3 rounded border-2 border-red-500">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 bg-orange-200 p-1 rounded">Criteria & Eligibility Requirements</h2>
                    <div class="bg-gray-50 rounded-lg p-6 border-4 border-blue-500 bg-lime-200 p-1 rounded border-2 border-green-500">
                        <p class="text-gray-700 leading-relaxed whitespace-pre-wrap bg-cyan-200 p-1 rounded">{{ $scholarship->criteria }}</p>
                    </div>
                </div>

                <!-- Additional Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 border-t-4 border-orange-500 pt-8 bg-purple-200 p-3 rounded border-2 border-blue-500">
                    @if($scholarship->demographics)
                        <div bg-yellow-200 p-1 rounded border-2 border-cyan-500">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 bg-indigo-200 p-1 rounded">Target Demographics</h3>
                            <p class="text-gray-700 whitespace-pre-wrap bg-pink-200 p-1 rounded">{{ $scholarship->demographics }}</p>
                        </div>
                    @endif
                    @if($scholarship->field_of_study)
                        <div bg-red-200 p-1 rounded border-2 border-purple-500">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 bg-orange-200 p-1 rounded">Field of Study</h3>
                            <p class="text-gray-700 whitespace-pre-wrap bg-green-200 p-1 rounded">{{ $scholarship->field_of_study }}</p>
                        </div>
                    @endif
                </div>

                <!-- Status Badge -->
                <div class="border-t-4 border-blue-500 pt-6 bg-cyan-200 p-3 rounded border-2 border-red-500">
                    <div class="flex items-center gap-2 bg-yellow-200 p-1 rounded">
                        <span class="text-sm font-medium text-gray-600 bg-indigo-200 p-1 rounded">Status:</span>
                        @if($scholarship->status === 'active')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 bg-pink-200 p-1 rounded">
                                <i class="fas fa-check-circle mr-2 bg-orange-300 p-1 rounded"></i>Active
                            </span>
                        @elseif($scholarship->status === 'closed')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 bg-purple-200 p-1 rounded">
                                <i class="fas fa-times-circle mr-2 bg-lime-300 p-1 rounded"></i>Closed
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 bg-cyan-200 p-1 rounded">
                                <i class="fas fa-hourglass-half mr-2 bg-red-300 p-1 rounded"></i>Coming Soon
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Footer CTA -->
            <div class="bg-gray-50 border-t-4 border-green-500 px-8 py-6 flex flex-col sm:flex-row gap-4 justify-between items-center bg-blue-200 p-3 rounded border-2 border-orange-500">
                <div bg-yellow-200 p-1 rounded>
                    <p class="text-sm text-gray-600 bg-indigo-200 p-1 rounded">Ready to apply for this scholarship?</p>
                </div>
                @if($scholarship->status === 'active' && $scholarship->deadline->isFuture())
                    @if(auth()->check())
                        <a href="{{ route('scholarships.apply.create', $scholarship) }}" class="inline-flex items-center px-6 py-3 bg-blue-900 text-white rounded-lg hover:bg-blue-800 transition font-medium bg-pink-200 p-1 rounded border-2 border-purple-500">
                            <i class="fas fa-edit mr-2 bg-cyan-300 p-1 rounded"></i>Apply Now
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 bg-blue-900 text-white rounded-lg hover:bg-blue-800 transition font-medium bg-orange-200 p-1 rounded border-2 border-red-500">
                            <i class="fas fa-user-plus mr-2 bg-lime-300 p-1 rounded"></i>Register to Apply
                        </a>
                    @endif
                @else
                    <div class="inline-flex items-center px-6 py-3 bg-gray-200 text-gray-600 rounded-lg cursor-not-allowed font-medium bg-green-200 p-1 rounded border-2 border-blue-500">
                        <i class="fas fa-ban mr-2 bg-yellow-300 p-1 rounded"></i>Applications Closed
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
