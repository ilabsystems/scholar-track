<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        $scholarship = $this->route('scholarship');

        // User must be an applicant
        if (! $user->hasRole('applicant')) {
            return false;
        }

        // Scholarship deadline must not have passed
        if ($scholarship->isDeadlinePassed()) {
            $this->ignore('deadline_passed');

            return false;
        }

        // User cannot have already applied to this scholarship
        if ($scholarship->applications()->where('user_id', $user->id)->exists()) {
            $this->ignore('already_applied');

            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cover_letter' => ['required', 'string', 'max:5000'],
            'applicant_profile_id' => ['nullable', 'exists:applicant_profiles,id'],
            'documents' => ['nullable', 'array'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'cover_letter.required' => 'Please provide a cover letter for your application.',
            'cover_letter.max' => 'Your cover letter cannot exceed 5000 characters.',
            'applicant_profile_id.exists' => 'The selected profile does not exist.',
        ];
    }

    /**
     * Handle a failed authorization attempt.
     */
    protected function failedAuthorization(): void
    {
        if ($this->user() && ! $this->user()->hasRole('applicant')) {
            throw $this->forbiddenResponse();
        }

        if ($this->route('scholarship')->isDeadlinePassed()) {
            abort(422, 'This scholarship deadline has passed.');
        }

        if ($this->route('scholarship')->applications()->where('user_id', $this->user()->id)->exists()) {
            abort(422, 'You have already applied to this scholarship.');
        }

        throw $this->forbiddenResponse();
    }
}
