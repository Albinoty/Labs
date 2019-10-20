<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
            'auteur' => 'required|min:10|max:50',
            'fonction' => 'required|min:10|max:25',
            'texte' => 'required|min:30|max:250',
            'image' => 'required|image|dimensions:max_width=500,max_height=500,min_width=500,min_height=500'
        ];
    }

    public function messages(){
        return [
            'auteur.required' => 'Le nom d\'auteur est de minimum 10 et maximum 50 caractères.',
            'fonction.required' => 'Le fonction est de minimum 10 et maximum 25 caractères.',
            'texte.required' => 'Le champ de texte est de minmum 30 et maximum 250 caractères.',
            'image.required' => 'L\'image est requis au format min 250x250 et max 250x250'
        ];
    }
}
