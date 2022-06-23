<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email'    => 'required|email',
            'password' => 'required|string|min:8',
        ];
    }

    public function failedValidation( Validator $validator ): void
    {
        throw new HttpResponseException( response()->json( [
            'success' => false,
            'message' => 'Validation errors',
            'data'    => $validator->errors()
        ] ) );
    }

    /**
     * Custom validation messages (optional)
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Email is required',
            'email.email'    => 'Email is not correct'
        ];
    }
}
