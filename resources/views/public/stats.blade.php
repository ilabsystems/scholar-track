@extends('public.layout')

@section('content')
<section id="stats" class="py-20 px-6 lg:px-12 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <span class="text-blue-900 font-bold text-xs uppercase tracking-widest">By the Numbers</span>
            <h2 class="text-3xl font-extrabold text-slate-900 mt-2">Transparent. Accountable. Impactful.</h2>
            <p class="text-slate-600 mt-3 max-w-xl mx-auto">Live figures from the scholarship database, updated every semester.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-blue-50 backdrop-blur-sm rounded-3xl p-6 sm:p-8 text-slate-900 text-center border border-blue-100">
                <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-users text-xl sm:text-2xl text-blue-900"></i>
                </div>
                <p class="text-3xl sm:text-4xl lg:text-5xl font-extrabold stat-number" data-target="{{ $stats['total_scholars'] }}">0</p>
                <p class="text-sm sm:text-base text-slate-600 font-medium mt-2">Total Scholars Served</p>
            </div>
            <div class="bg-blue-50 backdrop-blur-sm rounded-3xl p-6 sm:p-8 text-slate-900 text-center border border-blue-100">
                <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-coins text-xl sm:text-2xl text-blue-900"></i>
                </div>
                <p class="text-3xl sm:text-4xl lg:text-5xl font-extrabold" id="budget-stat">&#8369;0</p>
                <p class="text-sm sm:text-base text-slate-600 font-medium mt-2">Total Budget Released</p>
            </div>
            <div class="bg-blue-50 backdrop-blur-sm rounded-3xl p-6 sm:p-8 text-slate-900 text-center border border-blue-100">
                <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-school text-xl sm:text-2xl text-blue-900"></i>
                </div>
                <p class="text-3xl sm:text-4xl lg:text-5xl font-extrabold stat-number" data-target="{{ $stats['partner_schools'] }}">0</p>
                <p class="text-sm sm:text-base text-slate-600 font-medium mt-2">Active Partner Schools</p>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate stat numbers
    const statNumbers = document.querySelectorAll('.stat-number');
    statNumbers.forEach(stat => {
        const target = parseInt(stat.getAttribute('data-target'));
        let current = 0;
        const increment = target / 100;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            stat.textContent = Math.floor(current).toLocaleString();
        }, 20);
    });

    // Animate budget stat
    const budgetStat = document.getElementById('budget-stat');
    const budgetTarget = {{ $stats['total_budget'] }};
    let budgetCurrent = 0;
    const budgetIncrement = budgetTarget / 100;
    const budgetTimer = setInterval(() => {
        budgetCurrent += budgetIncrement;
        if (budgetCurrent >= budgetTarget) {
            budgetCurrent = budgetTarget;
            clearInterval(budgetTimer);
        }
        budgetStat.innerHTML = '&#8369;' + Math.floor(budgetCurrent).toLocaleString();
    }, 20);
});
</script>
@endsection
