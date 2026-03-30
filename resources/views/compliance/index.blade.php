@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Compliance</h1>
            <p class="mt-1 text-sm text-gray-500">Submit semester grades and track your compliance standing.</p>
        </div>
    </div>

    <!-- Standing Summary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-green-100 rounded-lg">
                    <i class="fas fa-shield-check text-green-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Standing</p>
                    <p class="text-lg font-semibold text-green-700">Good Standing</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <i class="fas fa-calendar-check text-blue-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Last Submitted</p>
                    <p class="text-lg font-semibold text-gray-900">—</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-yellow-100 rounded-lg">
                    <i class="fas fa-hourglass-half text-yellow-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Next Deadline</p>
                    <p class="text-lg font-semibold text-gray-900">—</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
        <!-- Submit Grades Form -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-1">Submit Semester Requirements</h2>
            <p class="text-sm text-gray-500 mb-5">Upload your grades and supporting documents for the current semester.</p>
            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Academic Year</label>
                    <input type="text" name="academic_year" placeholder="e.g. 2025-2026" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
                    <select name="semester" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select semester</option>
                        <option value="1st">1st Semester</option>
                        <option value="2nd">2nd Semester</option>
                        <option value="summer">Summer</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">GWA / GPA</label>
                    <input type="number" name="gpa" step="0.01" min="1" max="5" placeholder="e.g. 1.50" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Grade / COG Upload</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-400 transition cursor-pointer">
                        <input type="file" name="grades_document" accept=".pdf,.jpg,.jpeg,.png" class="hidden" id="grades-upload">
                        <label for="grades-upload" class="cursor-pointer">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <p class="text-sm text-gray-500">Click to upload or drag & drop</p>
                            <p class="text-xs text-gray-400 mt-1">PDF, JPG, PNG — max 5MB</p>
                        </label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Additional Documents (optional)</label>
                    <input type="file" name="additional_docs[]" multiple accept=".pdf,.jpg,.jpeg,.png" class="w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 cursor-pointer">
                </div>
                <button type="submit" class="w-full inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium text-sm">
                    <i class="fas fa-paper-plane mr-2"></i> Submit Requirements
                </button>
            </form>
        </div>

        <!-- Compliance History -->
        <div class="lg:col-span-3 bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Compliance History</h2>

            {{-- Empty state --}}
            <div class="flex flex-col items-center justify-center py-12 text-gray-400">
                <i class="fas fa-clipboard-list text-5xl mb-4 text-gray-300"></i>
                <p class="text-gray-500 font-medium">No submissions yet</p>
                <p class="text-sm mt-1">Your compliance history will appear here after you submit your first semester requirements.</p>
            </div>

            {{-- History table (shown when records exist) --}}
            {{--
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Period</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">GWA</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Documents</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Submitted</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        <tr>
                            <td class="px-4 py-3 font-medium text-gray-900">2025-2026 — 1st Sem</td>
                            <td class="px-4 py-3 text-gray-700">1.50</td>
                            <td class="px-4 py-3"><a href="#" class="text-blue-600 hover:underline">View</a></td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check mr-1"></i> Verified
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-500">Jan 15, 2026</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            --}}
        </div>
    </div>
</div>
@endsection
