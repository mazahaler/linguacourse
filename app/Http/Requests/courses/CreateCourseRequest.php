<?php

namespace App\Http\Requests\courses;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'language_id'      => 'required',
            'complexity_id'    => 'required',
            'accessibility_id' => 'required',
            'title'            => 'required|string|max:100',
            'description'      => 'required|string',
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
}
