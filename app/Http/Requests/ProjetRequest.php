<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetRequest extends FormRequest
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
            'titre' => 'required|min:10|max:25',
            'description' => 'required|min:100|max:250',
            'image' => 'image'
        ];
    }
    public function messages()
    {
        return [
            'titre.required' => 'Le titre doit etre requis, minimum 10 et maximum 25.',
            'description.required' => 'Le champs est requis, minimum 100 et maximum 250.',
            'image.required' => 'Le choix d\'une image est obligatoire'
        ];
    }
}
