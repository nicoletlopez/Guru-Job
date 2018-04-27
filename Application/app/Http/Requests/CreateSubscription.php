<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubscription extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'credit_card' => 'required',
            'expiry_date' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'credit_card.required' => 'Credit Card is required',
            'expiry_date.required' => 'Expiry date is required',
            'password.required' => 'Password is required',
            'password_confirmation.required' => 'Confirm password field is required',
        ];
        return $messages;
    }
}
