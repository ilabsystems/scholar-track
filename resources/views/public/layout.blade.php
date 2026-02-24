<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <nav class="bg-white shadow-sm border-b">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('welcome') }}" class="text-xl font-bold text-blue-600 hover:text-blue-700">
                                Scholar Track
                            </a>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500' }} hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                <i class="fas fa-info-circle mr-1"></i>About
                            </a>
                            <a href="{{ route('scholarships') }}" class="{{ request()->routeIs('scholarships') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500' }} hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                <i class="fas fa-graduation-cap mr-1"></i>Scholarships
                            </a>
                            <a href="{{ route('eligibility') }}" class="{{ request()->routeIs('eligibility') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500' }} hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                <i class="fas fa-list-check mr-1"></i>Eligibility
                            </a>
                            <a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500' }} hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                <i class="fas fa-question-circle mr-1"></i>FAQ
                            </a>
                            <a href="{{ route('announcements') }}" class="{{ request()->routeIs('announcements') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500' }} hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                <i class="fas fa-bullhorn mr-1"></i>Announcements
                            </a>
                            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500' }} hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                <i class="fas fa-envelope mr-1"></i>Contact
                            </a>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center sm:space-x-4">
                        <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Log in</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-md text-sm font-medium">Sign up</a>
                    </div>
                    <div class="flex items-center sm:hidden">
                        <button type="button" class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="sm:hidden" id="mobile-menu">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'bg-white border-transparent text-gray-500' }} hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                        <i class="fas fa-info-circle mr-2"></i>About
                    </a>
                    <a href="{{ route('scholarships') }}" class="{{ request()->routeIs('scholarships') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'bg-white border-transparent text-gray-500' }} hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                        <i class="fas fa-graduation-cap mr-2"></i>Scholarships
                    </a>
                    <a href="{{ route('eligibility') }}" class="{{ request()->routeIs('eligibility') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'bg-white border-transparent text-gray-500' }} hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                        <i class="fas fa-list-check mr-2"></i>Eligibility
                    </a>
                    <a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'bg-white border-transparent text-gray-500' }} hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                        <i class="fas fa-question-circle mr-2"></i>FAQ
                    </a>
                    <a href="{{ route('announcements') }}" class="{{ request()->routeIs('announcements') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'bg-white border-transparent text-gray-500' }} hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                        <i class="fas fa-bullhorn mr-2"></i>Announcements
                    </a>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'bg-white border-transparent text-gray-500' }} hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                        <i class="fas fa-envelope mr-2"></i>Contact
                    </a>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-200">
                    <div class="flex items-center px-4 space-x-3">
                        <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Log in</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white block px-3 py-2 rounded-md text-base font-medium">Sign up</a>
                    </div>
                </div>
            </div>
        </nav>
        <main>
            <div class="min-h-screen bg-gray-50">
                @yield('content')
            </div>
        </main>
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
    </body>
</html>
