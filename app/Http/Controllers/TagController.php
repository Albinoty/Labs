<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Http\Requests\TagRequest;
use Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $user = Auth::user();

        $this->authorize('create',Tag::class);

        $tags = Tag::all(); 

        return view('admin.tag.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $this->authorize('create',Tag::class);

        $tag = New Tag();

        //Verification si le tag existe
        $tags = Tag::where('nom','like','%'.$request->input('nom').'%')->get();
        if(count($tags) > 0)
            return redirect()->back()->withErrors("Ce tag existe deja");

        //Verification si la limite est depassé
        $tag = Tag::all();
        if(count($tags >= 6))
            return redirect()->back()->withErrors("Ce tag existe deja");

        $tag->nom = $request->input('nom');

        $tag->save();

        return redirect()->route('tags.index');

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
        $this->authorize('update',Tag::class);

        $tag = Tag::find($id);

        return view('admin.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $this->authorize('create',Tag::class);

        $tag = Tag::find($id);

        $tag->nom = $request->input('nom');

        $tag->save();

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete',Tag::class);

        Tag::find($id)->delete();

        return redirect()->route('tags.index');
    }
}
