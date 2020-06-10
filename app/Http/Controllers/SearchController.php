<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
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
    

        $input = request()->input('search');
        
    
        if($input == null){
            $articles = null;
            $errors = "Il n'y a rien avec le mot '".$input."'";
            return redirect(url('/blog'))->withErrors($errors);
        }
    
        
        $articles = Article::where('titre','like','%'.$input.'%')->orderBy('id','desc')
            ->paginate(3);
        //permet d'ajouter les liens de la pagination
        $articles->appends(['search' => request()->input('search')]);
    

    
        $tags = Tag::all();
        $articleTags = ArticleTag::all();
        $users = User::all();
        $commentaires = Commentaire::all();
        $categories = Categorie::all();
    
        if(count($articles) == null){
            $errors = "Il n'y a rien avec le mot '".$input."'";
            return view('blog',compact('name','actif','articles','tags','users','articleTags','commentaires','categories'))->withErrors($errors);
        }
        else if(count($articles) == 1){
            $article = $articles[0];
            $commentaires = Commentaire::where('id_article','=',$article->id)
            ->orderBy('id','desc')
            ->paginate(5);   

            return redirect()->route("post.show",[$article->id,$article->slug]);
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

    public function tag($url){
        $name = "Blog";
        $actif = "blog";
        
        
        $articles = (DB::select('select * from articles AS A, article_tags as AT, tags as T where T.id  = '.$url.' and AT.tag_id = T.id and AT.article_id = A.id ORDER BY A.id DESC'));



     

            // dd($articles);        
    
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
