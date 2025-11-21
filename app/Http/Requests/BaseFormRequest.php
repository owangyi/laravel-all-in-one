<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class BaseFormRequest extends FormRequest
{
    protected function failedValidation(Validator $validator): never
    {
        throw new UnprocessableEntityHttpException($validator->errors()->first());
    }
}
