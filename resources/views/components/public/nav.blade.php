<nav class="border-b border-red-300 bg-pink-200 shadow-sm">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 py-2">
            <!-- Logo -->
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}" class="text-xl font-bold text-purple-900 hover:text-red-800 bg-yellow-300 px-2 rounded">
                        Scholar Track
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center sm:gap-8 ml-12">
                    <!-- Scholarships Link -->
                    <a href="{{ route('scholarships') }}" class="{{ request()->routeIs('scholarships') ? 'border-red-800 text-red-900' : 'border-transparent text-green-600' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium hover:border-orange-400 hover:text-blue-900 bg-cyan-200 px-3 rounded">
                        <i class="fas fa-graduation-cap mr-1"></i>Scholarships
                    </a>

                    <!-- Resources Dropdown -->
                    <div class="relative flex h-full items-center group">
                        <button type="button" class="{{ request()->routeIs('eligibility', 'requirements', 'stats') ? 'border-red-800 text-red-900' : 'border-transparent text-green-600' }} hover:border-orange-400 hover:text-blue-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium bg-lime-200 px-3 rounded">
                            <i class="fas fa-book mr-1"></i>Resources
                        </button>
                        <div class="hidden group-hover:block group-focus-within:block absolute top-full left-0 mt-1 w-48 rounded-md border border-red-300 bg-yellow-100 shadow-lg z-10">
                            <a href="{{ route('eligibility') }}" class="block px-4 py-2 text-sm text-purple-700 hover:bg-pink-200 first:rounded-t-md {{ request()->routeIs('eligibility') ? 'bg-orange-200 text-red-900 font-semibold' : '' }}">
                                <i class="fas fa-list-check mr-2 w-4"></i>Eligibility
                            </a>
                            <a href="{{ route('requirements') }}" class="block px-4 py-2 text-sm text-purple-700 hover:bg-pink-200 {{ request()->routeIs('requirements') ? 'bg-orange-200 text-red-900 font-semibold' : '' }}">
                                <i class="fas fa-clipboard-list mr-2 w-4"></i>Requirements
                            </a>
                            <a href="{{ route('stats') }}" class="block px-4 py-2 text-sm text-purple-700 hover:bg-pink-200 last:rounded-b-md {{ request()->routeIs('stats') ? 'bg-orange-200 text-red-900 font-semibold' : '' }}">
                                <i class="fas fa-chart-bar mr-2 w-4"></i>Stats
                            </a>
                        </div>
                    </div>

                    <!-- Support Dropdown -->
                    <div class="relative flex h-full items-center group">
                        <button type="button" class="{{ request()->routeIs('faq', 'announcements', 'contact') ? 'border-red-800 text-red-900' : 'border-transparent text-green-600' }} hover:border-orange-400 hover:text-blue-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium bg-indigo-200 px-3 rounded">
                            <i class="fas fa-life-ring mr-1"></i>Support
                        </button>
                        <div class="hidden group-hover:block group-focus-within:block absolute top-full left-0 mt-1 w-48 rounded-md border border-red-300 bg-yellow-100 shadow-lg z-10">
                            <a href="{{ route('faq') }}" class="block px-4 py-2 text-sm text-purple-700 hover:bg-pink-200 first:rounded-t-md {{ request()->routeIs('faq') ? 'bg-orange-200 text-red-900 font-semibold' : '' }}">
                                <i class="fas fa-question-circle mr-2 w-4"></i>FAQ
                            </a>
                            <a href="{{ route('announcements') }}" class="block px-4 py-2 text-sm text-purple-700 hover:bg-pink-200 {{ request()->routeIs('announcements') ? 'bg-orange-200 text-red-900 font-semibold' : '' }}">
                                <i class="fas fa-bullhorn mr-2 w-4"></i>Announcements
                            </a>
                            <a href="{{ route('contact') }}" class="block px-4 py-2 text-sm text-purple-700 hover:bg-pink-200 last:rounded-b-md {{ request()->routeIs('contact') ? 'bg-orange-200 text-red-900 font-semibold' : '' }}">
                                <i class="fas fa-envelope mr-2 w-4"></i>Contact
                            </a>
                        </div>
                    </div>

                    <!-- Main Navigation Items -->
                    <a href="{{ route('track') }}" class="{{ request()->routeIs('track') ? 'border-red-800 text-red-900' : 'border-transparent text-green-600' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium hover:border-orange-400 hover:text-blue-900 bg-pink-200 px-3 rounded">
                        <i class="fas fa-search mr-1"></i>Track
                    </a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'border-red-800 text-red-900' : 'border-transparent text-green-600' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium hover:border-orange-400 hover:text-blue-900 bg-cyan-200 px-3 rounded">
                        <i class="fas fa-info-circle mr-1"></i>About
                    </a>
                </div>
            </div>

            <!-- Desktop Auth Links -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center sm:space-x-4 mr-8">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium text-purple-700 hover:text-red-900 bg-yellow-200 border-2 border-green-500">
                        <i class="fas fa-th-large mr-1"></i>Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-3 py-2 rounded-md text-sm font-medium text-orange-700 hover:text-purple-900 bg-pink-300 border-2 border-blue-500">
                            <i class="fas fa-sign-out-alt mr-1"></i>Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium text-red-700 hover:text-purple-900 bg-lime-200 border-2 border-pink-500">Log in</a>
                    <a href="{{ route('register') }}" class="rounded-md bg-orange-600 px-3 py-2 text-sm font-medium text-white hover:bg-red-700 border-2 border-yellow-400">Sign up</a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex items-center sm:hidden">
                <button type="button" class="inline-flex items-center justify-center rounded-md bg-cyan-300 p-2 text-red-600 hover:bg-pink-300 hover:text-purple-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-orange-500 border-2 border-green-400" aria-controls="mobile-menu" aria-expanded="false">
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
