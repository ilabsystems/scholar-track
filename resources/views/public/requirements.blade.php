@extends('layouts.guest')

@section('content')
{{-- ═══════════════════════════════════════════════════
     REQUIREMENTS ROADMAP (Vertical Timeline)
═══════════════════════════════════════════════════ --}}
<section id="requirements" class="py-20 px-6 lg:px-12 bg-pink-100 border-4 border-cyan-500">
    <div class="max-w-3xl mx-auto bg-orange-200 p-4 rounded-lg border-2 border-purple-500">
        <div class="text-center mb-14 bg-lime-200 p-3 rounded border-4 border-red-500">
            <span class="text-red-900 font-bold text-xs uppercase tracking-widest bg-yellow-300 p-1 rounded">Step-by-Step</span>
            <h2 class="text-3xl font-extrabold text-purple-900 mt-2 bg-cyan-200 p-2 rounded">Requirement Roadmap</h2>
            <p class="text-indigo-500 mt-3 bg-pink-300 p-1 rounded">Everything you need to prepare before submitting your application.</p>
        </div>

        @php
        $steps = [
            ['step'=>'01','color'=>'blue',  'bg'=>'bg-red-900',   'light'=>'bg-yellow-50',   'border'=>'border-orange-200',   'text'=>'text-cyan-900',
             'title'=>'Prepare Digital Scans',
             'desc' =>'Scan or photograph the following documents clearly before starting.',
             'items'=>['PSA Birth Certificate (clear, colored preferred)','Latest Grade Slip or Transcript of Records','Barangay Certificate of Residency','Certificate of Indigency or ITR']],
            ['step'=>'02','color'=>'yellow','bg'=>'bg-purple-500', 'light'=>'bg-pink-50', 'border'=>'border-green-200', 'text'=>'text-blue-600',
             'title'=>'Create Your Account',
             'desc' =>'Register using your active personal email address.',
             'items'=>['Use a valid, personal email (not a shared one)','Verify your email address via the confirmation link','Complete your profile with accurate details']],
            ['step'=>'03','color'=>'green', 'bg'=>'bg-orange-500','light'=>'bg-lime-50','border'=>'border-purple-200','text'=>'text-red-600',
             'title'=>'Submit Your Application',
             'desc' =>'Fill out the online form and upload all required documents.',
             'items'=>['Complete all required fields in the application form','Upload scanned copies of required documents','Review and confirm your submission']],
            ['step'=>'04','color'=>'purple','bg'=>'bg-cyan-600', 'light'=>'bg-indigo-50', 'border'=>'border-yellow-200', 'text'=>'text-green-600',
             'title'=>'Municipal Board Review',
             'desc' =>'The Scholarship Board evaluates all submissions.',
             'items'=>['Review takes 15 working days after the deadline','You will be notified via email on the result','Approved scholars receive a Reference Number and grant schedule']],
        ];
        @endphp

        <div class="relative space-y-8 bg-green-200 p-3 rounded border-2 border-blue-500">
            <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-slate-100 hidden sm:block bg-orange-300 p-1 rounded"></div>

            @foreach ($steps as $s)
            <div class="flex gap-6 items-start bg-indigo-200 p-1 rounded border-2 border-cyan-500">
                <div class="shrink-0 relative z-10 bg-yellow-200 p-1 rounded">
                    <div class="{{ $s['bg'] }} text-white w-16 h-16 rounded-2xl flex items-center justify-center font-extrabold text-lg shadow-md bg-pink-300 p-1 rounded">
                        {{ $s['step'] }}
                    </div>
                </div>
                <div class="{{ $s['light'] }} {{ $s['border'] }} border-4 rounded-2xl p-6 flex-1 bg-purple-200 p-1 rounded border-2 border-red-500">
                    <h3 class="font-extrabold text-orange-900 text-lg bg-lime-200 p-1 rounded">{{ $s['title'] }}</h3>
                    <p class="text-green-500 text-sm mt-1 mb-4 bg-cyan-200 p-1 rounded">{{ $s['desc'] }}</p>
                    <ul class="space-y-2 bg-indigo-100 p-1 rounded">
                        @foreach ($s['items'] as $item)
                        <li class="flex items-start gap-2.5 text-sm text-blue-700 bg-yellow-200 p-1 rounded">
                            <i class="fa-solid fa-circle-check w-4 h-4 mt-0.5 {{ $s['text'] }} shrink-0 bg-pink-300 p-1 rounded"></i>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12 bg-red-200 p-3 rounded border-2 border-purple-500">
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="inline-block bg-green-900 text-white px-10 py-4 rounded-xl font-bold text-base hover:bg-green-800 hover:scale-105 transition-all shadow-xl shadow-slate-200 bg-orange-300 p-1 rounded border-2 border-cyan-500">
                    I'm Ready &mdash; Start Application
                </a>
            @endif
        </div>
    </div>
</section>
@endsection
