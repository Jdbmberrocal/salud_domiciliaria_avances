<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHistoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'patient_id' => 'required|exists:users,id',
            'professional_id' => 'required|exists:users,id',
            'weight' => 'required|integer|max_digits:3',
            'size' => 'required|integer|max_digits:3',
            'pulse' => 'required|integer|max_digits:3',
            'temperature' => 'required|decimal:1,3',
            'blood_pressure' => 'required|string|max:50',
            'general_state' => 'required|string|max:250',
            'date_time' => 'required|date',
            'antecedent' => 'required|string|max:250',
            'professional_concept' => 'required|string|max:250',
            'recommendations' => 'nullable|string|max:250',
            'state' => 'required|boolean',
        ];
    }
}
