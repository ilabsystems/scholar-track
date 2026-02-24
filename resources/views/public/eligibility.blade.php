@extends('public.layout')

@section('content')
<div class="min-h-screen bg-gray-50">
<!-- Eligibility Requirements -->
<section id="eligibility" class="py-24 sm:py-32 bg-gray-50">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Eligibility Requirements</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Check if you qualify for our municipal scholarship programs.</p>
        </div>
        <div class="mx-auto mt-16 max-w-4xl">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-map-marker-alt text-blue-500 text-xl mr-3"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Residency</h3>
                    </div>
                    <p class="text-gray-600">Must be a resident of our municipality for at least 6 months prior to application.</p>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-school text-green-500 text-xl mr-3"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Enrollment</h3>
                    </div>
                    <p class="text-gray-600">Currently enrolled in an accredited educational institution within the municipality.</p>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-chart-line text-purple-500 text-xl mr-3"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Academic Standing</h3>
                    </div>
                    <p class="text-gray-600">Minimum GPA of 2.5 or equivalent, with no failing grades in major subjects.</p>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-orange-500">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-file-alt text-orange-500 text-xl mr-3"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Documentation</h3>
                    </div>
                    <p class="text-gray-600">Complete set of required documents including certificates and identification.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Required Documents -->
<section id="documents" class="py-24 sm:py-32 bg-white">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Required Documents</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Prepare these documents before starting your application.</p>
        </div>
        <div class="mx-auto mt-16 max-w-4xl">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="flex items-start space-x-3">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">School ID</h4>
                        <p class="text-sm text-gray-600">Current school identification card</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Certificate of Enrollment</h4>
                        <p class="text-sm text-gray-600">Official enrollment certificate from your school</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Report Card/Grades</h4>
                        <p class="text-sm text-gray-600">Latest academic report card or transcript</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Barangay Certificate</h4>
                        <p class="text-sm text-gray-600">Certificate of residency from your barangay</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Certificate of Indigency</h4>
                        <p class="text-sm text-gray-600">For financial assistance applicants</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Birth Certificate</h4>
                        <p class="text-sm text-gray-600">PSA-issued birth certificate</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection
