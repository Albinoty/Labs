<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bouton;
use App\Http\Requests\BoutonRequest;

class BoutonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bouton = Bouton::find(1);

        if($bouton !== null)
            return view('admin.bouton',compact('bouton'));
        else
            return view('admin.bouton');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BoutonRequest $request, $id)
    {
        $bouton = Bouton::all();

        if(count($bouton) === 0){
            $bouton = new Bouton();

            $bouton->texte = $request->input('texte');

            $bouton->save();

        }
        else{
            $bouton = Bouton::find($id);

            $bouton->texte = $request->input('texte');

            $bouton->save();
        }

        return redirect(url('/home'));
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
