<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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
           'Email'=>'unique:teachers',
           
        ];
    }


    public function messages(): array
{
    return [
        // 'name.required' => 'A name is required',
        'Email.unique' => 'A Email is unique',
        // 'notes.required' => 'A notes is required',
    ];
}
}
