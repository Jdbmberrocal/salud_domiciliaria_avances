<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:50|min:3',
            "lastname" => "required|string|max:50|min:3",
            "celphone" => "required|integer|max_digits:10",
            "type_identification" => "required|in:CC,TI,CE,P,RC",
            "identification_number" => "required|integer|max_digits:12|min_digits:5|unique:users,identification_number",
            "address" => "required|string|max:100",
            "type" => "required|in:paciente,profesional",
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:8",
        ];
    }
}
