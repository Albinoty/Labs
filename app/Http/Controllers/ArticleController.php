<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\ArticleTag;
use App\Categorie;
use App\Tag;
use Auth;

class ArticleController extends Controller
{
    public function storageFile(Request $request, $article){
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = $file->store(env('IMG_DIR'));
            $article->img_path = $filename;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return view('admin.articlesView');
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
    public function store(Request $request)
    {
        $article = new Article();
        

        $user = User::find(Auth::user()->id);
        $categorie = Categorie::find($request->input('categorie'));

        $article->nom = $request->input('titre');
        $article->texte = $request->input ('texte');
        $article->id_user = $user->id;
        $article->id_categorie = $categorie->id;
        

        $this->storageFile($request,$article);
        

        // dd($article);

        $article->save();

        // $this->couille();

        // return redirect(url('articleTag'));

        // foreach($request->input('tags') as $tag){
        //     $articleTag->id_tag = $tag
            
        // }

    }

    public function couille(){
        // $article = Article::all();

        // dd($article);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
