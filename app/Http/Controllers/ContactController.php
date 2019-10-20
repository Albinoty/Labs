<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    public function edit (){
        
        $contact = Contact::find(1);


        if($contact !== null)
            return view('admin.adminContact',compact('contact'));
        else
            return view('admin.adminContact');

    }

    public function update(ContactRequest $request){

        $contact = Contact::all();

        if(count($contact) === 0){
            $contact = new Contact();
            
            $contact->titre = $request->input('titre');
            $contact->texte = $request->input('texte');
            $contact->sous_titre = $request->input('sous_titre');
            $contact->adresse = $request->input('adresse');
            $contact->localite = $request->input('localite');
            $contact->numero_gsm = $request->input('numero_gsm');
            $contact->email = $request->input('email');
            
            
            $contact->save();

            return redirect()->route('index');

        }
        else{
            $contact = Contact::find(1);
            
            $contact->titre = $request->input('titre');
            $contact->texte = $request->input('texte');
            $contact->sous_titre = $request->input('sous_titre');
            $contact->adresse = $request->input('adresse');
            $contact->localite = $request->input('localite');
            $contact->numero_gsm = $request->input('numero_gsm');
            $contact->email = $request->input('email');

            
            $contact->save();

            return redirect()->route('index');
        }
    }
}
