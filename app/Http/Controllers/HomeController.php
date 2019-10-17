<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Service;
use App\Media;
use App\Home;
use App\Testimonial;
use App\Team;
use Storage;
use App\Contact;

class HomeController extends Controller
{

    public function __construct(){
        
    }

    public static function storageFile(Request $requete, $home, $column){

        if($requete->hasfile($column)){
            $file = $requete->file($column);
            $filename = $file->store(env('IMG_DIR'));
            $home->$column = $filename;
        }
    }

    public function index(){
        $actif = "home";
        $services = DB::table('services')->paginate(9);
        $servicesTop = Service::all();
        $medias = Media::all();
        $teams = Team::all()->where('teamleader','=','Non');
        $testimonials = Testimonial::all();
        $contact = Contact::find(1);


        //Condtion des imports
        if(count($servicesTop) >=3)
            $servicesTop = $servicesTop->random(3);

        $home = Home::find(1);


        if(count($teams) >= 2)
            $teams = $teams->random(2);

        $leaders = Team::all()->where('teamleader','=','Oui');
        
        
        return view('index',compact('actif','servicesTop','services','medias','home','testimonials','teams','leaders','contact'));

    }

    public function edit (){
        
        $home = Home::find(1);


        if($home !== null)
            return view('admin.adminHome',compact('home'));
        else
            return view('admin.adminHome');
        

    }

    public function update(Request $requete){

        $home = Home::all();

        if(count($home) === 0){
            $home = new Home();
            
            
            $this->storageFile($requete,$home,'logo');
            $this->storageFile($requete,$home,'logo_carousel');
            


            $home->texte_carousel = $requete->input('texte_gauche');
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
            if(($requete->input('logo') != null) && ($requete->input('logo_carousel') != null)){
                $this->storageFile($requete,$home,'logo');
                $this->storageFile($requete,$home,'logo_carousel');
            }

            $home->texte_carousel = $requete->input('texte_gauche');
            $home->texte_gauche = $requete->input('texte_gauche');
            $home->texte_droite = $requete->input('texte_droite');
            $home->url_video = $requete->input('video');
            
            
            
            $home->save();

            return redirect()->route('index');
        }

    }
}
