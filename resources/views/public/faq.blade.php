@extends('layouts.guest')

@section('content')
<div x-data="faqComponent()" class="py-20 px-6 lg:px-12 bg-gray-50">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-10">
            <span class="text-blue-900 font-bold text-xs uppercase tracking-widest">Help Center</span>
            <h2 class="text-3xl font-extrabold text-gray-900 mt-2">Frequently Asked Questions</h2>
            <p class="text-gray-600 mt-3">Can't find your answer? Contact the Scholarship Office.</p>
        </div>

        <div class="space-y-3">
            <template x-for="(faq, index) in faqs" :key="index">
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                    <button @click="toggleFaq(index)"
                            class="w-full text-left px-6 py-4 flex items-center justify-between gap-4 hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-800 text-sm leading-snug" x-text="faq.q"></span>
                        <i class="fa-solid fa-chevron-down w-5 h-5 shrink-0 text-gray-400 transition-transform duration-300"
                           :class="{ 'rotate-180': openFaq === index }"></i>
                    </button>
                    <div x-show="openFaq === index"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 max-h-0"
                         x-transition:enter-end="opacity-100 max-h-screen"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 max-h-screen"
                         x-transition:leave-end="opacity-0 max-h-0"
                         class="overflow-hidden">
                        <div class="px-6 pb-5 border-t border-gray-100 pt-4 text-sm text-gray-600 leading-relaxed" x-text="faq.a"></div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>

<script>
function faqComponent() {
    return {
        faqs: @json($faqs),
        openFaq: null,
        toggleFaq(index) {
            this.openFaq = this.openFaq === index ? null : index;
        }
    }
}
</script>
@endsection
