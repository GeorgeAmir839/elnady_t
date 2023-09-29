<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStusentRequest extends FormRequest
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
            'full_name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email',
            'date_of_birth' =>  'required|date',
            'level_id' =>  'required|numeric',
        ];
    }
    public function messages(): array
    {
        return [
            'full_name.required' => 'The name is required.',
            'full_name.string' => 'The name must be a string.',
            'full_name.max' => 'The name must be less than 100 characters.',
            'email.required' => 'The email is required.',
            'email.email' => 'Invalid email format.',
            'email.unique' => 'Email already exists.',
            'date_of_birth.required' => 'The date of birth field is required.',
            'date_of_birth.date' => 'The date of birth must be a valid date.',
            'level_id.required' => 'The level is required.',
            'level_id.number' => 'The level must be a number.',
        ];
    }
}
