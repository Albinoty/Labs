<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Http\Requests\CategorieRequest;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();

        return view('admin.categorie.index',compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->authorize('create', Categorie::class);

        $categories = Categorie::all();

        return view('admin.categorie.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorieRequest $request)
    {
        $this->authorize('create', Categorie::class);

        $categorie = new Categorie();

        $categories = Categorie::where('nom','like','%'.$request->input('nom').'%')->get();

        
        if(count($categories) > 0)
            return redirect()->back()->withErrors("Cette categorie existe deja");

        $categorie->nom = $request->input('nom');

        $categorie->save();

        return redirect(route('categories.index'));

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
     * @param  Categorie  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Categorie::class);
        
        $categorie = Categorie::find($id);

        $this->authorize('update', $categorie);

        return view('admin.categorie.edit',compact('categorie'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategorieRequest $request, $id)
    {
    
        $categorie = Categorie::find($id);

        $this->authorize('delete', $categorie);

        $categorie->nom = $request->input('nom');

        $categorie->save();

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $this->authorize('delete', $categorie);

        $categorie->delete(); 

        return redirect(route('categories.index'));
    }
}
