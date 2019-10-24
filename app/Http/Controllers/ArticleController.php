<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\ArticleTag;
use App\Categorie;
use App\Tag;
use Auth;
use Storage;
use App\Mail\ArticleValidation;
use App\Mail\ArticleNew;
use App\Mail\EditionArticle;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function storageFile(ArticleRequest $request, $article){
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = $file->store(env('IMG_DIR'));
            $article->img_article = $filename;
        }
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

        return view('admin.articlesIndex',compact('articles','articleTags','tags','categories','users'));
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

        return view('admin.articleCreate',compact('categories','tags'));
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
        $article->texte = $request->input ('texte');
        $article->id_user = $user->id;
        $article->id_categorie = $categorie->id;
        
        if(auth()->user()->role == "admin")
            $article->etat = "Publié";
        else
            $article->etat = "Pending";

        $this->storageFile($request,$article);
        
        $article->save();

        $article = Article::orderBy('id','desc')
            ->where('id_user','=',Auth::user()->id)
            ->first();

        foreach($request->input('tags') as $tag){
           $article->tags()->attach($tag);
           $article->save();
        }
        //Si l'user qui créé un poste est un editeur, envoi un mail chez l'admin
        if(auth()->user()->role == "editeur")
            Mail::to('exemple@exmple.com')->send(new ArticleValidation($user));
        else
            return redirect(url('/sendNewArticle'));

        return redirect(route('articles.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        $articleTags = ArticleTag::all()->where('article_id','=',$id);
        
        $tags = Tag::all();

        $categories = Categorie::all();

        return view('admin.articleEdit',compact('article','articleTags','tags','categories'));
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

    public function userModif($id){
        $article = Article::find($id);

        $user = User::all()->where('id','=',$article->id_user);

        $article->etat = "Non Publié";

        $article->save();

        Mail::to($user[1]->email)->send(new EditionArticle(request()));

        return redirect(route('articles.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        Storage::delete($article->img_article);
        
        $articleTags = ArticleTag::all()->where('article_id','=',$id);

        foreach($articleTags as $tag){
            $article->tags()->detach($tag);
        }

        $article->delete();

        return redirect(route('articles.index'));

    }
}
