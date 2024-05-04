<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvolutionRequest extends FormRequest
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
            "clinic_history_id" => 'required|exists:clinic_histories,id',
            "patient_information" => 'nullable|string|max:250',
            "medical_concept" => 'required|string|max:250',
            "principal_diagnostic" => 'nullable|string|max:250',
            "related_diagnosis" => 'nullable|string|max:250',
            "type_diagnosis" => 'required|in:Nuevo,Presuntivo,Sintomático,Anatomico,Direfencial,Certeza',
            "forecast" => 'required|in:Bueno,Regular,Malo',
            "exit" => 'required|in:Si,No',
            "date_hours" => 'required|date'
        ];
    }
}
