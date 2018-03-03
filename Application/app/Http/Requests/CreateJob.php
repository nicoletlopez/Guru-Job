<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateJob extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        switch (auth()->user()->type)
        {
            case "HR" : return true;
                break;
            case "FACULTY" : redirect()->route('dashboard');
                break;
            default: return false;
        }
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
            'type'=>'required',
            'subjects'=>'required',
            'min-salary'=>'required',
            'max-salary'=>'required',
            'description'=>'required',
        ];
    }
    public function messages()
    {
        $messages =
            [
                'title.required' => 'Title is required',
                'type.required' => 'Type is required',
                'subjects.required'=>'Subject/s is required',
                'min-salary.required' => 'Minimum Salary is required',
                'max-salary.required' => 'Maximum Salary is required',
                'description.required' => 'Description is required',
            ];
        return $messages;
    }
}
