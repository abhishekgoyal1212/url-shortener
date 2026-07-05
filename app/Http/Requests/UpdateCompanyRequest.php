<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('companies', 'name')->ignore($this->company->id),
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('companies', 'email')->ignore($this->company->id),
            ],

            'phone' => [
                'required',
                'string',
                'max:20',
                Rule::unique('companies', 'phone')->ignore($this->company->id),
            ],
        ];
    }
}
