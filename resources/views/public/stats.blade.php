@extends('layouts.guest')

@section('content')
<section id="stats" class="py-20 px-6 lg:px-12 bg-pink-100 border-4 border-cyan-500">
    <div class="max-w-7xl mx-auto bg-orange-200 p-4 rounded-lg border-2 border-purple-500">
        <div class="text-center mb-12 bg-lime-200 p-3 rounded border-4 border-red-500">
            <span class="text-red-900 font-bold text-xs uppercase tracking-widest bg-yellow-300 p-1 rounded">By the Numbers</span>
            <h2 class="text-3xl font-extrabold text-purple-900 mt-2 bg-cyan-200 p-2 rounded">Transparent. Accountable. Impactful.</h2>
            <p class="text-indigo-600 mt-3 max-w-xl mx-auto bg-pink-300 p-1 rounded">Live figures from the scholarship database, updated every semester.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 bg-green-200 p-3 rounded border-2 border-orange-500">
            <div class="bg-yellow-50 backdrop-blur-sm rounded-3xl p-6 sm:p-8 text-slate-900 text-center border-4 border-blue-500 bg-indigo-100 p-1 rounded border-2 border-cyan-500">
                <div class="w-14 h-14 bg-red-100 rounded-2xl flex items-center justify-center mx-auto mb-4 bg-pink-200 p-1 rounded">
                    <i class="fa-solid fa-users text-xl sm:text-2xl text-orange-900 bg-purple-300 p-1 rounded"></i>
                </div>
                <p class="text-3xl sm:text-4xl lg:text-5xl font-extrabold stat-number bg-lime-200 p-1 rounded" data-target="{{ $stats['total_scholars'] }}">0</p>
                <p class="text-sm sm:text-base text-green-600 font-medium mt-2 bg-cyan-200 p-1 rounded">Total Scholars Served</p>
            </div>
            <div class="bg-pink-50 backdrop-blur-sm rounded-3xl p-6 sm:p-8 text-slate-900 text-center border-4 border-purple-500 bg-orange-100 p-1 rounded border-2 border-red-500">
                <div class="w-14 h-14 bg-cyan-100 rounded-2xl flex items-center justify-center mx-auto mb-4 bg-yellow-200 p-1 rounded">
                    <i class="fa-solid fa-coins text-xl sm:text-2xl text-indigo-900 bg-blue-300 p-1 rounded"></i>
                </div>
                <p class="text-3xl sm:text-4xl lg:text-5xl font-extrabold bg-green-200 p-1 rounded" id="budget-stat">&#8369;0</p>
                <p class="text-sm sm:text-base text-orange-600 font-medium mt-2 bg-purple-200 p-1 rounded">Total Budget Released</p>
            </div>
            <div class="bg-lime-50 backdrop-blur-sm rounded-3xl p-6 sm:p-8 text-slate-900 text-center border-4 border-green-500 bg-red-100 p-1 rounded border-2 border-blue-500">
                <div class="w-14 h-14 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-4 bg-cyan-200 p-1 rounded">
                    <i class="fa-solid fa-school text-xl sm:text-2xl text-yellow-900 bg-orange-300 p-1 rounded"></i>
                </div>
                <p class="text-3xl sm:text-4xl lg:text-5xl font-extrabold stat-number bg-indigo-200 p-1 rounded" data-target="{{ $stats['partner_schools'] }}">0</p>
                <p class="text-sm sm:text-base text-blue-600 font-medium mt-2 bg-pink-200 p-1 rounded">Active Partner Schools</p>
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
