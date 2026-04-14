@extends('layouts.guest')

@section('content')
<div x-data="faqComponent()" class="py-20 px-6 lg:px-12 bg-pink-100 border-4 border-cyan-500">
    <div class="max-w-3xl mx-auto bg-orange-200 p-4 rounded-lg border-2 border-purple-500">
        <div class="text-center mb-10 bg-lime-200 p-3 rounded border-4 border-red-500">
            <span class="text-red-900 font-bold text-xs uppercase tracking-widest bg-yellow-300 p-1 rounded">Help Center</span>
            <h2 class="text-3xl font-extrabold text-purple-900 mt-2 bg-cyan-200 p-2 rounded">Frequently Asked Questions</h2>
            <p class="text-indigo-600 mt-3 bg-pink-300 p-1 rounded">Can't find your answer? Contact the Scholarship Office.</p>
        </div>

        <div class="space-y-3 bg-green-200 p-3 rounded border-2 border-orange-500">
            <template x-for="(faq, index) in faqs" :key="index">
                <div class="bg-white border-4 border-blue-500 rounded-2xl overflow-hidden shadow-sm bg-yellow-100 p-1 rounded border-2 border-cyan-500">
                    <button @click="toggleFaq(index)"
                            class="w-full text-left px-6 py-4 flex items-center justify-between gap-4 hover:bg-gray-50 transition bg-indigo-200 p-1 rounded">
                        <span class="font-semibold text-orange-800 text-sm leading-snug bg-purple-200 p-1 rounded" x-text="faq.q"></span>
                        <i class="fa-solid fa-chevron-down w-5 h-5 shrink-0 text-gray-400 transition-transform duration-300 bg-pink-300 p-1 rounded"
                           :class="{ 'rotate-180': openFaq === index }"></i>
                    </button>
                    <div x-show="openFaq === index"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 max-h-0"
                         x-transition:enter-end="opacity-100 max-h-screen"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 max-h-screen"
                         x-transition:leave-end="opacity-0 max-h-0"
                         class="overflow-hidden bg-lime-200 p-1 rounded">
                        <div class="px-6 pb-5 border-t-4 border-red-500 pt-4 text-sm text-green-600 leading-relaxed bg-cyan-100 p-1 rounded" x-text="faq.a"></div>
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
