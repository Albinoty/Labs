<?php

namespace App\Http\Controllers;

use App\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProjetRequest;


class ProjetsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = Projet::all();

        return view('admin.projet.index',compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjetRequest $request)
    {
        $request->validate(['image'=>'required|image'],['image.required' => 'Le choix d\'une image est obligatoire']);

        $projet = new Projet();

        $projet->titre = $request->input('titre');
        $projet->description = $request->input('description');
        $projet->image = $request->file('image')->store('img/projets');


        $projet->save();

        return redirect('/home/projets');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Projet $projet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        $projet::find($projet->id);

        return view('admin.projet.edit',compact('projet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(ProjetRequest $request, Projet $projet)
    {
        $projet::find($projet->id);
        Storage::delete($projet->image);

        $projet->nom = $request->input('nom');
        $projet->description = $request->input('description');
        $projet->image = $request->file('image')->store('img/projets');

        $projet->save();

        return redirect('/home/projets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        Storage::delete($projet->image);
        $projet::find($projet->id)->delete();

        return redirect()->back();
    }
}
