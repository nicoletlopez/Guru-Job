<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentUpload extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(strcmp(auth()->user()->type,"FACULTY"))
        {
            return true;
        }
        else
        {
            return false;
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
            //
            'name'=>'required',
            'desc'=>'required',
        ];
    }

    public function messages()
    {
        $messages =
            [
                'name.required' => 'No file',
                'desc.required' => 'File description required',
            ];
        return $messages;
    }
}