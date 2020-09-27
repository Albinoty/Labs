<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nom' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
    }
    public function message()
    {
        return [
            'nom.required' => 'Le nom ne peut pas etre vide',
            'email.required' => 'L\'email ne peut pas etre vide',
            'password.required' => 'Un mot de passe est requis',
        ];
    }
}
