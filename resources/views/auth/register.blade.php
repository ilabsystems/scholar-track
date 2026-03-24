@extends('public.layout')

@section('content')
    <div class="py-12">
        <div class="max-w-6xl mx-auto px-4">
            <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="border-t border-slate-200 bg-slate-50 p-8 md:border-r md:border-t-0">
                        <div class="mb-6">
                            <h2 class="mb-2 text-2xl font-bold text-blue-900">Why create an account?</h2>
                            <p class="text-sm text-gray-600">Register once and keep your scholarship activity organized in one place.</p>
                        </div>

                        <div class="space-y-4">
                            <div class="flex gap-3">
                                <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-blue-600">
                                    <i class="fa-solid fa-circle-check text-xs text-white"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Save your details</h3>
                                    <p class="text-sm text-gray-600">Store your profile once and reuse it across future applications.</p>
                                </div>
                            </div>

                            <div class="flex gap-3">
                                <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-blue-600">
                                    <i class="fa-solid fa-circle-check text-xs text-white"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Track progress</h3>
                                    <p class="text-sm text-gray-600">Monitor submitted, pending, and completed scholarship applications.</p>
                                </div>
                            </div>

                            <div class="flex gap-3">
                                <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-blue-600">
                                    <i class="fa-solid fa-circle-check text-xs text-white"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Stay organized</h3>
                                    <p class="text-sm text-gray-600">Keep deadlines, requirements, and updates in one dashboard.</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 rounded-lg border border-slate-200 bg-white p-4">
                            <p class="mb-2 text-sm text-gray-700"><strong>Already have an account?</strong></p>
                            <p class="text-xs text-gray-600">Sign in to continue tracking your applications and checking your status.</p>
                        </div>
                    </div>

                    <div class="bg-white p-8">
                        <div class="text-center mb-6">
                            <a href="{{ route('welcome') }}" class="text-2xl font-bold text-blue-900 hover:text-blue-800">Scholar Track</a>
                        </div>

                        <form method="POST" action="{{ route('register') }}" class="space-y-4">
                            @csrf

                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input id="name" class="mt-1 block w-full rounded-md border-gray-300 bg-white text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-blue-800 focus:ring-blue-800" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                                @if ($errors->has('name'))
                                    <p class="mt-2 text-sm text-red-600">{{ $errors->first('name') }}</p>
                                @endif
                            </div>

                            <!-- Email Address -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input id="email" class="mt-1 block w-full rounded-md border-gray-300 bg-white text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-blue-800 focus:ring-blue-800" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                                @if ($errors->has('email'))
                                    <p class="mt-2 text-sm text-red-600">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input id="password" class="mt-1 block w-full rounded-md border-gray-300 bg-white text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-blue-800 focus:ring-blue-800"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                                @if ($errors->has('password'))
                                    <p class="mt-2 text-sm text-red-600">{{ $errors->first('password') }}</p>
                                @endif
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                <input id="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 bg-white text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-blue-800 focus:ring-blue-800"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                                @if ($errors->has('password_confirmation'))
                                    <p class="mt-2 text-sm text-red-600">{{ $errors->first('password_confirmation') }}</p>
                                @endif
                            </div>

                            <div class="flex items-center justify-between gap-4 pt-2">
                                <a class="rounded-md text-sm text-gray-600 underline hover:text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-800 focus:ring-offset-2 focus:ring-offset-white" href="{{ route('login') }}">
                                    Already registered?
                                </a>

                                <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-blue-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-blue-900 focus:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-800 focus:ring-offset-2 focus:ring-offset-white active:bg-blue-950">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
