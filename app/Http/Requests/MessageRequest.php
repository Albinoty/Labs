<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'name' => 'required|min:5|max:30',
            'email' => 'required|email',
            'sujet' => 'required|min:5|max:50',
            'message' => 'required|min:30|max:250'    
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Introduiser un nom valide, minimum 5 et maximum 30.',
            'email.required' => 'Introduiser un mail valide.',
            'sujet.required' => 'Introduiser un sujet.',
            'message.required' => 'Introduiser un message entre 30 et 250 caractères.'
        ];
    }
}
