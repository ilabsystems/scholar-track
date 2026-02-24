@extends('public.layout')

@section('content')
    <!-- Contact / Support -->
    <section id="contact" class="bg-blue-600">
        <div class="px-6 py-24 sm:px-6 sm:py-32 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Get in Touch</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-blue-100">Have questions about the scholarship program? Our team is here to help.</p>
                <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-3">
                    <div class="text-center">
                        <i class="fas fa-map-marker-alt text-blue-200 text-2xl mb-2"></i>
                        <h3 class="text-lg font-semibold text-white">Office Address</h3>
                        <p class="text-blue-100">Municipal Hall, Scholarship Office<br>Our Municipality, Philippines</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-envelope text-blue-200 text-2xl mb-2"></i>
                        <h3 class="text-lg font-semibold text-white">Email</h3>
                        <p class="text-blue-100">scholarship@municipality.gov.ph</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-phone text-blue-200 text-2xl mb-2"></i>
                        <h3 class="text-lg font-semibold text-white">Phone</h3>
                        <p class="text-blue-100">(+63) 123-456-7890</p>
                    </div>
                </div>
                <div class="mt-10">
                    <p class="text-blue-100"><strong>Office Hours:</strong> Monday - Friday, 8:00 AM - 5:00 PM</p>
                </div>
            </div>
        </div>
    </section>
@endsection
