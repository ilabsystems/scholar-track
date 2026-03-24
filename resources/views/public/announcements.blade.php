@extends('public.layout')

@section('content')
<section id="news" class="py-20 px-6 lg:px-12 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-end justify-between mb-10 flex-wrap gap-4">
            <div>
                <span class="text-blue-600 font-bold text-xs uppercase tracking-widest">Local Updates</span>
                <h2 class="text-3xl font-extrabold text-slate-900 mt-1">Barangay Announcements</h2>
            </div>
            <span class="text-xs text-slate-400 font-medium">Posted by the Scholarship Office</span>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @forelse ($announcements as $item)
            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center gap-2 mb-3">
                    <span class="w-2.5 h-2.5 bg-blue-500 rounded-full animate-pulse"></span>
                    <span class="text-blue-600 font-bold text-xs uppercase tracking-wide">{{ $item['barangay'] }}</span>
                </div>
                <p class="text-slate-800 font-semibold leading-snug">{{ $item['message'] }}</p>
                <p class="text-slate-400 text-xs mt-3 font-medium">{{ $item['date'] }}</p>
            </div>
            @empty
            <p class="text-slate-400 col-span-3 text-center">No announcements at this time.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
