<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
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

        $regex = '~^(?:https?://)?(?:www[.])?(?:youtube[.]com/watch[?]v=)([^&]{11})~x';
        return [
            'logo' => 'required|image|dimensions:max_width=120,min_height=35',
            'logo_carousel' => 'required|image',
            'texte_carousel' => 'required|max:50',
            'texte_droite' => 'required',
            'texte_gauche' => 'required',
            'video' => 'required|regex:'.$regex
        ];
    }
    public function messages(){
        return [
            'logo.required' => 'Le logo doit etre une image et doit etre 120px sur 35px Max.',
            'logo_carousel.required' => 'L\'image est requis ',
            'texte_carousel.required' => 'Le champ texte carousel est requis et maximum 50 caracteres',
            'texte_droite.required' => 'Le champ texte de gauche est requis et maximum 250 caracteres',
            'texte_gauche.required' => 'Le champ texte de droite est requis et maximum 250 caracteres',
            'video.required' => 'Le lien doit provenir de YouTube.'
        ];
    }
}
