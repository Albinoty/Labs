<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetsRequest extends FormRequest
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
            'titre' => 'required|max:30',
            'description' => 'required',
            'image' => 'required'
        ];
    }

    public function messages(){
        return [
            'titre.required' => 'Le titre est maximum 30 char',
            'description.required' => 'La description est requis',
            'image.required' => 'Il y a un soucis avec l image'
        ];
    }
}
