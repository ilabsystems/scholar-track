@php
    $secondaryLabel = $secondaryLabel ?? null;
    $secondaryUrl = $secondaryUrl ?? null;
    $tips = $tips ?? [];
    $statusNote = $statusNote ?? null;
@endphp

<div class="min-h-screen bg-white">
    <div class="mx-auto flex min-h-screen max-w-6xl items-center px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="bg-blue-900 p-8 text-white sm:p-10">
                    <a href="{{ route('welcome') }}" class="inline-flex items-center rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.3em] text-blue-100 transition hover:bg-white/15">
                        Scholar Track
                    </a>

                    <p class="mt-8 text-sm font-medium uppercase tracking-[0.35em] text-blue-100">Error {{ $code }}</p>
                    <h1 class="mt-3 text-4xl font-bold tracking-tight sm:text-5xl">{{ $title }}</h1>
                    <p class="mt-4 max-w-xl text-sm leading-7 text-blue-50 sm:text-base">{{ $summary }}</p>

                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="{{ $primaryUrl }}" class="inline-flex items-center justify-center rounded-full bg-white px-5 py-3 text-sm font-semibold text-blue-900 transition hover:bg-blue-50">
                            {{ $primaryLabel }}
                        </a>

                        @if ($secondaryLabel && $secondaryUrl)
                            <a href="{{ $secondaryUrl }}" class="inline-flex items-center justify-center rounded-full border border-white/20 bg-white/10 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/15">
                                {{ $secondaryLabel }}
                            </a>
                        @endif
                    </div>

                    <div class="mt-10 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl border border-white/10 bg-white/10 p-4">
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-blue-100">Track smartly</p>
                            <p class="mt-2 text-sm text-blue-50">Return to the dashboard to review scholarship progress and deadlines.</p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/10 p-4">
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-blue-100">Need help?</p>
                            <p class="mt-2 text-sm text-blue-50">Use the navigation or try the page again after checking the address.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 sm:p-10">
                    <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-900">What happened</p>
                    <div class="mt-4 rounded-2xl border border-slate-200 bg-slate-50 p-6">
                        <p class="text-gray-700">{{ $message }}</p>
                    </div>

                    @if (! empty($tips))
                        <div class="mt-6">
                            <h2 class="text-sm font-semibold uppercase tracking-[0.2em] text-gray-500">Helpful actions</h2>

                            <div class="mt-4 space-y-3">
                                @foreach ($tips as $tip)
                                    <div class="flex gap-3 rounded-2xl border border-slate-200 bg-white p-4">
                                        <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-blue-800 text-white">
                                            <i class="fa-solid fa-check"></i>
                                        </div>

                                        <div>
                                            <p class="font-semibold text-gray-900">{{ $tip['title'] }}</p>
                                            <p class="mt-1 text-sm text-gray-600">{{ $tip['body'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if ($statusNote)
                        <div class="mt-6 rounded-2xl border border-blue-200 bg-blue-50 p-4 text-sm text-blue-900">
                            {{ $statusNote }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>