<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'nom' => 'required|required|min:5|max:50',
            'fonction' => 'required|required|min:3|max:25',
            // 'image' => 'required|image'
        ];
    }
    public function messages()
    {
        return [
            'nom.required' => 'Le nom d\'auteur est de minimum 5 et maximum 50 caractères.',
            'fonction.required' => 'Le fonction est de minimum 3 et maximum 25 caractères.',
            // 'image.required' => 'Le fichier doit être une image'
        ];
    }
}
