@extends('admin.layout')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Settings</h1>
        <p class="mt-1 text-sm text-gray-500">Configure system preferences and application settings.</p>
    </div>

    @if(session('status') === 'password-updated')
        <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-md flex items-center gap-2 text-sm">
            <i class="fas fa-check-circle"></i> Password updated successfully.
        </div>
    @endif
    @if(session('status') === 'notifications-updated')
        <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-800 rounded-md flex items-center gap-2 text-sm">
            <i class="fas fa-check-circle"></i> Notification preferences saved.
        </div>
    @endif

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        {{-- Sidebar nav --}}
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <nav class="divide-y divide-gray-100" id="settings-nav">
                    <a href="#general" class="settings-tab flex items-center gap-3 px-4 py-3 text-sm font-medium text-slate-900 bg-slate-50 border-l-4 border-slate-900" data-section="general">
                        <i class="fas fa-sliders-h w-4 text-center text-slate-600"></i> General
                    </a>
                    <a href="#account" class="settings-tab flex items-center gap-3 px-4 py-3 text-sm text-gray-600 hover:bg-gray-50 border-l-4 border-transparent" data-section="account">
                        <i class="fas fa-user w-4 text-center text-gray-400"></i> Account
                    </a>
                    <a href="#notifications" class="settings-tab flex items-center gap-3 px-4 py-3 text-sm text-gray-600 hover:bg-gray-50 border-l-4 border-transparent" data-section="notifications">
                        <i class="fas fa-bell w-4 text-center text-gray-400"></i> Notifications
                    </a>
                    <a href="#security" class="settings-tab flex items-center gap-3 px-4 py-3 text-sm text-gray-600 hover:bg-gray-50 border-l-4 border-transparent" data-section="security">
                        <i class="fas fa-shield-alt w-4 text-center text-gray-400"></i> Security
                    </a>
                </nav>
            </div>
        </div>

        {{-- Content panels --}}
        <div class="lg:col-span-2 flex flex-col gap-6">

            {{-- General --}}
            <div id="general" class="settings-section bg-white rounded-lg shadow p-6">
                <h2 class="text-base font-semibold text-gray-800 mb-4">General</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Application Name</label>
                        <input type="text" value="{{ config('app.name') }}" disabled
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm bg-gray-50 text-gray-500 cursor-not-allowed">
                        <p class="mt-1 text-xs text-gray-400">Managed via <code>.env</code> (APP_NAME).</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Environment</label>
                        <input type="text" value="{{ app()->environment() }}" disabled
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm bg-gray-50 text-gray-500 cursor-not-allowed">
                    </div>
                </div>
            </div>

            {{-- Account --}}
            <div id="account" class="settings-section bg-white rounded-lg shadow p-6">
                <h2 class="text-base font-semibold text-gray-800 mb-4">Account</h2>
                <div class="flex items-center gap-4 mb-4">
                    <div class="h-14 w-14 rounded-full bg-slate-700 flex items-center justify-center text-white text-xl font-medium shrink-0">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">{{ $user->name }}</p>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    </div>
                </div>
                <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-50">
                    <i class="fas fa-edit mr-2"></i> Edit Profile
                </a>
            </div>

            {{-- Notifications --}}
            <div id="notifications" class="settings-section bg-white rounded-lg shadow p-6">
                <h2 class="text-base font-semibold text-gray-800 mb-1">Notifications</h2>
                <p class="text-sm text-gray-500 mb-5">Choose which events trigger email notifications.</p>

                @php
                    $prefs = $user->notification_preferences ?? [];
                @endphp

                <form method="POST" action="{{ route('admin.settings.update-notifications') }}">
                    @csrf
                    @method('PATCH')

                    <div class="divide-y divide-gray-100">
                        @foreach([
                            'new_application'         => ['New Application Submitted',   'Notify when a new application is submitted by an applicant.'],
                            'application_status_change' => ['Application Status Change', 'Notify when an application is approved, rejected, or set to pending.'],
                            'new_scholar'             => ['New Scholar Activated',         'Notify when an applicant is confirmed as an active scholar.'],
                            'scholar_non_compliance'  => ['Scholar Non-Compliance Flag',   'Notify when a scholar is flagged as at-risk or non-compliant.'],
                            'scholarship_deadline'    => ['Scholarship Deadline Reminder', 'Notify 7 days before a scholarship deadline.'],
                        ] as $key => [$label, $description])
                            <div class="flex items-center justify-between py-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-800">{{ $label }}</p>
                                    <p class="text-xs text-gray-500 mt-0.5">{{ $description }}</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer ml-4 shrink-0">
                                    <input type="checkbox" name="{{ $key }}" value="1" class="sr-only peer"
                                        {{ ($prefs[$key] ?? false) ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer
                                        peer-checked:bg-slate-700
                                        after:content-[''] after:absolute after:top-[2px] after:left-[2px]
                                        after:bg-white after:rounded-full after:h-5 after:w-5
                                        after:transition-all peer-checked:after:translate-x-5"></div>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="px-4 py-2 bg-slate-900 text-white text-sm font-medium rounded-md hover:bg-slate-700">
                            Save Preferences
                        </button>
                    </div>
                </form>
            </div>

            {{-- Security --}}
            <div id="security" class="settings-section bg-white rounded-lg shadow p-6">
                <h2 class="text-base font-semibold text-gray-800 mb-1">Security</h2>
                <p class="text-sm text-gray-500 mb-5">Manage your password and active sessions.</p>

                {{-- Change Password --}}
                <h3 class="text-sm font-semibold text-gray-700 mb-3">Change Password</h3>
                <form method="POST" action="{{ route('admin.settings.update-password') }}" class="space-y-4 mb-8">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                        <input type="password" id="current_password" name="current_password" autocomplete="current-password"
                            class="w-full border @error('current_password') border-red-400 @else border-gray-300 @enderror rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-slate-500">
                        @error('current_password')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                        <input type="password" id="password" name="password" autocomplete="new-password"
                            class="w-full border @error('password') border-red-400 @else border-gray-300 @enderror rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-slate-500">
                        @error('password')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-slate-500">
                    </div>

                    <div>
                        <button type="submit" class="px-4 py-2 bg-slate-900 text-white text-sm font-medium rounded-md hover:bg-slate-700">
                            Update Password
                        </button>
                    </div>
                </form>

                {{-- Active Sessions --}}
                <h3 class="text-sm font-semibold text-gray-700 mb-3">Active Sessions</h3>
                <div class="space-y-3">
                    @forelse($sessions as $session)
                        <div class="flex items-center justify-between p-3 border border-gray-200 rounded-md text-sm">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-desktop text-gray-400"></i>
                                <div>
                                    <p class="font-medium text-gray-800 text-xs truncate max-w-xs">
                                        {{ $session->ip_address ?? 'Unknown IP' }}
                                    </p>
                                    <p class="text-xs text-gray-400 truncate max-w-xs">
                                        {{ Str::limit($session->user_agent, 60) }}
                                    </p>
                                </div>
                            </div>
                            <span class="text-xs text-gray-400 shrink-0 ml-2">
                                {{ $session->last_activity_at->diffForHumans() }}
                            </span>
                        </div>
                    @empty
                        <p class="text-sm text-gray-400">No active sessions found.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
@endsection
