@extends('public.layout')

@section('content')
    <div class="py-12">
        <div class="max-w-md mx-auto bg-blue-50 p-6 rounded-lg shadow-md border border-blue-200">
            <div class="text-center mb-6">
                <a href="{{ route('welcome') }}" class="text-2xl font-bold text-blue-600 hover:text-blue-800">Scholar Track</a>
            </div>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div>
                    <label for="password" class="block font-medium text-sm text-gray-700">{{ __('Password') }}</label>

                    <input id="password" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    @if($errors->has('password'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="flex justify-end mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Confirm') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
