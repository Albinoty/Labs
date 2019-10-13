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

use App\Service;

Route::get('/', function () {

    $actif = "home";

    return view('index',compact('actif'));
});

Route::get('/service', function(){
    //Je fais passer le nom pour pourvoir dynamiser chemin.blade
    // qu'il afficher le nom de la page acutel
    $name = "Services";
    $actif = "services";
    $services = DB::table('services')->paginate(9);

    return view('service',compact('name','actif','services'));
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

Auth::routes();
//Passer le auth et le role  pour determiner qui se connecte

Route::resource('services','ServicesController');

Route::get('/home/services','ServicesController@index');

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
