<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfile extends FormRequest
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
            'dob'=>'required',
            'address'=>'required',
            'city'=>'required',
            'contact'=>'required|min:10',
            'description'=>'required',
        ];
    }
    public function messages()
    {
        $messages =
            [
                'dob.required' => 'Date of birth is required',
                'address.required' => 'Address is required',
                'city.required' => 'City is required',
                'contact.required' => 'Mobile number is required',
                'contact.min'=>'Mobile number should have 10 digits',
                'description.required' => 'Description is required',
                /*'same' => 'Passwords do not match'*/
            ];
        return $messages;
    }
}
