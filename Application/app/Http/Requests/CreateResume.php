<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateResume extends FormRequest
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
    public function rules()
    {
        return [
               'templates'=>'required',
               'experience'=>'required',
               'skill'=>'required',
               'education'=>'required',
        ];
    }
    public function messages()
    {
        $messages =
            [
                'templates.required' => 'Please choose a template',
                'experience.required' => 'Work Experience is required',
                'skill.required' => 'A Skill is required',
                'education.required' => 'Education is required',
            ];
        return $messages;
    }
}
