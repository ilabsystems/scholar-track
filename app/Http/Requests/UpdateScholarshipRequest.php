<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScholarshipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'amount' => ['required', 'numeric', 'min:0'],
            'criteria' => ['required', 'string'],
            'deadline' => ['required', 'date', 'after_or_equal:today'],
            'award_type' => ['required', 'in:one-time,yearly,monthly'],
            'coverage' => ['required', 'in:full-tuition,partial,books,other'],
            'gpa_requirement' => ['nullable', 'numeric', 'min:0', 'max:4'],
            'demographics' => ['nullable', 'string'],
            'field_of_study' => ['nullable', 'string'],
            'status' => ['required', 'in:active,inactive,draft,archived'],
        ];
    }
}
