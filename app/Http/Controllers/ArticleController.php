<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\ArticleTag;
use App\Categorie;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Storage;
use App\Mail\ArticleValidation;
use App\Mail\ArticleNew;
use App\Mail\EditionArticle;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Str;

class ArticleController extends Controller
{

    public function __construct()
    {

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->role == 'admin')
            $articles = Article::orderBy('id','desc')->paginate(5);
        else
            $articles = Article::where('id_user','=',Auth::user()->id)->orderBy('id','desc')->paginate(5);
        $articleTags = ArticleTag::all();
        $tags = Tag::all();
        $categories = Categorie::all();
        $users = User::all();

        return view('admin.article.index',compact('articles','articleTags','tags','categories','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        $tags = Tag::all();

        return view('admin.article.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = new Article();

        $user = User::find(Auth::user()->id);
        $categorie = Categorie::find($request->input('categorie'));

        $article->titre = $request->input('titre');
        $article->slug = Str::slug($request->input('titre'),"-");
        $article->texte = $request->input ('texte');
        $article->img_article = $request->file('image')->store('img/articles');
        $article->id_user = $user->id;
        $article->id_categorie = $categorie->id;
        
        if(auth()->user()->role == "admin")
            $article->etat = "Publié";
        else
            $article->etat = "Pending";
        
        $article->save();

        $article = Article::orderBy('id','desc')
            ->where('id_user','=',Auth::user()->id)
            ->first();

        foreach($request->input('tags') as $tag){
           $article->tags()->attach($tag);
           $article->save();
        }

    

        //Si l'user qui créé un poste est un editeur, envoi un mail chez l'admin
        // if(auth()->user()->role == "editeur")
        //     Mail::to('exemple@exmple.com')->send(new ArticleValidation($user));
        // else
        //     return redirect(url('/sendNewArticle',$article->id));

        return redirect(route('articles.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return redirect()->route('article.show',$article->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

        $this->authorize('update',$article);

        $articleTags = ArticleTag::all()->where('article_id','=',$article->id);
        
        $tags = Tag::all();

        $categories = Categorie::all();

        return view('admin.article.edit',compact('article','articleTags','tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        

        $user = User::find(Auth::user()->id);
        $categorie = Categorie::find($request->input('categorie'));

        $article->titre = $request->input('titre');
        $article->texte = $request->input('texte');
        $article->id_user = $user->id;
        $article->id_categorie = $categorie->id;
        
        
        if($request->hasfile('image') != null){
            Storage::delete($article->img_article);
            $this->storageFile($request,$article);
        }
        

        if($article->etat == "Non Publié")
            $article->etat = "Pending";
        else if($article->etat == "Pending" && Auth::user()->role == "admin")
            $article->etat = "Publié";

        $article->save();   
        
        $articleTags = ArticleTag::all()->where('article_id','=',$id);

        $article = Article::find($id);

        foreach($articleTags as $tag){
            $tag->delete();
        }

    
        foreach($request->input('tags') as $tag){
            $article->tags()->attach($tag);
            $article->save();
        }

        return redirect(route('articles.index'));
    }

    public function userModif(Article $article){

        $user = User::all()->where('id','=',$article->id_user);

        $article->etat = "Non Publié";

        $article->save();

        Mail::to($user[1]->email)->send(new EditionArticle(request()));

        return redirect(route('articles.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article  $article)
    {

        $this->authorize('update',$article);


        Storage::delete($article->img_article);
        
        $articleTags = ArticleTag::all()->where('article_id','=',$article->id);

        foreach($articleTags as $tag){
            $article->tags()->detach($tag);
        }

        $article->delete();

        return redirect(route('articles.index'));

    }

    public function validations(){
        $articles = Article::where('etat','=','Pending')->get();

        return view('admin.article.validation',compact('articles'));
    }


}
