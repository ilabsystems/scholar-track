@extends('public.layout')

@section('content')
    <div class="py-12">
        <div class="max-w-6xl mx-auto px-4">
            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="border-t border-gray-200 bg-blue-50 p-8 md:border-r md:border-t-0">
                        <div class="mb-6">
                            <h2 class="mb-2 text-2xl font-bold text-gray-900">Why Scholar Track?</h2>
                            <p class="text-sm text-gray-600">Keep your scholarship search organized and easier to manage.</p>
                        </div>

                        <div class="space-y-4">
                            <div class="flex gap-3">
                                <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-blue-600">
                                    <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Track All Applications</h3>
                                    <p class="text-sm text-gray-600">Keep every scholarship application in one place.</p>
                                </div>
                            </div>

                            <div class="flex gap-3">
                                <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-blue-600">
                                    <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Monitor Deadlines</h3>
                                    <p class="text-sm text-gray-600">Stay ahead of due dates with a clear timeline.</p>
                                </div>
                            </div>

                            <div class="flex gap-3">
                                <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-blue-600">
                                    <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">View Statistics</h3>
                                    <p class="text-sm text-gray-600">See progress snapshots and application trends.</p>
                                </div>
                            </div>

                            <div class="flex gap-3">
                                <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-blue-600">
                                    <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Secure & Private</h3>
                                    <p class="text-sm text-gray-600">Your information stays protected and private.</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 rounded-lg border border-gray-200 bg-white p-4">
                            <p class="mb-2 text-sm text-gray-700"><strong>Ready to get started?</strong></p>
                            <p class="text-xs text-gray-600">Create your free account and keep your scholarship applications organized.</p>
                        </div>
                    </div>

                    <div class="p-8">
                        <!-- Header -->
                        <div class="mb-8 text-center">
                            <a href="{{ route('welcome') }}" class="mb-2 block text-3xl font-bold text-blue-600 hover:text-blue-800">Scholar Track</a>
                            <p class="text-sm text-gray-600">Manage and track your scholarship applications</p>
                        </div>

                        <!-- Divider -->
                        <div class="mb-6 border-t border-gray-200"></div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="mb-4 rounded-md border border-green-200 bg-green-50 p-3 text-sm font-medium text-green-700">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="space-y-4">
                            @csrf

                            <!-- Email Address -->
                            <div>
                                <label for="email" class="mb-2 block text-sm font-semibold text-gray-700">Email</label>
                                <input id="email" class="w-full rounded-lg border border-gray-300 px-4 py-2 transition focus:border-transparent focus:ring-2 focus:ring-blue-500" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="you@example.com" />
                                @if ($errors->has('email'))
                                    <p class="mt-2 text-sm text-red-600">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="mb-2 block text-sm font-semibold text-gray-700">Password</label>
                                <input id="password" class="w-full rounded-lg border border-gray-300 px-4 py-2 transition focus:border-transparent focus:ring-2 focus:ring-blue-500"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password"
                                    placeholder="••••••••" />
                                @if ($errors->has('password'))
                                    <p class="mt-2 text-sm text-red-600">{{ $errors->first('password') }}</p>
                                @endif
                            </div>

                            <!-- Remember Me -->
                            <div class="flex items-center justify-between gap-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                                </label>
                                @if (Route::has('password.request'))
                                    <a class="text-sm font-medium text-blue-600 hover:text-blue-800" href="{{ route('password.request') }}">
                                        Forgot password?
                                    </a>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full rounded-lg bg-blue-600 px-4 py-2 font-semibold text-white transition duration-200 ease-in-out hover:bg-blue-700">
                                Log in
                            </button>
                        </form>

                        <!-- Divider -->
                        <div class="my-6 border-t border-gray-200"></div>

                        <!-- Sign Up Section -->
                        <div class="text-center">
                            <p class="mb-3 text-sm text-gray-600">Don't have an account?</p>
                            <a href="{{ route('register') }}" class="inline-block w-full rounded-lg border-2 border-blue-600 px-4 py-2 font-semibold text-blue-600 transition duration-200 hover:bg-blue-50">
                                Create Account
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
