<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Article;
use App\Tag;
use App\ArticleTag;
use App\Categorie;
use App\Commentaire;
use App\User;


class SearchController extends Controller
{
    public function word(){
        $name = "Blog";
        $actif = "blog";
    

        $input = request()->input('query');
        
    
        if($input == null){
            $articles = null;
            $errors = "Il n'y a rien avec le mot '".$input."'";
            return redirect(url('/blog'))->withErrors($errors);
        }
    
        
        $articles = Article::where('titre','like','%'.$input.'%')->orderBy('id','desc')
            ->paginate(3);
        //permet d'ajouter les liens de la pagination
        $articles->appends(['query' => request()->input('query')]);
    
        
    
        $tags = Tag::all();
        $articleTags = ArticleTag::all();
        $users = User::all();
        $commentaires = Commentaire::all();
        $categories = Categorie::all();
    
        if(count($articles) == null){
            $errors = "Il n'y a rien avec le mot '".$input."'";
            return view('blog',compact('name','actif','articles','tags','users','articleTags','commentaires','categories'))->withErrors($errors);
        }
    
        return view('blog',compact('name','actif','articles','tags','users','articleTags','commentaires','categories'));
    }

    public function category($url){


        $name = "Blog";
        $actif = "blog";

        $categorie = Categorie::where('nom','=',$url)->get()->first();
        
        $articles = Article::where('id_categorie','=',$categorie->id)->orderBy('id','desc')->paginate(3);
        //permet d'ajouter les liens de la pagination
        $articles->appends(['search' => $url]);
        
        
        $tags = Tag::all();
        $articleTags = ArticleTag::all();
        $users = User::all();
        $commentaires = Commentaire::all();
        $categories = Categorie::all();
        
        if(count($articles) == null){
            $errors = "Il n'y a rien avec le mot \"".$url."\"";
            return view('blog',compact('name','actif','articles','tags','users','articleTags','commentaires','categories'))->withErrors($errors);
        }
        

        return view('blog',compact('name','actif','articles','tags','users','articleTags','commentaires','categories'));
    }

    public function tag($url,Request $request){
        $name = "Blog";
        $actif = "blog";
        
        $articles = Tag::find($url)->articles;

        // Permet de créer une pagination
        $articles = new LengthAwarePaginator(
            // Passer les articles a afficher
            // forPage affiche par page (la page en question, nombre d'article)
            ($articles->reverse())->forPage($request->page,3),
            // Nombre total des articles
            $articles->count(), 
            // Nombre par page
            3,
            // Page courant (la page de blog) 
            LengthAwarePaginator::resolveCurrentPage(), 
            // En options, on donne le path pour permettre de naviguer avec le paginate
            ['path'=>route('searchByTag',$url)]
        );

        $articles->appends(['tag' => $url]);


        $tags = Tag::all();
        $articleTags = ArticleTag::all();
        $users = User::all();
        $commentaires = Commentaire::all();
        $categories = Categorie::all();
    
        
    
        if(count($articles) == 0){
            $articles = Article::where('etat','=','Publié')->orderBy('id','desc')->paginate(3);
            $tag = Tag::find($url);
            $errors = "Il n'y a rien avec le mot '".$tag->nom."'";
            return view('blog',compact('name','actif','articles','tags','users','articleTags','commentaires','categories'))->withErrors($errors);
        }
        
        
        return view('blog',compact('name','actif','articles','tags','users','articleTags','commentaires','categories'));
    }


}
