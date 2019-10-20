<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TestimonialRequest;

class TestimonialsController extends Controller
{
    public static function storageFile(TestimonialRequest $request, $testimonial){

        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = $file->store(env('IMG_DIR'));
            $testimonial->image = $filename;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('admin.testimonialsIndex',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonialCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        $testimonial = new Testimonial();

        $testimonial->auteur = $request->input('auteur');
        $testimonial->fonction = $request->input('fonction');
        $testimonial->texte = $request->input('texte');
    
        $this->storageFile($request,$testimonial);

        $testimonial->save();

        return redirect(route('testimonials.index'));

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
        $testimonial = Testimonial::find($id);

        return view('admin.testimonialEdit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, $id)
    {
        $testimonial = Testimonial::find($id);

        $testimonial->auteur = $request->input('auteur');
        $testimonial->fonction = $request->input('fonction');
        $testimonial->texte = $request->input('texte');
    
        if($request->image !=null){
            Storage::delete($testimonial->image);
            $this->storageFile($request,$testimonial);
        }

        $testimonial->save();

        return redirect(route('testimonials.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);

        Storage::delete($testimonial->image);
        $testimonial->delete();

        return redirect(route('testimonials.index'));
    }
}
