@extends('public.layout')

@section('content')
<div class="min-h-screen bg-gray-50">
<!-- Announcements / Updates -->
<section id="announcements" class="py-24 sm:py-32 bg-white">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Latest Announcements</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Stay updated with the latest news and important notices.</p>
        </div>
        <div class="mx-auto mt-16 max-w-4xl">
            <div class="space-y-6">
                <div class="bg-blue-50 border-l-4 border-blue-500 p-6 rounded-r-lg">
                    <div class="flex items-center justify-between">
                        <h4 class="text-lg font-semibold text-gray-900">2026 Scholarship Application Now Open</h4>
                        <span class="text-sm text-gray-500">January 15, 2026</span>
                    </div>
                    <p class="mt-2 text-gray-600">The application period for the 2026 Municipal Scholarship Program is now open. All eligible students are encouraged to apply before the March 31 deadline.</p>
                </div>
                <div class="bg-green-50 border-l-4 border-green-500 p-6 rounded-r-lg">
                    <div class="flex items-center justify-between">
                        <h4 class="text-lg font-semibold text-gray-900">Document Verification Reminder</h4>
                        <span class="text-sm text-gray-500">February 10, 2026</span>
                    </div>
                    <p class="mt-2 text-gray-600">Please ensure all uploaded documents are clear and legible. Incomplete submissions may result in application delays.</p>
                </div>
                <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-r-lg">
                    <div class="flex items-center justify-between">
                        <h4 class="text-lg font-semibold text-gray-900">Virtual Orientation Session</h4>
                        <span class="text-sm text-gray-500">February 28, 2026</span>
                    </div>
                    <p class="mt-2 text-gray-600">Join our virtual orientation on March 5, 2026 at 2:00 PM to learn about the application process and program benefits.</p>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection
