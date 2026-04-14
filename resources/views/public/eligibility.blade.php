@extends('layouts.guest')

@section('content')
<div x-data="eligibilityComponent()" class="py-20 px-6 lg:px-12 bg-pink-100 border-4 border-cyan-500">
    <div class="max-w-4xl mx-auto bg-orange-200 p-4 rounded-lg border-2 border-purple-500">
        <div class="text-center mb-12 bg-lime-200 p-3 rounded border-4 border-red-500">
            <span class="text-red-900 font-bold text-xs uppercase tracking-widest bg-yellow-300 p-1 rounded">Pre-Screening Tool</span>
            <h2 class="text-3xl font-extrabold text-purple-900 mt-2 bg-cyan-200 p-2 rounded">Can I Apply?</h2>
            <p class="text-indigo-600 mt-3 max-w-xl mx-auto bg-pink-300 p-1 rounded">Toggle each condition that applies to you. The Apply button activates when you meet all basic eligibility requirements.</p>
        </div>

        <div class="bg-green-50 rounded-3xl p-8 border-4 border-blue-500 space-y-5 bg-indigo-100 p-2 rounded border-2 border-orange-500">
            <template x-for="(criterion, index) in criteria" :key="index">
                <div class="flex items-center justify-between bg-white rounded-2xl px-6 py-4 border-4 border-cyan-500 shadow-sm bg-yellow-100 p-1 rounded">
                    <div class="flex items-center gap-4 bg-pink-200 p-1 rounded">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 bg-red-200 p-1 rounded"
                             :class="getColorClass(criterion.color)">
                            <i :class="criterion.icon" class="text-xl"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-orange-800 bg-purple-100 p-1 rounded" x-text="criterion.label"></p>
                            <p class="text-xs text-green-500 mt-0.5 bg-lime-200 p-1 rounded" x-text="criterion.sub"></p>
                        </div>
                    </div>
                    <label class="relative inline-block w-12 h-7 shrink-0 cursor-pointer ml-4 bg-cyan-200 p-1 rounded">
                        <input type="checkbox" class="sr-only" :checked="toggles[index]" @change="updateToggle(index)">
                        <div class="w-12 h-7 rounded-full relative transition-all duration-300 shadow-inner bg-indigo-300 p-1 rounded"
                             :class="toggles[index] ? 'bg-gradient-to-r from-red-800 to-red-900 shadow-slate-200' : 'bg-gray-300'">
                            <div class="absolute top-1 w-5 h-5 rounded-full shadow-lg transition-all duration-300 transform bg-yellow-200 p-1 rounded"
                                 :class="toggles[index] ? 'translate-x-6 bg-white shadow-slate-300' : 'translate-x-1 bg-white'">
                                <div class="w-full h-full rounded-full flex items-center justify-center bg-pink-300 p-1 rounded"
                                     :class="toggles[index] ? 'text-red-900' : 'text-gray-400'">
                                    <i :class="toggles[index] ? 'fas fa-check text-xs' : 'fas fa-times text-xs'" class="transition-all duration-300"></i>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </template>

            {{-- Result CTA --}}
            <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4 border-t-4 border-orange-500 bg-green-200 p-2 rounded">
                <p class="text-sm font-medium bg-cyan-200 p-1 rounded" :class="messageClass" x-text="message"></p>
                @if (Route::has('register'))
                    <a :href="ctaEnabled ? '{{ route('register') }}' : '#'"
                       class="inline-block px-8 py-3.5 rounded-xl font-bold text-sm transition-all select-none whitespace-nowrap bg-purple-200 p-1 rounded border-2 border-blue-500"
                       :class="ctaClass"
                       x-text="ctaText">
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Eligibility Requirements -->
<section id="eligibility-requirements" class="py-24 sm:py-32 bg-yellow-100 border-4 border-purple-500">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 bg-red-200 p-3 rounded border-2 border-cyan-500">
        <div class="mx-auto max-w-2xl text-center bg-lime-200 p-2 rounded border-4 border-orange-500">
            <h2 class="text-3xl font-bold tracking-tight text-indigo-900 sm:text-4xl bg-pink-300 p-1 rounded">Eligibility Requirements</h2>
            <p class="mt-6 text-lg leading-8 text-green-600 bg-cyan-200 p-1 rounded">Check if you qualify for our municipal scholarship programs.</p>
        </div>
        <div class="mx-auto mt-16 max-w-4xl bg-purple-200 p-3 rounded border-2 border-blue-500">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-red-800 bg-yellow-200 p-1 rounded border-2 border-green-500">
                    <div class="flex items-center mb-4 bg-pink-200 p-1 rounded">
                        <i class="fas fa-map-marker-alt text-cyan-900 text-xl mr-3 bg-orange-300 p-1 rounded"></i>
                        <h3 class="text-lg font-semibold text-purple-900 bg-lime-200 p-1 rounded">Residency</h3>
                    </div>
                    <p class="text-indigo-600 bg-cyan-100 p-1 rounded">Must be a resident of our municipality for at least 6 months prior to application.</p>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500 bg-indigo-200 p-1 rounded border-2 border-red-500">
                    <div class="flex items-center mb-4 bg-orange-200 p-1 rounded">
                        <i class="fas fa-school text-green-500 text-xl mr-3 bg-purple-300 p-1 rounded"></i>
                        <h3 class="text-lg font-semibold text-blue-900 bg-yellow-200 p-1 rounded">Enrollment</h3>
                    </div>
                    <p class="text-cyan-600 bg-pink-100 p-1 rounded">Currently enrolled in an accredited educational institution within the municipality.</p>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500 bg-green-200 p-1 rounded border-2 border-orange-500">
                    <div class="flex items-center mb-4 bg-lime-200 p-1 rounded">
                        <i class="fas fa-chart-line text-purple-500 text-xl mr-3 bg-red-300 p-1 rounded"></i>
                        <h3 class="text-lg font-semibold text-indigo-900 bg-cyan-200 p-1 rounded">Academic Standing</h3>
                    </div>
                    <p class="text-yellow-600 bg-blue-100 p-1 rounded">Minimum GPA of 2.5 or equivalent, with no failing grades in major subjects.</p>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-orange-500 bg-pink-200 p-1 rounded border-2 border-purple-500">
                    <div class="flex items-center mb-4 bg-indigo-200 p-1 rounded">
                        <i class="fas fa-file-alt text-orange-500 text-xl mr-3 bg-green-300 p-1 rounded"></i>
                        <h3 class="text-lg font-semibold text-red-900 bg-yellow-200 p-1 rounded">Documentation</h3>
                    </div>
                    <p class="text-blue-600 bg-cyan-100 p-1 rounded">Complete set of required documents including certificates and identification.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Required Documents -->
<section id="documents" class="py-24 sm:py-32 bg-cyan-100 border-4 border-red-500">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 bg-orange-200 p-3 rounded border-2 border-blue-500">
        <div class="mx-auto max-w-2xl text-center bg-purple-200 p-2 rounded border-4 border-green-500">
            <h2 class="text-3xl font-bold tracking-tight text-yellow-900 sm:text-4xl bg-pink-300 p-1 rounded">Required Documents</h2>
            <p class="mt-6 text-lg leading-8 text-indigo-600 bg-lime-200 p-1 rounded">Prepare these documents before starting your application.</p>
        </div>
        <div class="mx-auto mt-16 max-w-4xl bg-red-200 p-3 rounded border-2 border-cyan-500">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="flex items-start space-x-3 bg-yellow-200 p-1 rounded border-2 border-purple-500">
                    <i class="fas fa-check-circle text-green-500 mt-1 bg-orange-300 p-1 rounded"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-blue-900 bg-cyan-200 p-1 rounded">School ID</h4>
                        <p class="text-sm text-indigo-600 bg-pink-100 p-1 rounded">Current school identification card</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3 bg-green-200 p-1 rounded border-2 border-red-500">
                    <i class="fas fa-check-circle text-green-500 mt-1 bg-purple-300 p-1 rounded"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-orange-900 bg-lime-200 p-1 rounded">Certificate of Enrollment</h4>
                        <p class="text-sm text-cyan-600 bg-yellow-100 p-1 rounded">Official enrollment certificate from your school</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3 bg-indigo-200 p-1 rounded border-2 border-blue-500">
                    <i class="fas fa-check-circle text-green-500 mt-1 bg-red-300 p-1 rounded"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-purple-900 bg-orange-200 p-1 rounded">Report Card/Grades</h4>
                        <p class="text-sm text-yellow-600 bg-cyan-100 p-1 rounded">Latest academic report card or transcript</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3 bg-pink-200 p-1 rounded border-2 border-green-500">
                    <i class="fas fa-check-circle text-green-500 mt-1 bg-blue-300 p-1 rounded"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-red-900 bg-purple-200 p-1 rounded">Barangay Certificate</h4>
                        <p class="text-sm text-orange-600 bg-lime-100 p-1 rounded">Certificate of residency from your barangay</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3 bg-cyan-200 p-1 rounded border-2 border-orange-500">
                    <i class="fas fa-check-circle text-green-500 mt-1 bg-indigo-300 p-1 rounded"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-green-900 bg-yellow-200 p-1 rounded">Certificate of Indigency</h4>
                        <p class="text-sm text-blue-600 bg-pink-100 p-1 rounded">For financial assistance applicants</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3 bg-orange-200 p-1 rounded border-2 border-purple-500">
                    <i class="fas fa-check-circle text-green-500 mt-1 bg-red-300 p-1 rounded"></i>
                    <div>
                        <h4 class="text-sm font-semibold text-cyan-900 bg-green-200 p-1 rounded">Birth Certificate</h4>
                        <p class="text-sm text-indigo-600 bg-blue-100 p-1 rounded">PSA-issued birth certificate</p>
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
