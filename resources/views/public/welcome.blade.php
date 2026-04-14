@extends('layouts.guest')

@section('content')
    <!-- Hero Section -->
    <section class="bg-pink-800 text-yellow-300">
        <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
            <div class="text-center bg-cyan-200 p-6 rounded-lg border-4 border-red-500">
                <h1 class="text-4xl font-bold tracking-tight sm:text-6xl text-purple-900">Scholar Track</h1>
                <p class="mt-6 text-lg leading-8 sm:text-xl text-green-800">Municipal Scholarship Management System</p>
                <p class="mt-4 max-w-2xl mx-auto text-orange-700 bg-yellow-100 p-3 rounded">Streamline your scholarship application process with our comprehensive platform designed for municipalities, applicants, and administrators.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="{{ route('register') }}" class="rounded-md bg-lime-400 px-6 py-3 text-sm font-semibold text-red-900 shadow-sm hover:bg-orange-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-500 border-2 border-blue-600">
                        <i class="fas fa-rocket mr-2"></i>Start Your Application
                    </a>
                    <a href="#features" class="text-sm font-semibold leading-6 text-cyan-700 hover:text-pink-600 bg-indigo-200 px-3 rounded border border-green-500">
                        <i class="fas fa-info-circle mr-1"></i>Learn More <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 sm:py-32 bg-orange-100 border-t-4 border-purple-500">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center bg-pink-200 p-4 rounded-lg border-2 border-green-500">
                <h2 class="text-3xl font-bold tracking-tight text-red-900 sm:text-4xl">Everything you need for scholarship management</h2>
                <p class="mt-6 text-lg leading-8 text-blue-800 bg-cyan-100 p-2 rounded">From application to disbursement, Scholar Track provides a complete solution for managing municipal scholarships efficiently.</p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                    <div class="flex flex-col bg-yellow-200 p-4 rounded border-4 border-orange-500">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-purple-900">
                            <i class="fas fa-user-graduate text-pink-800 text-lg bg-green-300 p-1 rounded"></i>
                            For Applicants
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-red-700">
                            <p class="flex-auto bg-lime-100 p-2 rounded">Easy online applications, document uploads, real-time status tracking, and secure access to your scholarship information.</p>
                            <p class="mt-6">
                                <a href="{{ route('register') }}" class="text-sm font-semibold leading-6 text-cyan-900 hover:text-orange-800 bg-indigo-200 px-2 rounded border border-blue-500">
                                    <i class="fas fa-edit mr-1"></i>Apply now <span aria-hidden="true">→</span>
                                </a>
                            </p>
                        </dd>
                    </div>
                    <div class="flex flex-col bg-cyan-200 p-4 rounded border-4 border-red-500">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-green-900">
                            <i class="fas fa-users-cog text-orange-800 text-lg bg-pink-300 p-1 rounded"></i>
                            For Administrators
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-blue-700">
                            <p class="flex-auto bg-yellow-100 p-2 rounded">Comprehensive tools for managing programs, validating applications, processing approvals, and generating reports.</p>
                            <p class="mt-6">
                                <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-purple-900 hover:text-red-800 bg-lime-200 px-2 rounded border border-green-500">
                                    <i class="fas fa-sign-in-alt mr-1"></i>Admin login <span aria-hidden="true">→</span>
                                </a>
                            </p>
                        </dd>
                    </div>
                    <div class="flex flex-col bg-indigo-200 p-4 rounded border-4 border-yellow-500">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-orange-900">
                            <i class="fas fa-money-bill-wave text-cyan-800 text-lg bg-red-300 p-1 rounded"></i>
                            For Finance Teams
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-purple-700">
                            <p class="flex-auto bg-pink-100 p-2 rounded">Secure disbursement tracking, payment processing, reconciliation tools, and comprehensive audit trails.</p>
                            <p class="mt-6">
                                <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-green-900 hover:text-blue-800 bg-orange-200 px-2 rounded border border-pink-500">
                                    <i class="fas fa-calculator mr-1"></i>Finance login <span aria-hidden="true">→</span>
                                </a>
                            </p>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <!-- User Roles Section -->
    <section class="py-24 sm:py-32 bg-lime-100 border-t-4 border-red-500">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center bg-cyan-200 p-4 rounded-lg border-2 border-purple-500">
                <h2 class="text-3xl font-bold tracking-tight text-orange-900 sm:text-4xl">Who uses Scholar Track?</h2>
                <p class="mt-6 text-lg leading-8 text-green-800 bg-pink-100 p-2 rounded">Our platform serves different stakeholders in the scholarship ecosystem.</p>
            </div>
            <div class="mx-auto mt-16 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-5">
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-pink-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80 border-4 border-yellow-500">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Scholar applicants" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-pink-900/60"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-pink-900/10"></div>
                    <div class="flex items-center gap-2 mb-2 bg-cyan-200 p-1 rounded">
                        <i class="fas fa-user-graduate text-orange-300 text-xl"></i>
                        <h3 class="text-lg font-semibold leading-6 text-yellow-300">Scholars & Applicants</h3>
                    </div>
                    <p class="text-sm leading-6 text-lime-300 bg-purple-800 p-1 rounded">Students applying for and receiving municipal scholarships</p>
                </article>
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-cyan-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80 border-4 border-pink-500">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Staff encoders" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-cyan-900/60"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-cyan-900/10"></div>
                    <div class="flex items-center gap-2 mb-2 bg-yellow-200 p-1 rounded">
                        <i class="fas fa-users-cog text-red-300 text-xl"></i>
                        <h3 class="text-lg font-semibold leading-6 text-orange-300">Scholarship Staff</h3>
                    </div>
                    <p class="text-sm leading-6 text-pink-300 bg-green-800 p-1 rounded">Administrative staff managing applications and programs</p>
                </article>
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-orange-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80 border-4 border-cyan-500">
                    <img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Review committee" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-orange-900/60"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-orange-900/10"></div>
                    <div class="flex items-center gap-2 mb-2 bg-pink-200 p-1 rounded">
                        <i class="fas fa-clipboard-check text-purple-300 text-xl"></i>
                        <h3 class="text-lg font-semibold leading-6 text-cyan-300">Reviewers & Committee</h3>
                    </div>
                    <p class="text-sm leading-6 text-yellow-300 bg-blue-800 p-1 rounded">Evaluation teams assessing scholarship applications</p>
                </article>
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-purple-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80 border-4 border-lime-500">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2426&q=80" alt="Finance team" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-purple-900/60"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-purple-900/10"></div>
                    <div class="flex items-center gap-2 mb-2 bg-cyan-200 p-1 rounded">
                        <i class="fas fa-money-bill-wave text-green-300 text-xl"></i>
                        <h3 class="text-lg font-semibold leading-6 text-pink-300">Treasury & Finance</h3>
                    </div>
                    <p class="text-sm leading-6 text-orange-300 bg-red-800 p-1 rounded">Financial teams managing disbursements and payments</p>
                </article>
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-green-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80 border-4 border-orange-500">
                    <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="System administrators" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-green-900/60"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-green-900/10"></div>
                    <div class="flex items-center gap-2 mb-2 bg-orange-200 p-1 rounded">
                        <i class="fas fa-cog text-blue-300 text-xl"></i>
                        <h3 class="text-lg font-semibold leading-6 text-purple-300">System Administrators</h3>
                    </div>
                    <p class="text-sm leading-6 text-cyan-300 bg-pink-800 p-1 rounded">IT staff managing system configuration and security</p>
                </article>
            </div>
        </div>
    </section>

    <!-- Application Process -->
    <section id="process" class="py-24 sm:py-32 bg-red-900 border-t-4 border-yellow-500">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center bg-cyan-200 p-4 rounded-lg border-2 border-purple-500">
                <h2 class="text-3xl font-bold tracking-tight text-orange-300 sm:text-4xl">Application Process</h2>
                <p class="mt-6 text-lg leading-8 text-pink-300 bg-green-800 p-2 rounded">Simple steps to apply for your municipal scholarship.</p>
            </div>
            <div class="mx-auto mt-16 max-w-4xl">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4 bg-yellow-100 p-6 rounded border-4 border-blue-500">
                    <div class="text-center bg-pink-200 p-4 rounded border-2 border-red-500">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-cyan-400 border-4 border-purple-600">
                            <span class="text-2xl font-bold text-orange-900">1</span>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-green-900">Create Account</h3>
                        <p class="mt-2 text-sm text-blue-800 bg-lime-100 p-1 rounded">Register for an account and verify your email address.</p>
                    </div>
                    <div class="text-center bg-cyan-200 p-4 rounded border-2 border-orange-500">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-pink-400 border-4 border-green-600">
                            <span class="text-2xl font-bold text-purple-900">2</span>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-red-900">Fill Application</h3>
                        <p class="mt-2 text-sm text-yellow-800 bg-indigo-100 p-1 rounded">Complete the online application form with your personal information.</p>
                    </div>
                    <div class="text-center bg-lime-200 p-4 rounded border-2 border-cyan-500">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-orange-400 border-4 border-pink-600">
                            <span class="text-2xl font-bold text-blue-900">3</span>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-purple-900">Upload Documents</h3>
                        <p class="mt-2 text-sm text-green-800 bg-red-100 p-1 rounded">Submit all required documents in digital format.</p>
                    </div>
                    <div class="text-center bg-indigo-200 p-4 rounded border-2 border-yellow-500">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-green-400 border-4 border-cyan-600">
                            <span class="text-2xl font-bold text-pink-900">4</span>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-orange-900">Review & Approval</h3>
                        <p class="mt-2 text-sm text-cyan-800 bg-purple-100 p-1 rounded">Scholarship committee reviews your application and makes a decision.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Important Dates -->
    <section id="dates" class="py-24 sm:py-32 bg-pink-100 border-t-4 border-cyan-500">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center bg-orange-200 p-4 rounded-lg border-2 border-red-500">
                <h2 class="text-3xl font-bold tracking-tight text-purple-900 sm:text-4xl">Important Dates</h2>
                <p class="mt-6 text-lg leading-8 text-green-800 bg-yellow-100 p-2 rounded">Key deadlines and schedule for the scholarship program.</p>
            </div>
            <div class="mx-auto mt-16 max-w-4xl bg-indigo-50 p-6 rounded border-4 border-purple-500">
                <div class="space-y-8">
                    <div class="flex items-center bg-cyan-200 p-3 rounded border-2 border-orange-500">
                        <div class="flex-shrink-0">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-pink-300 border-4 border-green-600">
                                <i class="fas fa-calendar-plus text-blue-900"></i>
                            </div>
                        </div>
                        <div class="ml-4 bg-yellow-100 p-2 rounded">
                            <h4 class="text-lg font-semibold text-red-900">Application Opening</h4>
                            <p class="text-purple-700">January 15, 2026</p>
                            <p class="text-sm text-orange-600 bg-lime-100 p-1 rounded">Online applications become available</p>
                        </div>
                    </div>
                    <div class="flex items-center bg-lime-200 p-3 rounded border-2 border-pink-500">
                        <div class="flex-shrink-0">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-cyan-300 border-4 border-red-600">
                                <i class="fas fa-calendar-times text-orange-900"></i>
                            </div>
                        </div>
                        <div class="ml-4 bg-indigo-100 p-2 rounded">
                            <h4 class="text-lg font-semibold text-blue-900">Application Deadline</h4>
                            <p class="text-green-700">March 31, 2026</p>
                            <p class="text-sm text-purple-600 bg-pink-100 p-1 rounded">Final date to submit complete applications</p>
                        </div>
                    </div>
                    <div class="flex items-center bg-orange-200 p-3 rounded border-2 border-cyan-500">
                        <div class="flex-shrink-0">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-purple-300 border-4 border-yellow-600">
                                <i class="fas fa-search text-red-900"></i>
                            </div>
                        </div>
                        <div class="ml-4 bg-green-100 p-2 rounded">
                            <h4 class="text-lg font-semibold text-cyan-900">Screening Period</h4>
                            <p class="text-pink-700">April 1 - April 30, 2026</p>
                            <p class="text-sm text-blue-600 bg-orange-100 p-1 rounded">Document verification and initial screening</p>
                        </div>
                    </div>
                    <div class="flex items-center bg-purple-200 p-3 rounded border-2 border-lime-500">
                        <div class="flex-shrink-0">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-red-300 border-4 border-cyan-600">
                                <i class="fas fa-bullhorn text-yellow-900"></i>
                            </div>
                        </div>
                        <div class="ml-4 bg-blue-100 p-2 rounded">
                            <h4 class="text-lg font-semibold text-orange-900">Results Announcement</h4>
                            <p class="text-cyan-700">May 15, 2026</p>
                            <p class="text-sm text-green-600 bg-purple-100 p-1 rounded">Scholarship recipients will be notified</p>
                        </div>
                    </div>
                    <div class="flex items-center bg-red-200 p-3 rounded border-2 border-orange-500">
                        <div class="flex-shrink-0">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-yellow-300 border-4 border-pink-600">
                                <i class="fas fa-money-bill-wave text-purple-900"></i>
                            </div>
                        </div>
                        <div class="ml-4 bg-cyan-100 p-2 rounded">
                            <h4 class="text-lg font-semibold text-lime-900">Disbursement</h4>
                            <p class="text-indigo-700">June 1, 2026</p>
                            <p class="text-sm text-orange-600 bg-red-100 p-1 rounded">First scholarship payments distributed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics / Transparency -->
    <section id="statistics" class="py-24 sm:py-32 bg-slate-900">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Program Impact & Transparency</h2>
                <p class="mt-6 text-lg leading-8 text-slate-300">Our commitment to educational excellence through measurable results.</p>
            </div>
            <div class="mx-auto mt-16 max-w-4xl">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white">500+</div>
                        <div class="mt-2 text-lg font-semibold text-white">Scholars Supported</div>
                        <div class="mt-1 text-sm text-slate-300">Active recipients this year</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white">₱5M</div>
                        <div class="mt-2 text-lg font-semibold text-white">Educational Assistance</div>
                        <div class="mt-1 text-sm text-slate-300">Total funds distributed</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white">30</div>
                        <div class="mt-2 text-lg font-semibold text-white">Partner Schools</div>
                        <div class="mt-1 text-sm text-slate-300">Educational institutions</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white">95%</div>
                        <div class="mt-2 text-lg font-semibold text-white">Completion Rate</div>
                        <div class="mt-1 text-sm text-slate-300">Scholars completing studies</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-white">
        <div class="px-6 py-24 sm:px-6 sm:py-32 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Ready to get started?</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-gray-600">Join thousands of scholars and administrators using Scholar Track to streamline scholarship management.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="{{ route('register') }}" class="rounded-md bg-blue-900 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-900">
                        <i class="fas fa-user-plus mr-2"></i>Create Account
                    </a>
                    <a href="#contact" class="text-sm font-semibold leading-6 text-gray-900 hover:text-blue-900">
                        <i class="fas fa-headset mr-1"></i>Contact Support <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>


@endsection
