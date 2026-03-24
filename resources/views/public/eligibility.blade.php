@extends('layouts.guest')

@section('content')
<div x-data="eligibilityComponent()" class="py-20 px-6 lg:px-12 bg-white">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <span class="text-blue-900 font-bold text-xs uppercase tracking-widest">Pre-Screening Tool</span>
            <h2 class="text-3xl font-extrabold text-gray-900 mt-2">Can I Apply?</h2>
            <p class="text-gray-600 mt-3 max-w-xl mx-auto">Toggle each condition that applies to you. The Apply button activates when you meet all basic eligibility requirements.</p>
        </div>

        <div class="bg-gray-50 rounded-3xl p-8 border border-gray-200 space-y-5">
            <template x-for="(criterion, index) in criteria" :key="index">
                <div class="flex items-center justify-between bg-white rounded-2xl px-6 py-4 border border-gray-100 shadow-sm">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0"
                             :class="getColorClass(criterion.color)">
                            <i :class="criterion.icon" class="text-xl"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800" x-text="criterion.label"></p>
                            <p class="text-xs text-gray-500 mt-0.5" x-text="criterion.sub"></p>
                        </div>
                    </div>
                    <label class="relative inline-block w-12 h-7 shrink-0 cursor-pointer ml-4">
                        <input type="checkbox" class="sr-only" :checked="toggles[index]" @change="updateToggle(index)">
                        <div class="w-12 h-7 rounded-full relative transition-all duration-300 shadow-inner"
                             :class="toggles[index] ? 'bg-gradient-to-r from-blue-800 to-blue-900 shadow-slate-200' : 'bg-gray-300'">
                            <div class="absolute top-1 w-5 h-5 rounded-full shadow-lg transition-all duration-300 transform"
                                 :class="toggles[index] ? 'translate-x-6 bg-white shadow-slate-300' : 'translate-x-1 bg-white'">
                                <div class="w-full h-full rounded-full flex items-center justify-center"
                                     :class="toggles[index] ? 'text-blue-900' : 'text-gray-400'">
                                    <i :class="toggles[index] ? 'fas fa-check text-xs' : 'fas fa-times text-xs'" class="transition-all duration-300"></i>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </template>

            {{-- Result CTA --}}
            <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-gray-200">
                <p class="text-sm font-medium" :class="messageClass" x-text="message"></p>
                @if (Route::has('register'))
                    <a :href="ctaEnabled ? '{{ route('register') }}' : '#'"
                       class="inline-block px-8 py-3.5 rounded-xl font-bold text-sm transition-all select-none whitespace-nowrap"
                       :class="ctaClass"
                       x-text="ctaText">
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Eligibility Requirements -->
<section id="eligibility-requirements" class="py-24 sm:py-32 bg-gray-50">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Eligibility Requirements</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Check if you qualify for our municipal scholarship programs.</p>
        </div>
        <div class="mx-auto mt-16 max-w-4xl">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-800">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-map-marker-alt text-blue-900 text-xl mr-3"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Residency</h3>
                    </div>
                    <p class="text-gray-600">Must be a resident of our municipality for at least 6 months prior to application.</p>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-school text-green-500 text-xl mr-3"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Enrollment</h3>
                    </div>
                    <p class="text-gray-600">Currently enrolled in an accredited educational institution within the municipality.</p>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-chart-line text-purple-500 text-xl mr-3"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Academic Standing</h3>
                    </div>
                    <p class="text-gray-600">Minimum GPA of 2.5 or equivalent, with no failing grades in major subjects.</p>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-orange-500">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-file-alt text-orange-500 text-xl mr-3"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Documentation</h3>
                    </div>
                    <p class="text-gray-600">Complete set of required documents including certificates and identification.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Required Documents -->
<section id="documents" class="py-24 sm:py-32 bg-white">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Required Documents</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Prepare these documents before starting your application.</p>
        </div>
        <div class="mx-auto mt-16 max-w-4xl">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="flex items-start space-x-3">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">School ID</h4>
                        <p class="text-sm text-gray-600">Current school identification card</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Certificate of Enrollment</h4>
                        <p class="text-sm text-gray-600">Official enrollment certificate from your school</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Report Card/Grades</h4>
                        <p class="text-sm text-gray-600">Latest academic report card or transcript</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Barangay Certificate</h4>
                        <p class="text-sm text-gray-600">Certificate of residency from your barangay</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Certificate of Indigency</h4>
                        <p class="text-sm text-gray-600">For financial assistance applicants</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Birth Certificate</h4>
                        <p class="text-sm text-gray-600">PSA-issued birth certificate</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function eligibilityComponent() {
    return {
        criteria: [
            {key: 'resident', color: 'blue', icon: 'fas fa-map-marker-alt', label: 'I am a registered resident of Aparri, Cagayan.', sub: 'Verified by a Barangay Certificate of Residency from Aparri'},
            {key: 'gwa', color: 'yellow', icon: 'fas fa-chart-line', label: 'My General Weighted Average (GWA) is 85% or higher.', sub: 'Supported by latest Grade Slip or Transcript of Records'},
            {key: 'income', color: 'green', icon: 'fas fa-money-bill-wave', label: 'My family\'s gross annual income is below ₱200,000.', sub: 'Verified by Certificate of Indigency or ITR'},
            {key: 'enrolled', color: 'purple', icon: 'fas fa-school', label: 'I am enrolled in a CHED-accredited college or university.', sub: 'Must be currently enrolled for S.Y. 2026–2027'}
        ],
        toggles: [false, false, false, false],
        get metCount() {
            return this.toggles.filter(Boolean).length;
        },
        get totalCount() {
            return this.criteria.length;
        },
        get ctaEnabled() {
            return this.metCount === this.totalCount;
        },
        get message() {
            if (this.metCount === this.totalCount) {
                return '✅ You appear to meet all basic eligibility criteria!';
            } else {
                return `${this.metCount} of ${this.totalCount} criteria met. ${this.totalCount - this.metCount} more needed.`;
            }
        },
        get messageClass() {
            return this.ctaEnabled ? 'text-emerald-600' : 'text-gray-500';
        },
        get ctaText() {
            return 'Apply Now';
        },
        get ctaClass() {
            return this.ctaEnabled
                ? 'bg-blue-900 text-white cursor-pointer hover:bg-blue-800'
                : 'bg-gray-300 text-gray-500 cursor-not-allowed pointer-events-none';
        },
        getColorClass(color) {
            const classes = {
                blue: 'bg-blue-50 text-blue-900',
                yellow: 'bg-yellow-50 text-yellow-900',
                green: 'bg-green-50 text-green-900',
                purple: 'bg-purple-50 text-purple-900'
            };
            return classes[color] || 'bg-gray-100 text-gray-600';
        },
        updateToggle(index) {
            this.toggles[index] = !this.toggles[index];
        }
    }
}
</script>
@endsection
