<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'texte' => 'required|min:100|max:250',
            'sous_titre' => 'required|min:10|max:25',
            'adresse' => 'required|min:10|max:100',
            'localite' => 'required|min:5|max:50',
            'numero_gsm' => 'required|min:8|max:20',
            'email' => 'required|email'
        ];
    }
    public function messages()
    {
        return [
            'titre.required' => 'Le titre doit etre requis, minimum 10 et maximum 25.',
            'texte.required' => 'Le champs est requis, minimum 100 et maximum 250.',
            'sous_titre.required' => 'Le sous-titre est requis, minimum 10 et maximum 25',
            'adresse.required' => 'L\'adress est requis, minimum 10 et maximum 100',
            'localite.required' => 'La localité est requis, minimum 5 et maximum 50',
            'numero_gsm.required' => 'Le numero de Gsm est requis.',
            'email.required' => 'L\'email est requis'
        ];
    }
}
