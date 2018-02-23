<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLecture extends FormRequest
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
            'title'=>'required',
            'overview'=>'required',
            'objectives'=>'required',
        ];
    }
    public function messages()
    {
        $messages =
            [
                'title.required' => 'Title is required',
                'overview.required' => 'Overview is required',
                'objectives.required' => 'Objectives is required',
            ];
        return $messages;
    }
}
