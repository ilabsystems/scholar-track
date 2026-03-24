@extends('layouts.guest')

@section('content')
    <!-- Contact / Support -->
    <section id="contact" class="bg-white">
        <div class="px-6 py-24 sm:px-6 sm:py-32 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Get in Touch</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-slate-600">Have questions about the scholarship program? Our team is here to help.</p>
                <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-3">
                    <div class="text-center">
                        <i class="fas fa-map-marker-alt text-blue-900 text-2xl mb-2"></i>
                        <h3 class="text-lg font-semibold text-slate-900">Office Address</h3>
                        <p class="text-slate-600">Municipal Hall, Scholarship Office<br>Our Municipality, Philippines</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-envelope text-blue-900 text-2xl mb-2"></i>
                        <h3 class="text-lg font-semibold text-slate-900">Email</h3>
                        <p class="text-slate-600">scholarship@municipality.gov.ph</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-phone text-blue-900 text-2xl mb-2"></i>
                        <h3 class="text-lg font-semibold text-slate-900">Phone</h3>
                        <p class="text-slate-600">(+63) 123-456-7890</p>
                    </div>
                </div>
                <div class="mt-10">
                    <p class="text-slate-600"><strong>Office Hours:</strong> Monday - Friday, 8:00 AM - 5:00 PM</p>
                </div>
            </div>
        </div>
    </section>
@endsection
