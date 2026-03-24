@extends('public.layout')

@section('content')
    <!-- Hero Section -->
    <section class="bg-slate-900 text-white">
        <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight sm:text-6xl">Scholar Track</h1>
                <p class="mt-6 text-lg leading-8 sm:text-xl">Municipal Scholarship Management System</p>
                <p class="mt-4 max-w-2xl mx-auto text-slate-300">Streamline your scholarship application process with our comprehensive platform designed for municipalities, applicants, and administrators.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="{{ route('register') }}" class="rounded-md bg-white px-6 py-3 text-sm font-semibold text-slate-900 shadow-sm hover:bg-slate-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                        <i class="fas fa-rocket mr-2"></i>Start Your Application
                    </a>
                    <a href="#features" class="text-sm font-semibold leading-6 text-slate-300 hover:text-white">
                        <i class="fas fa-info-circle mr-1"></i>Learn More <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 sm:py-32 bg-white">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Everything you need for scholarship management</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">From application to disbursement, Scholar Track provides a complete solution for managing municipal scholarships efficiently.</p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <i class="fas fa-user-graduate text-blue-900 text-lg"></i>
                            For Applicants
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">Easy online applications, document uploads, real-time status tracking, and secure access to your scholarship information.</p>
                            <p class="mt-6">
                                <a href="{{ route('register') }}" class="text-sm font-semibold leading-6 text-blue-900 hover:text-blue-800">
                                    <i class="fas fa-edit mr-1"></i>Apply now <span aria-hidden="true">→</span>
                                </a>
                            </p>
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <i class="fas fa-users-cog text-blue-900 text-lg"></i>
                            For Administrators
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">Comprehensive tools for managing programs, validating applications, processing approvals, and generating reports.</p>
                            <p class="mt-6">
                                <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-blue-900 hover:text-blue-800">
                                    <i class="fas fa-sign-in-alt mr-1"></i>Admin login <span aria-hidden="true">→</span>
                                </a>
                            </p>
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <i class="fas fa-money-bill-wave text-blue-900 text-lg"></i>
                            For Finance Teams
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">Secure disbursement tracking, payment processing, reconciliation tools, and comprehensive audit trails.</p>
                            <p class="mt-6">
                                <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-blue-900 hover:text-blue-800">
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
    <section class="py-24 sm:py-32 bg-slate-50">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Who uses Scholar Track?</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">Our platform serves different stakeholders in the scholarship ecosystem.</p>
            </div>
            <div class="mx-auto mt-16 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-5">
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Scholar applicants" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-gray-900/60"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-user-graduate text-white text-xl"></i>
                        <h3 class="text-lg font-semibold leading-6 text-white">Scholars & Applicants</h3>
                    </div>
                    <p class="text-sm leading-6 text-gray-300">Students applying for and receiving municipal scholarships</p>
                </article>
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Staff encoders" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-gray-900/60"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-users-cog text-white text-xl"></i>
                        <h3 class="text-lg font-semibold leading-6 text-white">Scholarship Staff</h3>
                    </div>
                    <p class="text-sm leading-6 text-gray-300">Administrative staff managing applications and programs</p>
                </article>
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                    <img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Review committee" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-gray-900/60"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-clipboard-check text-white text-xl"></i>
                        <h3 class="text-lg font-semibold leading-6 text-white">Reviewers & Committee</h3>
                    </div>
                    <p class="text-sm leading-6 text-gray-300">Evaluation teams assessing scholarship applications</p>
                </article>
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2426&q=80" alt="Finance team" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-gray-900/60"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-money-bill-wave text-white text-xl"></i>
                        <h3 class="text-lg font-semibold leading-6 text-white">Treasury & Finance</h3>
                    </div>
                    <p class="text-sm leading-6 text-gray-300">Financial teams managing disbursements and payments</p>
                </article>
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                    <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="System administrators" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-gray-900/60"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-cog text-white text-xl"></i>
                        <h3 class="text-lg font-semibold leading-6 text-white">System Administrators</h3>
                    </div>
                    <p class="text-sm leading-6 text-gray-300">IT staff managing system configuration and security</p>
                </article>
            </div>
        </div>
    </section>

    <!-- Application Process -->
    <section id="process" class="py-24 sm:py-32 bg-slate-900">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Application Process</h2>
                <p class="mt-6 text-lg leading-8 text-slate-300">Simple steps to apply for your municipal scholarship.</p>
            </div>
            <div class="mx-auto mt-16 max-w-4xl">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                    <div class="text-center">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-white">
                            <span class="text-2xl font-bold text-slate-900">1</span>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-white">Create Account</h3>
                        <p class="mt-2 text-sm text-slate-300">Register for an account and verify your email address.</p>
                    </div>
                    <div class="text-center">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-white">
                            <span class="text-2xl font-bold text-slate-900">2</span>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-white">Fill Application</h3>
                        <p class="mt-2 text-sm text-slate-300">Complete the online application form with your personal information.</p>
                    </div>
                    <div class="text-center">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-white">
                            <span class="text-2xl font-bold text-slate-900">3</span>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-white">Upload Documents</h3>
                        <p class="mt-2 text-sm text-slate-300">Submit all required documents in digital format.</p>
                    </div>
                    <div class="text-center">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-white">
                            <span class="text-2xl font-bold text-slate-900">4</span>
                        </div>
                        <h3 class="mt-4 text-lg font-semibold text-white">Review & Approval</h3>
                        <p class="mt-2 text-sm text-slate-300">Scholarship committee reviews your application and makes a decision.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Important Dates -->
    <section id="dates" class="py-24 sm:py-32 bg-slate-50">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Important Dates</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">Key deadlines and schedule for the scholarship program.</p>
            </div>
            <div class="mx-auto mt-16 max-w-4xl">
                <div class="space-y-8">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100">
                                <i class="fas fa-calendar-plus text-blue-900"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900">Application Opening</h4>
                            <p class="text-gray-600">January 15, 2026</p>
                            <p class="text-sm text-gray-500">Online applications become available</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-red-100">
                                <i class="fas fa-calendar-times text-red-600"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900">Application Deadline</h4>
                            <p class="text-gray-600">March 31, 2026</p>
                            <p class="text-sm text-gray-500">Final date to submit complete applications</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-yellow-100">
                                <i class="fas fa-search text-yellow-600"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900">Screening Period</h4>
                            <p class="text-gray-600">April 1 - April 30, 2026</p>
                            <p class="text-sm text-gray-500">Document verification and initial screening</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-green-100">
                                <i class="fas fa-bullhorn text-green-600"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900">Results Announcement</h4>
                            <p class="text-gray-600">May 15, 2026</p>
                            <p class="text-sm text-gray-500">Scholarship recipients will be notified</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-purple-100">
                                <i class="fas fa-money-bill-wave text-purple-600"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900">Disbursement</h4>
                            <p class="text-gray-600">June 1, 2026</p>
                            <p class="text-sm text-gray-500">First scholarship payments distributed</p>
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
