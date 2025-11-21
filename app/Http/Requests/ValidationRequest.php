<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;

class ValidationRequest extends BaseFormRequest
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
     * @return array<string, array<mixed>|string|ValidationRule>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }
}
