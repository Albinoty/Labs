<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Model
use App\Home;
use App\User;
use App\Projet;
use App\Article;
use App\Tag;
use App\ArticleTag;
use App\Commentaire;
use App\Service;
use App\Categorie;
use App\Bouton;
use App\Media;
use App\Newsletter;
use App\Testimonial;
use App\Team;
use App\Contact;

use Storage;
use App\Http\Requests\HomeRequest;
use DB;


class PageController extends Controller
{
    public function index(){
        $actif = "home";
        $services = DB::table('services')->paginate(9);
        $servicesTop = Service::all();
        $medias = Media::all();
        $teams = Team::all()->where('teamleader','=','Non');
        $testimonials = Testimonial::all();
        $contact = Contact::find(1);
        $bouton = Bouton::find(1);


        //Condition des imports
        if(count($servicesTop) >=3)
            $servicesTop = $servicesTop->random(3);

        $home = Home::find(1);


        if(count($teams) >= 2)
            $teams = $teams->random(2);

        $leaders = Team::all()->where('teamleader','=','Oui');
        
        
        return view('index',compact('actif','servicesTop','services','medias','home','testimonials','teams','leaders','contact','bouton'));

    }

    public function services(){
        //Je fais passer le nom pour pourvoir dynamiser chemin.blade
        // qu'il afficher le nom de la page acutel
        $name = "Services";
        $actif = "services";
        $services = DB::table('services')->paginate(9);
        $projets = Projet::all();
        $bouton = Bouton::find(1);
        $smartphone = Service::select('*')->orderBy('id','desc')->get();

        if(count($projets)>=3)
            $projets = $projets->random(3);

        return view('service',compact('name','actif','services','projets','bouton','smartphone'));
    }

    public function blog(){
        $name = "Blog";
        $actif = "blog";
    
        $articles = Article::where('etat','=','Publié')->orderBy('id','desc')->paginate(3);
        $tags = Tag::all();
        $articleTags = ArticleTag::all();
        $users = User::all();
        $commentaires = Commentaire::all();
        $categories = Categorie::all();
    
        return view('blog',compact('name','actif','articles','tags','users','articleTags','commentaires','categories'));
    }

    public function blogPost($id,$slug) {
        $name = "Blog";
        $actif = "blog";
    
        $article = Article::find($id);
        $tags = Tag::all();
        $articleTags = ArticleTag::all();
        $users = User::all();
        $categories = Categorie::all();
        $commentaires = Commentaire::where('id_article','=',$article->id)
            ->orderBy('id','desc')
            ->paginate(5);  
        
    
        return view('blogPost',compact('name','actif','article','tags','users','articleTags','commentaires','categories'));
    }

    public function contact(){
        //Je fais passer le nom pour pourvoir dynamiser chemin.blade
        // qu'il afficher le nom de la page acutel
        $name = "Contact";
        $actif = "contact";

        return view('contact',compact('name','actif'));
    }


}
