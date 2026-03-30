@extends('peso.layout')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Employment Management</h1>
    <p class="mt-1 text-sm text-gray-500">Update employment status and record referrals and assistance.</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
    {{-- Update / Record Form --}}
    <div class="lg:col-span-2 space-y-6">
        {{-- Update Employment Status --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-base font-semibold text-gray-800 mb-4">
                <i class="fas fa-pen text-orange-500 mr-2"></i> Update Employment Status
            </h2>
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Scholar / Graduate</label>
                    <select name="scholar_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <option value="">Select scholar or graduate</option>
                        {{-- Populated from DB --}}
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Employment Status</label>
                    <select name="employment_status" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <option value="">Select status</option>
                        <option value="employed_regular">Employed — Regular</option>
                        <option value="employed_contractual">Employed — Contractual</option>
                        <option value="employed_part_time">Employed — Part-time</option>
                        <option value="self_employed">Self-Employed</option>
                        <option value="unemployed_seeking">Unemployed — Actively Seeking</option>
                        <option value="unemployed_not_seeking">Unemployed — Not Seeking</option>
                        <option value="continuing_studies">Continuing Studies</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Employer / Company</label>
                    <input type="text" name="employer" placeholder="Leave blank if not employed" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Job Title / Position</label>
                    <input type="text" name="position" placeholder="e.g. Software Engineer" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date of Employment</label>
                    <input type="date" name="date_employed" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Remarks</label>
                    <textarea name="remarks" rows="3" placeholder="Optional notes..." class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400"></textarea>
                </div>
                <button type="submit" class="w-full inline-flex items-center justify-center px-5 py-2.5 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-medium text-sm">
                    <i class="fas fa-save mr-2"></i> Save Employment Status
                </button>
            </form>
        </div>

        {{-- Record Referral / Assistance --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-base font-semibold text-gray-800 mb-4">
                <i class="fas fa-handshake text-blue-500 mr-2"></i> Record Referral & Assistance
            </h2>
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Scholar / Graduate</label>
                    <select name="scholar_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">Select scholar or graduate</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type of Assistance</label>
                    <select name="assistance_type" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="">Select type</option>
                        <option value="job_referral">Job Referral</option>
                        <option value="job_fair">Job Fair Participation</option>
                        <option value="skills_training">Skills Training</option>
                        <option value="livelihood">Livelihood Program</option>
                        <option value="resume_review">Resume / Application Assistance</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Referral / Employer Name</label>
                    <input type="text" name="referral_target" placeholder="Company or program referred to" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                    <input type="date" name="referral_date" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Outcome / Notes</label>
                    <textarea name="outcome" rows="3" placeholder="Describe the outcome or assistance provided..." class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                </div>
                <button type="submit" class="w-full inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium text-sm">
                    <i class="fas fa-plus mr-2"></i> Record Assistance
                </button>
            </form>
        </div>
    </div>

    {{-- Employment & Referral History --}}
    <div class="lg:col-span-3 space-y-6">
        {{-- Recent Employment Updates --}}
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <h2 class="text-base font-semibold text-gray-800">Recent Employment Updates</h2>
                <a href="{{ route('peso.reports') }}" class="text-sm text-orange-600 hover:underline">View report</a>
            </div>
            <div class="divide-y divide-gray-100">
                <div class="flex flex-col items-center justify-center py-10 text-gray-400">
                    <i class="fas fa-briefcase text-4xl text-gray-300 mb-2"></i>
                    <p class="text-sm text-gray-500">No employment updates recorded yet.</p>
                </div>

                {{-- Row (shown when data exists) --}}
                {{--
                <div class="px-6 py-4 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-900">Juan Dela Cruz</p>
                        <p class="text-xs text-gray-500">Employed — Regular · Tech Company Inc.</p>
                        <p class="text-xs text-gray-400 mt-0.5">Updated: Jan 15, 2026</p>
                    </div>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Employed</span>
                </div>
                --}}
            </div>
        </div>

        {{-- Referral & Assistance Log --}}
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-base font-semibold text-gray-800">Referral & Assistance Log</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Scholar</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Referred To</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Outcome</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        <tr>
                            <td colspan="5" class="px-4 py-10 text-center text-sm text-gray-400">No referrals logged yet.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
