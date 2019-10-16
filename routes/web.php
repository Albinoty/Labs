<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Projet;


//View Labs
Route::get('/','HomeController@index')->name('index');

Route::get('/service', function(){
    //Je fais passer le nom pour pourvoir dynamiser chemin.blade
    // qu'il afficher le nom de la page acutel
    $name = "Services";
    $actif = "services";
    $services = DB::table('services')->paginate(9);
    $projets = Projet::all();

    if(count($projets)>=3)
        $projets = $projets->random(3);

    return view('service',compact('name','actif','services','projets'));
});

Route::get('/blog', function(){
    $name = "Blog";
    $actif = "blog";

    return view('blog',compact('name','actif'));
});

Route::get('/blog-post', function(){
    $name = "Blog";
    $actif = "blog";

    return view('blogPost',compact('name','actif'));
});

Route::get('/contact', function(){
    //Je fais passer le nom pour pourvoir dynamiser chemin.blade
    // qu'il afficher le nom de la page acutel
    $name = "Contact";
    $actif = "contact";

    return view('contact',compact('name','actif'));
});

//Back Office
Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();
//Passer le auth et le role  pour determiner qui se connecte


Route::get('/home/index/edit','HomeController@edit');
Route::put('/home/index/update','HomeController@update');

Route::resource('services','ServicesController')->middleware('auth');
Route::get('/home/services','ServicesController@index')->middleware('auth');

Route::resource('projets','ProjetsController')->middleware('auth');
Route::get('/home/projets','ProjetsController@index')->middleware('auth');

Route::resource('medias','MediasController')->middleware('auth');
Route::get('/home/medias','MediasController@index')->middleware('auth');

Route::resource('testimonials','TestimonialsController')->middleware('auth');
Route::get('/home/testimonials','TestimonialsController@index')->middleware('auth');

Route::resource('teams','TeamsController')->middleware('auth');
Route::get('/home/teams','TeamsController@index')->middleware('auth');

Route::get('/home/contact/edit','ContactController@edit');
Route::put('/home/contact/update','ContactController@update');