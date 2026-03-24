<nav class="border-b border-slate-200 bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}" class="text-xl font-bold text-blue-900 hover:text-blue-800">
                        Scholar Track
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center sm:gap-8">
                    <!-- Scholarships Link -->
                    <a href="{{ route('scholarships') }}" class="{{ request()->routeIs('scholarships') ? 'border-blue-800 text-blue-900' : 'border-transparent text-gray-600' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium hover:border-slate-400 hover:text-blue-900">
                        <i class="fas fa-graduation-cap mr-1"></i>Scholarships
                    </a>

                    <!-- Resources Dropdown -->
                    <div class="relative flex h-full items-center group">
                        <button type="button" class="{{ request()->routeIs('eligibility', 'requirements', 'stats') ? 'border-blue-800 text-blue-900' : 'border-transparent text-gray-600' }} hover:border-slate-400 hover:text-blue-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            <i class="fas fa-book mr-1"></i>Resources
                        </button>
                        <div class="hidden group-hover:block group-focus-within:block absolute top-full left-0 mt-1 w-48 rounded-md border border-slate-200 bg-white shadow-lg z-10">
                            <a href="{{ route('eligibility') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 first:rounded-t-md {{ request()->routeIs('eligibility') ? 'bg-blue-200 text-blue-900 font-semibold' : '' }}">
                                <i class="fas fa-list-check mr-2 w-4"></i>Eligibility
                            </a>
                            <a href="{{ route('requirements') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 {{ request()->routeIs('requirements') ? 'bg-blue-200 text-blue-900 font-semibold' : '' }}">
                                <i class="fas fa-clipboard-list mr-2 w-4"></i>Requirements
                            </a>
                            <a href="{{ route('stats') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 last:rounded-b-md {{ request()->routeIs('stats') ? 'bg-blue-200 text-blue-900 font-semibold' : '' }}">
                                <i class="fas fa-chart-bar mr-2 w-4"></i>Stats
                            </a>
                        </div>
                    </div>

                    <!-- Support Dropdown -->
                    <div class="relative flex h-full items-center group">
                        <button type="button" class="{{ request()->routeIs('faq', 'announcements', 'contact') ? 'border-blue-800 text-blue-900' : 'border-transparent text-gray-600' }} hover:border-slate-400 hover:text-blue-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            <i class="fas fa-life-ring mr-1"></i>Support
                        </button>
                        <div class="hidden group-hover:block group-focus-within:block absolute top-full left-0 mt-1 w-48 rounded-md border border-slate-200 bg-white shadow-lg z-10">
                            <a href="{{ route('faq') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 first:rounded-t-md {{ request()->routeIs('faq') ? 'bg-blue-200 text-blue-900 font-semibold' : '' }}">
                                <i class="fas fa-question-circle mr-2 w-4"></i>FAQ
                            </a>
                            <a href="{{ route('announcements') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 {{ request()->routeIs('announcements') ? 'bg-blue-200 text-blue-900 font-semibold' : '' }}">
                                <i class="fas fa-bullhorn mr-2 w-4"></i>Announcements
                            </a>
                            <a href="{{ route('contact') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 last:rounded-b-md {{ request()->routeIs('contact') ? 'bg-blue-200 text-blue-900 font-semibold' : '' }}">
                                <i class="fas fa-envelope mr-2 w-4"></i>Contact
                            </a>
                        </div>
                    </div>

                    <!-- Main Navigation Items -->
                    <a href="{{ route('track') }}" class="{{ request()->routeIs('track') ? 'border-blue-800 text-blue-900' : 'border-transparent text-gray-600' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium hover:border-slate-400 hover:text-blue-900">
                        <i class="fas fa-search mr-1"></i>Track
                    </a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'border-blue-800 text-blue-900' : 'border-transparent text-gray-600' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium hover:border-slate-400 hover:text-blue-900">
                        <i class="fas fa-info-circle mr-1"></i>About
                    </a>
                </div>
            </div>

            <!-- Desktop Auth Links -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center sm:space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-600 hover:text-blue-900">
                        <i class="fas fa-th-large mr-1"></i>Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-3 py-2 rounded-md text-sm font-medium text-gray-600 hover:text-blue-900">
                            <i class="fas fa-sign-out-alt mr-1"></i>Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-600 hover:text-blue-900">Log in</a>
                    <a href="{{ route('register') }}" class="rounded-md bg-blue-800 px-3 py-2 text-sm font-medium text-white hover:bg-blue-900">Sign up</a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex items-center sm:hidden">
                <button type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-500 hover:bg-gray-100 hover:text-blue-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-900" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <i class="fas fa-bars block text-lg"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('scholarships') }}" class="{{ request()->routeIs('scholarships') ? 'bg-blue-50 border-blue-800 text-blue-900' : 'bg-white border-transparent text-gray-600' }} block border-l-4 pl-3 pr-4 py-2 text-base font-medium hover:bg-gray-50 hover:border-slate-300 hover:text-blue-900">
                <i class="fas fa-graduation-cap mr-2"></i>Scholarships
            </a>
            <a href="{{ route('eligibility') }}" class="{{ request()->routeIs('eligibility') ? 'bg-blue-50 border-blue-800 text-blue-900' : 'bg-white border-transparent text-gray-600' }} block border-l-4 pl-3 pr-4 py-2 text-base font-medium hover:bg-gray-50 hover:border-slate-300 hover:text-blue-900">
                <i class="fas fa-list-check mr-2"></i>Eligibility
            </a>
            <a href="{{ route('requirements') }}" class="{{ request()->routeIs('requirements') ? 'bg-blue-50 border-blue-800 text-blue-900' : 'bg-white border-transparent text-gray-600' }} block border-l-4 pl-3 pr-4 py-2 text-base font-medium hover:bg-gray-50 hover:border-slate-300 hover:text-blue-900">
                <i class="fas fa-clipboard-list mr-2"></i>Requirements
            </a>
            <a href="{{ route('stats') }}" class="{{ request()->routeIs('stats') ? 'bg-blue-50 border-blue-800 text-blue-900' : 'bg-white border-transparent text-gray-600' }} block border-l-4 pl-3 pr-4 py-2 text-base font-medium hover:bg-gray-50 hover:border-slate-300 hover:text-blue-900">
                <i class="fas fa-chart-bar mr-2"></i>Stats
            </a>
            <a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'bg-blue-50 border-blue-800 text-blue-900' : 'bg-white border-transparent text-gray-600' }} block border-l-4 pl-3 pr-4 py-2 text-base font-medium hover:bg-gray-50 hover:border-slate-300 hover:text-blue-900">
                <i class="fas fa-question-circle mr-2"></i>FAQ
            </a>
            <a href="{{ route('announcements') }}" class="{{ request()->routeIs('announcements') ? 'bg-blue-50 border-blue-800 text-blue-900' : 'bg-white border-transparent text-gray-600' }} block border-l-4 pl-3 pr-4 py-2 text-base font-medium hover:bg-gray-50 hover:border-slate-300 hover:text-blue-900">
                <i class="fas fa-bullhorn mr-2"></i>Announcements
            </a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'bg-blue-50 border-blue-800 text-blue-900' : 'bg-white border-transparent text-gray-600' }} block border-l-4 pl-3 pr-4 py-2 text-base font-medium hover:bg-gray-50 hover:border-slate-300 hover:text-blue-900">
                <i class="fas fa-envelope mr-2"></i>Contact
            </a>
            <a href="{{ route('track') }}" class="{{ request()->routeIs('track') ? 'bg-blue-50 border-blue-800 text-blue-900' : 'bg-white border-transparent text-gray-600' }} block border-l-4 pl-3 pr-4 py-2 text-base font-medium hover:bg-gray-50 hover:border-slate-300 hover:text-blue-900">
                <i class="fas fa-search mr-2"></i>Track
            </a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'bg-blue-50 border-blue-800 text-blue-900' : 'bg-white border-transparent text-gray-600' }} block border-l-4 pl-3 pr-4 py-2 text-base font-medium hover:bg-gray-50 hover:border-slate-300 hover:text-blue-900">
                <i class="fas fa-info-circle mr-2"></i>About
            </a>
        </div>

        <!-- Mobile Auth Links -->
        <div class="border-t border-slate-200 pt-4 pb-3">
            <div class="flex items-center px-4 space-x-3">
                @auth
                    <a href="{{ route('dashboard') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-600 hover:text-blue-900">
                        <i class="fas fa-th-large mr-1"></i>Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="block rounded-md px-3 py-2 text-base font-medium text-gray-600 hover:text-blue-900">
                            <i class="fas fa-sign-out-alt mr-1"></i>Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-600 hover:text-blue-900">Log in</a>
                    <a href="{{ route('register') }}" class="block rounded-md bg-blue-800 px-3 py-2 text-base font-medium text-white hover:bg-blue-900">Sign up</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
