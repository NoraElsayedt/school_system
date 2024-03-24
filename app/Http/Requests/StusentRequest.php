<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StusentRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'email'=>'unique:students',
            'gender_id'  => 'required',
            'nationalitie_id'  => 'required',
            'blood_id'  => 'required',
            'Date_Birth'  => 'required',
            'Grade_id'  => 'required',

            'Classroom_id'  => 'required',
            'section_id'  => 'required',
            'parent_id'  => 'required',
            'academic_year'  => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name_ar.required' => 'A name_ar is required',
            'name_en.required' => 'A name_en is required',
            'gender_id.required' => 'A gender is required',
            'email.unique' => 'A email is unique',
            'nationalitie_id.required' => 'A nationalitie is required',
            'blood_id.required' => 'A blood is required',
            'Date_Birth.required' => 'A Date_Birth is required',
            'Grade_id.required' => 'A Grade is required',
            'nationalitie_id.required' => 'A nationalitie is required',

            'Classroom_id.required' => 'A Classroom is required',
            'section_id.required' => 'A section is required',
            'parent_id.required' => 'A parent is required',
            'academic_year.required' => 'A academic_year is required',
            
        ];
    }
}
