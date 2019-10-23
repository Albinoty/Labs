<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commentaire;
use Auth;
use App\Article;
use App\Http\Requests\CommentaireRequest;


class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentaireRequest $request)
    {

        $commentaire = new Commentaire();

        if(Auth::user()!=null){
            $user = Auth::user();
            
            $commentaire->nom = $user->name;
            $commentaire->email = $user->email;
            
            if($user->img_user == null){
                $commentaire->img_user = 'img/avatar/john-doe.png';
            }
            else{
                $commentaire->img_user = $user->img_user;
            }

            $commentaire->commentaire = $request->input('message');
            $commentaire->id_article = request('id');

            $commentaire->save();

        }
        else{
            
            $commentaire->nom = $request->input('name');
            $commentaire->email = $request->input('email');
            $commentaire->img_user = 'img/avatar/john-doe.png';
            $commentaire->commentaire = $request->input('message');
            $commentaire->id_article = request('id');

            $commentaire->save();
        }

        return redirect(url('/blog-post/'.request('id')));
        
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
        $commentaire = Commentaire::find($id);

        $commentaire->delete();

        return redirect()->back();
    }
}
