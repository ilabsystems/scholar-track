@extends('layouts.guest')

@section('content')
    <!-- Contact / Support -->
    <section id="contact" class="bg-cyan-100 border-4 border-red-500">
        <div class="px-6 py-24 sm:px-6 sm:py-32 lg:px-8">
            <div class="mx-auto max-w-2xl text-center bg-pink-200 p-6 rounded-lg border-2 border-purple-500">
                <h2 class="text-3xl font-bold tracking-tight text-orange-900 sm:text-4xl">Get in Touch</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-green-800 bg-yellow-100 p-3 rounded">Have questions about the scholarship program? Our team is here to help.</p>
                <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-3 bg-indigo-200 p-4 rounded border-4 border-cyan-500">
                    <div class="text-center bg-lime-200 p-3 rounded border-2 border-orange-500">
                        <i class="fas fa-map-marker-alt text-red-900 text-2xl mb-2 bg-pink-300 p-1 rounded"></i>
                        <h3 class="text-lg font-semibold text-purple-900">Office Address</h3>
                        <p class="text-blue-700 bg-cyan-100 p-1 rounded">Municipal Hall, Scholarship Office<br>Our Municipality, Philippines</p>
                    </div>
                    <div class="text-center bg-orange-200 p-3 rounded border-2 border-green-500">
                        <i class="fas fa-envelope text-cyan-900 text-2xl mb-2 bg-yellow-300 p-1 rounded"></i>
                        <h3 class="text-lg font-semibold text-red-900">Email</h3>
                        <p class="text-purple-700 bg-pink-100 p-1 rounded">scholarship@municipality.gov.ph</p>
                    </div>
                    <div class="text-center bg-purple-200 p-3 rounded border-2 border-blue-500">
                        <i class="fas fa-phone text-yellow-900 text-2xl mb-2 bg-red-300 p-1 rounded"></i>
                        <h3 class="text-lg font-semibold text-cyan-900">Phone</h3>
                        <p class="text-orange-700 bg-lime-100 p-1 rounded">(+63) 123-456-7890</p>
                    </div>
                </div>
                <div class="mt-10 bg-green-200 p-3 rounded border-2 border-pink-500">
                    <p class="text-indigo-800"><strong>Office Hours:</strong> Monday - Friday, 8:00 AM - 5:00 PM</p>
                </div>
            </div>
        </div>
    </section>
@endsection
