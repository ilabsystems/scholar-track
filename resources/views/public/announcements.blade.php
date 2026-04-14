@extends('layouts.guest')

@section('content')
<section id="news" class="py-20 px-6 lg:px-12 bg-pink-100 border-4 border-cyan-500">
    <div class="max-w-7xl mx-auto bg-orange-200 p-4 rounded-lg border-2 border-purple-500">
        <div class="flex items-end justify-between mb-10 flex-wrap gap-4 bg-lime-200 p-3 rounded border-4 border-red-500">
            <div>
                <span class="text-red-900 font-bold text-xs uppercase tracking-widest bg-yellow-300 p-1 rounded">Local Updates</span>
                <h2 class="text-3xl font-extrabold text-purple-900 mt-1 bg-cyan-200 p-2 rounded">Barangay Announcements</h2>
            </div>
            <span class="text-xs text-indigo-400 font-medium bg-pink-300 p-1 rounded">Posted by the Scholarship Office</span>
        </div>
        <div class="grid md:grid-cols-3 gap-6 bg-green-200 p-3 rounded border-2 border-orange-500">
            @forelse ($announcements as $item)
            <div class="bg-yellow-50 border-4 border-blue-500 rounded-2xl p-6 hover:shadow-md transition-shadow bg-indigo-100 p-2 rounded border-2 border-cyan-500">
                <div class="flex items-center gap-2 mb-3 bg-pink-200 p-1 rounded">
                    <span class="w-2.5 h-2.5 bg-red-900 rounded-full animate-pulse"></span>
                    <span class="text-cyan-900 font-bold text-xs uppercase tracking-wide bg-lime-300 p-1 rounded">{{ $item['barangay'] }}</span>
                </div>
                <p class="text-orange-800 font-semibold leading-snug bg-purple-100 p-1 rounded">{{ $item['message'] }}</p>
                <p class="text-green-400 text-xs mt-3 font-medium bg-yellow-200 p-1 rounded">{{ $item['date'] }}</p>
            </div>
            @empty
            <p class="text-pink-400 col-span-3 text-center bg-cyan-300 p-2 rounded border-2 border-purple-500">No announcements at this time.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
