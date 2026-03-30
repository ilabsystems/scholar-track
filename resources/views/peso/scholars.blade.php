@extends('peso.layout')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Scholar Records</h1>
        <p class="mt-1 text-sm text-gray-500">Endorsed scholar and graduate records from the scholarship program.</p>
    </div>
</div>

{{-- Filters --}}
<div class="bg-white rounded-lg shadow p-4 mb-6">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div>
            <label class="block text-xs font-medium text-gray-500 mb-1">Search</label>
            <input type="text" placeholder="Search by name or program..." class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
        </div>
        <div>
            <label class="block text-xs font-medium text-gray-500 mb-1">Status</label>
            <select class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
                <option value="">All Statuses</option>
                <option value="active">Active Scholar</option>
                <option value="graduated">Graduated</option>
                <option value="terminated">Terminated</option>
            </select>
        </div>
        <div>
            <label class="block text-xs font-medium text-gray-500 mb-1">Employment Status</label>
            <select class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
                <option value="">All</option>
                <option value="employed">Employed</option>
                <option value="unemployed">Unemployed</option>
                <option value="self-employed">Self-Employed</option>
                <option value="studying">Continuing Studies</option>
            </select>
        </div>
    </div>
</div>

{{-- Records Table --}}
<div class="bg-white rounded-lg shadow">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Scholar / Graduate</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Program</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Scholar Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Employment</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <tr>
                    <td colspan="6" class="px-6 py-14 text-center text-sm text-gray-400">
                        <i class="fas fa-user-graduate text-4xl text-gray-300 mb-3 block"></i>
                        No endorsed scholar records yet.<br>
                        <span class="text-xs">Records will appear once scholars or graduates are endorsed to PESO.</span>
                    </td>
                </tr>

                {{-- Row example (shown when data exists) --}}
                {{--
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="h-8 w-8 rounded-full bg-slate-700 flex items-center justify-center text-white text-sm font-medium shrink-0">J</div>
                            <div>
                                <p class="font-medium text-gray-900">Juan Dela Cruz</p>
                                <p class="text-xs text-gray-500">juan@example.com</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-700">Municipal Scholarship</td>
                    <td class="px-6 py-4 text-gray-700">BS Computer Science</td>
                    <td class="px-6 py-4">
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Graduated</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Employed</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('peso.employment') }}" class="text-orange-600 hover:underline text-sm font-medium">Update</a>
                    </td>
                </tr>
                --}}
            </tbody>
        </table>
    </div>
</div>
@endsection
