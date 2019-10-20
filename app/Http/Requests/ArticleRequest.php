<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'titre' => 'required|min:10|max:40',
            'image' => 'required|image',
            'texte' => 'required|min:50',
            'tags' => 'required',
            'categorie' =>  'required'
        ];
    }
    public function messages(){
        return [
            'titre.required' => 'Le titre doit etre requis, minimum 10 et maximum 40.',
            'image.required' => 'Le fichier doit être une image',
            'texte.required' => 'Le champs est requis, minimum 50 caractères',
            'tags[].required' => 'Un tag minimum est requis.',
            'categorie.required' => 'La categorie est requis.'
        ];
    }
}
