@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applicant Profile') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            {{ __('Manage your application details and personal information.') }}
        </p>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-4xl">
            @include('profile.partials.update-applicant-profile-form')
        </div>
    </div>
@endsection
