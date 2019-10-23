<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentaireRequest extends FormRequest
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
            'email' => 'required',
            'name' => 'required',
            'message' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'L\'email est requis',
            'name.required' => 'Le nom est requis',
            'message.required' => 'Le message est requis pour posté.'
        ];
    }
}
