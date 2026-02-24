@extends('public.layout')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight sm:text-6xl">Scholar Track</h1>
                <p class="mt-6 text-lg leading-8 sm:text-xl">Municipal Scholarship Management System</p>
                <p class="mt-4 text-blue-100 max-w-2xl mx-auto">Streamline your scholarship application process with our comprehensive platform designed for municipalities, applicants, and administrators.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="{{ route('register') }}" class="rounded-md bg-white px-6 py-3 text-sm font-semibold text-blue-600 shadow-sm hover:bg-gray-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                        <i class="fas fa-rocket mr-2"></i>Start Your Application
                    </a>
                    <a href="#features" class="text-sm font-semibold leading-6 text-blue-100 hover:text-white">
                        <i class="fas fa-info-circle mr-1"></i>Learn More <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 sm:py-32 bg-gray-50">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Everything you need for scholarship management</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">From application to disbursement, Scholar Track provides a complete solution for managing municipal scholarships efficiently.</p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <i class="fas fa-user-graduate text-blue-600 text-lg"></i>
                            For Applicants
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">Easy online applications, document uploads, real-time status tracking, and secure access to your scholarship information.</p>
                            <p class="mt-6">
                                <a href="{{ route('register') }}" class="text-sm font-semibold leading-6 text-blue-600 hover:text-blue-500">
                                    <i class="fas fa-edit mr-1"></i>Apply now <span aria-hidden="true">→</span>
                                </a>
                            </p>
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <i class="fas fa-users-cog text-blue-600 text-lg"></i>
                            For Administrators
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">Comprehensive tools for managing programs, validating applications, processing approvals, and generating reports.</p>
                            <p class="mt-6">
                                <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-blue-600 hover:text-blue-500">
                                    <i class="fas fa-sign-in-alt mr-1"></i>Admin login <span aria-hidden="true">→</span>
                                </a>
                            </p>
                        </dd>
                    </div>
                    <div class="flex flex-col">
                        <dt class="flex items-center gap-x-3 text-base font-semibold leading-7 text-gray-900">
                            <i class="fas fa-money-bill-wave text-blue-600 text-lg"></i>
                            For Finance Teams
                        </dt>
                        <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">Secure disbursement tracking, payment processing, reconciliation tools, and comprehensive audit trails.</p>
                            <p class="mt-6">
                                <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-blue-600 hover:text-blue-500">
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
    <section class="py-24 sm:py-32 bg-white">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Who uses Scholar Track?</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">Our platform serves different stakeholders in the scholarship ecosystem.</p>
            </div>
            <div class="mx-auto mt-16 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-5">
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Scholar applicants" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-user-graduate text-blue-400 text-xl"></i>
                        <h3 class="text-lg font-semibold leading-6 text-white">Scholars & Applicants</h3>
                    </div>
                    <p class="text-sm leading-6 text-gray-300">Students applying for and receiving municipal scholarships</p>
                </article>
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Staff encoders" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-users-cog text-blue-400 text-xl"></i>
                        <h3 class="text-lg font-semibold leading-6 text-white">Scholarship Staff</h3>
                    </div>
                    <p class="text-sm leading-6 text-gray-300">Administrative staff managing applications and programs</p>
                </article>
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                    <img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Review committee" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-clipboard-check text-blue-400 text-xl"></i>
                        <h3 class="text-lg font-semibold leading-6 text-white">Reviewers & Committee</h3>
                    </div>
                    <p class="text-sm leading-6 text-gray-300">Evaluation teams assessing scholarship applications</p>
                </article>
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2426&q=80" alt="Finance team" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-money-bill-wave text-blue-400 text-xl"></i>
                        <h3 class="text-lg font-semibold leading-6 text-white">Treasury & Finance</h3>
                    </div>
                    <p class="text-sm leading-6 text-gray-300">Financial teams managing disbursements and payments</p>
                </article>
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                    <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="System administrators" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-cog text-blue-400 text-xl"></i>
                        <h3 class="text-lg font-semibold leading-6 text-white">System Administrators</h3>
                    </div>
                    <p class="text-sm leading-6 text-gray-300">IT staff managing system configuration and security</p>
                </article>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-blue-600">
        <div class="px-6 py-24 sm:px-6 sm:py-32 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Ready to get started?</h2>
                <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-blue-100">Join thousands of scholars and administrators using Scholar Track to streamline scholarship management.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="{{ route('register') }}" class="rounded-md bg-white px-6 py-3 text-sm font-semibold text-blue-600 shadow-sm hover:bg-gray-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                        <i class="fas fa-user-plus mr-2"></i>Create Account
                    </a>
                    <a href="#contact" class="text-sm font-semibold leading-6 text-white hover:text-blue-100">
                        <i class="fas fa-headset mr-1"></i>Contact Support <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900" aria-labelledby="footer-heading">
        <div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8 lg:pt-32">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="space-y-8">
                    <h1 class="text-2xl font-bold text-white">Scholar Track</h1>
                    <p class="text-sm leading-6 text-gray-300">Empowering education through efficient scholarship management.</p>
                </div>
                <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold leading-6 text-white">For Applicants</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white"><i class="fas fa-file-alt mr-2"></i>How to Apply</a></li>
                                <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white"><i class="fas fa-list-check mr-2"></i>Requirements</a></li>
                                <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white"><i class="fas fa-question-circle mr-2"></i>FAQ</a></li>
                            </ul>
                        </div>
                        <div class="mt-10 md:mt-0">
                            <h3 class="text-sm font-semibold leading-6 text-white">For Staff</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white"><i class="fas fa-book mr-2"></i>Admin Guide</a></li>
                                <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white"><i class="fas fa-chart-bar mr-2"></i>Reports</a></li>
                                <li><a href="#" class="text-sm leading-6 text-gray-300 hover:text-white"><i class="fas fa-life-ring mr-2"></i>Support</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-16 border-t border-white/10 pt-8 sm:mt-20 lg:mt-24">
                <p class="text-xs leading-5 text-gray-400">&copy; 2026 Scholar Track. All rights reserved.</p>
            </div>
        </div>
    </footer>
@endsection
