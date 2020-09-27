<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarouselRequest extends FormRequest
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
            'titre' => 'required|max:50|min:5',
            'image' => 'required|image|dimensions:min_width=720,min_height480'
        ];
    }
    public function messages(){
        return [
            'titre.required' => 'Le titre est requis et maximum 50 caractères',
            'image.required' => 'Le fichier doit etre une image et minimum 720x480'
        ];
    }
}
