<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth()->user()->id != null)
        {
            return true;
        }
        return false;
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
            'current-password' => 'required',
            'new-password' => 'required|different:current-password|same:confirm-new-password',
            'confirm-new-password' => 'required',
        ];
    }

        public function messages()
        {
            $messages =
                [
                    'current-password.required' => 'Current password is required',
                    'new-password.required' => 'New password is required',
                    'confirm-new-password.required' => 'Confirm new password is required',
                    'different' => 'Current password and new password must not be the same',
                    'same' => 'Passwords do not match',
                    /*'same' => 'Passwords do not match'*/
                ];
            return $messages;
        }
}
