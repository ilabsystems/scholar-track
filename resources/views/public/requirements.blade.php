@extends('layouts.guest')

@section('content')
{{-- ═══════════════════════════════════════════════════
     REQUIREMENTS ROADMAP (Vertical Timeline)
═══════════════════════════════════════════════════ --}}
<section id="requirements" class="py-20 px-6 lg:px-12 bg-white">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-14">
            <span class="text-blue-900 font-bold text-xs uppercase tracking-widest">Step-by-Step</span>
            <h2 class="text-3xl font-extrabold text-slate-900 mt-2">Requirement Roadmap</h2>
            <p class="text-slate-500 mt-3">Everything you need to prepare before submitting your application.</p>
        </div>

        @php
        $steps = [
            ['step'=>'01','color'=>'blue',  'bg'=>'bg-blue-900',   'light'=>'bg-slate-50',   'border'=>'border-slate-200',   'text'=>'text-blue-900',
             'title'=>'Prepare Digital Scans',
             'desc' =>'Scan or photograph the following documents clearly before starting.',
             'items'=>['PSA Birth Certificate (clear, colored preferred)','Latest Grade Slip or Transcript of Records','Barangay Certificate of Residency','Certificate of Indigency or ITR']],
            ['step'=>'02','color'=>'yellow','bg'=>'bg-yellow-500', 'light'=>'bg-yellow-50', 'border'=>'border-yellow-200', 'text'=>'text-yellow-600',
             'title'=>'Create Your Account',
             'desc' =>'Register using your active personal email address.',
             'items'=>['Use a valid, personal email (not a shared one)','Verify your email address via the confirmation link','Complete your profile with accurate details']],
            ['step'=>'03','color'=>'green', 'bg'=>'bg-emerald-500','light'=>'bg-emerald-50','border'=>'border-emerald-200','text'=>'text-emerald-600',
             'title'=>'Submit Your Application',
             'desc' =>'Fill out the online form and upload all required documents.',
             'items'=>['Complete all required fields in the application form','Upload scanned copies of required documents','Review and confirm your submission']],
            ['step'=>'04','color'=>'purple','bg'=>'bg-purple-600', 'light'=>'bg-purple-50', 'border'=>'border-purple-200', 'text'=>'text-purple-600',
             'title'=>'Municipal Board Review',
             'desc' =>'The Scholarship Board evaluates all submissions.',
             'items'=>['Review takes 15 working days after the deadline','You will be notified via email on the result','Approved scholars receive a Reference Number and grant schedule']],
        ];
        @endphp

        <div class="relative space-y-8">
            <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-slate-100 hidden sm:block"></div>

            @foreach ($steps as $s)
            <div class="flex gap-6 items-start">
                <div class="shrink-0 relative z-10">
                    <div class="{{ $s['bg'] }} text-white w-16 h-16 rounded-2xl flex items-center justify-center font-extrabold text-lg shadow-md">
                        {{ $s['step'] }}
                    </div>
                </div>
                <div class="{{ $s['light'] }} {{ $s['border'] }} border rounded-2xl p-6 flex-1">
                    <h3 class="font-extrabold text-slate-900 text-lg">{{ $s['title'] }}</h3>
                    <p class="text-slate-500 text-sm mt-1 mb-4">{{ $s['desc'] }}</p>
                    <ul class="space-y-2">
                        @foreach ($s['items'] as $item)
                        <li class="flex items-start gap-2.5 text-sm text-slate-700">
                            <i class="fa-solid fa-circle-check w-4 h-4 mt-0.5 {{ $s['text'] }} shrink-0"></i>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="inline-block bg-blue-900 text-white px-10 py-4 rounded-xl font-bold text-base hover:bg-blue-800 hover:scale-105 transition-all shadow-xl shadow-slate-200">
                    I'm Ready &mdash; Start Application
                </a>
            @endif
        </div>
    </div>
</section>
@endsection
