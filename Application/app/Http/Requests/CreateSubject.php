<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubject extends FormRequest
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
            'name'=>'required',
            'description'=>'required',
            'specializations'=>'required',
            'days'=>'required',
            'times-from'=>'required',
            'times-to'=>'required',
        ];
    }
    public function messages()
    {
        $messages =
            [
                'name.required' => 'Name is required',
                'description.required' => 'Description is required',
                'specializations.required' => 'A Specialization is required',
                //add times-from should be earlier than times-to
            ];
        return $messages;
    }
}
