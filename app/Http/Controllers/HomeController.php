<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Service;
use App\Media;
use App\Home;
use App\Testimonial;
use App\Team;
use App\Bouton;
use Storage;
use App\Contact;
use App\Http\Requests\HomeRequest;

class HomeController extends Controller
{

    public function edit (){
        
        $home = Home::find(1);


        if($home !== null)
            return view('admin.home',compact('home'));
        else
            return view('admin.home');
        

    }

    public function update(HomeRequest $requete){

        $home = Home::all();

        if(count($home) === 0){
            $home = new Home();
        

            $home->logo = $requete->file('logo')->store('img');
            $home->logo_carousel = $requete->file('logo_carousel')->store('img');
            $home->texte_carousel = $requete->input('texte_carousel');
            $home->texte_gauche = $requete->input('texte_gauche');
            $home->texte_droite = $requete->input('texte_droite');
            $home->url_video = $requete->input('video');
            
            
            $home->save();

            return redirect()->route('index');

        }
        else{
            $home = Home::find(1);

            Storage::delete($home->logo);
            Storage::delete($home->logo_carousel);
            $home->logo = $requete->file('logo')->store('img');
            $home->logo_carousel = $requete->file('logo_carousel')->store('img');

            $home->texte_carousel = $requete->input('texte_gauche');
            $home->texte_gauche = $requete->input('texte_gauche');
            $home->texte_droite = $requete->input('texte_droite');
            $home->url_video = $requete->input('video');
            
            
            
            $home->save();

            return redirect()->route('index');
        }

    }
}
