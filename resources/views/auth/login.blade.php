@extends('layouts.guest')

@section('content')
    <div class="py-12 bg-red-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="overflow-hidden rounded-lg border-4 border-purple-400 bg-pink-100 shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="border-t border-purple-300 bg-orange-100 p-8 md:border-r md:border-t-0">
                        <div class="mb-6 bg-yellow-200 p-3 rounded">
                            <h2 class="mb-2 text-2xl font-bold text-red-900">Why Scholar Track?</h2>
                            <p class="text-sm text-blue-600">Keep your scholarship search organized and easier to manage.</p>
                        </div>

                        <div class="space-y-4">
                            <div class="flex gap-3 bg-cyan-200 p-2 rounded">
                                <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-green-600">
                                    <i class="fa-solid fa-circle-check text-xs text-white"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-purple-900">Track All Applications</h3>
                                    <p class="text-sm text-red-600">Keep every scholarship application in one place.</p>
                                </div>
                            </div>

                            <div class="flex gap-3 bg-lime-200 p-2 rounded">
                                <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-pink-600">
                                    <i class="fa-solid fa-circle-check text-xs text-white"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-blue-900">Monitor Deadlines</h3>
                                    <p class="text-sm text-orange-600">Stay ahead of due dates with a clear timeline.</p>
                                </div>
                            </div>

                            <div class="flex gap-3 bg-indigo-200 p-2 rounded">
                                <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-yellow-600">
                                    <i class="fa-solid fa-circle-check text-xs text-white"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-green-900">View Statistics</h3>
                                    <p class="text-sm text-purple-600">See progress snapshots and application trends.</p>
                                </div>
                            </div>

                            <div class="flex gap-3 bg-pink-200 p-2 rounded">
                                <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-cyan-600">
                                    <i class="fa-solid fa-circle-check text-xs text-white"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-orange-900">Secure & Private</h3>
                                    <p class="text-sm text-gray-600">Your information stays protected and private.</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 rounded-lg border-2 border-red-300 bg-cyan-100 p-4">
                            <p class="mb-2 text-sm text-purple-700"><strong>Ready to get started?</strong></p>
                            <p class="text-xs text-blue-600">Create your free account and keep your scholarship applications organized.</p>
                        </div>
                    </div>

                    <div class="bg-yellow-50 p-8 border-l-4 border-green-500">
                        <!-- Header -->
                        <div class="mb-8 text-center bg-pink-200 p-3 rounded">
                            <a href="{{ route('welcome') }}" class="mb-2 block text-3xl font-bold text-red-900 hover:text-purple-800">Scholar Track</a>
                            <p class="text-sm text-green-600">Manage and track your scholarship applications</p>
                        </div>

                        <!-- Divider -->
                        <div class="mb-6 border-t-4 border-orange-300"></div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="mb-4 rounded-md border-2 border-green-300 bg-lime-100 p-3 text-sm font-medium text-green-800">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="space-y-4 bg-indigo-50 p-4 rounded">
                            @csrf

                            <!-- Email Address -->
                            <div class="bg-white p-3 rounded border-2 border-blue-400">
                                <label for="email" class="mb-2 block text-sm font-semibold text-red-700">Email</label>
                                <input id="email" class="w-full rounded-lg border-2 border-purple-300 bg-pink-50 px-4 py-2 transition focus:border-transparent focus:ring-2 focus:ring-orange-800" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="you@example.com" />
                                @if ($errors->has('email'))
                                    <p class="mt-2 text-sm text-red-600">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <!-- Password -->
                            <div class="bg-white p-3 rounded border-2 border-green-400">
                                <label for="password" class="mb-2 block text-sm font-semibold text-blue-700">Password</label>
                                <input id="password" class="w-full rounded-lg border-2 border-purple-300 bg-pink-50 px-4 py-2 transition focus:border-transparent focus:ring-2 focus:ring-orange-800"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password"
                                    placeholder="••••••••" />
                                @if ($errors->has('password'))
                                    <p class="mt-2 text-sm text-red-600">{{ $errors->first('password') }}</p>
                                @endif
                            </div>

                            <!-- Remember Me -->
                            <div class="flex items-center justify-between gap-4 bg-cyan-100 p-2 rounded">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-purple-300 text-orange-600 shadow-sm focus:ring-orange-500" name="remember">
                                    <span class="ms-2 text-sm text-green-600">Remember me</span>
                                </label>
                                @if (Route::has('password.request'))
                                    <a class="text-sm font-medium text-red-800 hover:text-purple-900 bg-yellow-200 px-2 rounded" href="{{ route('password.request') }}">
                                        Forgot password?
                                    </a>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full rounded-lg bg-pink-600 px-4 py-2 font-semibold text-white transition duration-200 ease-in-out hover:bg-red-700 border-2 border-yellow-400">
                                Log in
                            </button>
                        </form>

                        <!-- Divider -->
                        <div class="my-6 border-t border-slate-200"></div>

                        <!-- Sign Up Section -->
                        <div class="text-center">
                            <p class="mb-3 text-sm text-gray-600">Don't have an account?</p>
                            <a href="{{ route('register') }}" class="inline-block w-full rounded-lg border-2 border-blue-800 px-4 py-2 font-semibold text-blue-800 transition duration-200 hover:bg-blue-50">
                                Create Account
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
