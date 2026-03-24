<nav class="bg-white shadow-sm border-b">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}" class="text-xl font-bold text-blue-600 hover:text-blue-700">
                        Scholar Track
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center sm:gap-8">
                    <!-- Resources Dropdown -->
                    <div class="relative flex h-full items-center group">
                        <button type="button" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            <i class="fas fa-book mr-1"></i>Resources
                        </button>
                        <div class="hidden group-hover:block group-focus-within:block absolute top-full left-0 mt-1 w-48 bg-white rounded-md shadow-lg z-10 border border-gray-200">
                            <a href="{{ route('scholarships') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 first:rounded-t-md {{ request()->routeIs('scholarships') ? 'bg-blue-50 text-blue-600' : '' }}">
                                <i class="fas fa-graduation-cap mr-2 w-4"></i>Scholarships
                            </a>
                            <a href="{{ route('eligibility') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ request()->routeIs('eligibility') ? 'bg-blue-50 text-blue-600' : '' }}">
                                <i class="fas fa-list-check mr-2 w-4"></i>Eligibility
                            </a>
                            <a href="{{ route('requirements') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ request()->routeIs('requirements') ? 'bg-blue-50 text-blue-600' : '' }}">
                                <i class="fas fa-clipboard-list mr-2 w-4"></i>Requirements
                            </a>
                            <a href="{{ route('stats') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 last:rounded-b-md {{ request()->routeIs('stats') ? 'bg-blue-50 text-blue-600' : '' }}">
                                <i class="fas fa-chart-bar mr-2 w-4"></i>Stats
                            </a>
                        </div>
                    </div>

                    <!-- Support Dropdown -->
                    <div class="relative flex h-full items-center group">
                        <button type="button" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            <i class="fas fa-life-ring mr-1"></i>Support
                        </button>
                        <div class="hidden group-hover:block group-focus-within:block absolute top-full left-0 mt-1 w-48 bg-white rounded-md shadow-lg z-10 border border-gray-200">
                            <a href="{{ route('faq') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 first:rounded-t-md {{ request()->routeIs('faq') ? 'bg-blue-50 text-blue-600' : '' }}">
                                <i class="fas fa-question-circle mr-2 w-4"></i>FAQ
                            </a>
                            <a href="{{ route('announcements') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ request()->routeIs('announcements') ? 'bg-blue-50 text-blue-600' : '' }}">
                                <i class="fas fa-bullhorn mr-2 w-4"></i>Announcements
                            </a>
                            <a href="{{ route('contact') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 last:rounded-b-md {{ request()->routeIs('contact') ? 'bg-blue-50 text-blue-600' : '' }}">
                                <i class="fas fa-envelope mr-2 w-4"></i>Contact
                            </a>
                        </div>
                    </div>

                    <!-- Main Navigation Items -->
                    <a href="{{ route('track') }}" class="{{ request()->routeIs('track') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium hover:border-gray-300 hover:text-gray-700">
                        <i class="fas fa-search mr-1"></i>Track
                    </a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium hover:border-gray-300 hover:text-gray-700">
                        <i class="fas fa-info-circle mr-1"></i>About
                    </a>
                </div>
            </div>

            <!-- Desktop Auth Links -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center sm:space-x-4">
                <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Log in</a>
                <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-md text-sm font-medium">Sign up</a>
            </div>

            <!-- Mobile Menu Button -->
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

    <!-- Mobile Menu -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('scholarships') }}" class="{{ request()->routeIs('scholarships') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'bg-white border-transparent text-gray-500' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                <i class="fas fa-graduation-cap mr-2"></i>Scholarships
            </a>
            <a href="{{ route('eligibility') }}" class="{{ request()->routeIs('eligibility') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'bg-white border-transparent text-gray-500' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                <i class="fas fa-list-check mr-2"></i>Eligibility
            </a>
            <a href="{{ route('requirements') }}" class="{{ request()->routeIs('requirements') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'bg-white border-transparent text-gray-500' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                <i class="fas fa-clipboard-list mr-2"></i>Requirements
            </a>
            <a href="{{ route('stats') }}" class="{{ request()->routeIs('stats') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'bg-white border-transparent text-gray-500' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                <i class="fas fa-chart-bar mr-2"></i>Stats
            </a>
            <a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'bg-white border-transparent text-gray-500' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                <i class="fas fa-question-circle mr-2"></i>FAQ
            </a>
            <a href="{{ route('announcements') }}" class="{{ request()->routeIs('announcements') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'bg-white border-transparent text-gray-500' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                <i class="fas fa-bullhorn mr-2"></i>Announcements
            </a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'bg-white border-transparent text-gray-500' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                <i class="fas fa-envelope mr-2"></i>Contact
            </a>
            <a href="{{ route('track') }}" class="{{ request()->routeIs('track') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'bg-white border-transparent text-gray-500' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                <i class="fas fa-search mr-2"></i>Track
            </a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'bg-blue-50 border-blue-500 text-blue-700' : 'bg-white border-transparent text-gray-500' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700">
                <i class="fas fa-info-circle mr-2"></i>About
            </a>
        </div>

        <!-- Mobile Auth Links -->
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4 space-x-3">
                <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Log in</a>
                <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white block px-3 py-2 rounded-md text-base font-medium">Sign up</a>
            </div>
        </div>
    </div>
</nav>
