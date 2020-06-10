<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use App\Http\Requests\CarouselRequest;
use Illuminate\Support\Facades\Storage;

class MediasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::all();

        return view('admin.carousel.index',compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarouselRequest $request)
    {
        $media = new Media();

        $media->titre = $request->input('titre');
        $media->img_path = $request->file('image')->store('img/carousel');

        $media->save();

        return redirect(route('medias.index'));

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
        $media = Media::find($id);

        return view('admin.carousel.edit',compact('media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarouselRequest $request, $id)
    {


        $media = Media::find($id);

        Storage::delete($media->img_path);
        $media->titre = $request->input('titre');

        $this->storageFile($request, $media);

        $media->save();

        return redirect(route('medias.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        Storage::delete($media->img_path);
        Media::find($media->id)->delete();
        

        return redirect(route('medias.index'));
    }
}
