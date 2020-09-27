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
//Model
use App\User;
use App\Article;
use App\Newsletter;
//Mail
use App\Mail\ArticleNew;
use App\Mail\SendMessage;
use App\Mail\WelcomeNewsletter;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\MessageRequest;
use App\Http\Requests\NewsletterRequest;

//View Labs
Route::get('/','PageController@index')->name('index');
Route::get('/service', 'PageController@services');
Route::get('/blog', 'PageController@blog');
Route::get('/post/{id}/{slug}', 'PageController@blogPost')->name('post.show');
Route::resource('commentaires','CommentaireController');
Route::post('/post/{article}/commentaire','CommentaireController@store');
Route::delete('/post/{article}/commentaire','CommentaireController@destroy');
Route::get('/contact', 'PageController@contact');


//Route pour faire une query pour chercher un mot clé dans le titre d'article
Route::get('/search','SearchController@word');
//Route pour faire une query pour chercher les articles via une categorie
Route::get('/search/{categorie}','SearchController@category');
//Route pour faire une query pour chercher les articles via un tag
Route::get('/search/tag/{tag}','SearchController@tag')->name('searchByTag');


//Back Office
Auth::routes();
Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
Route::get('/home/info','InfoController@edit')->name('info.edit')->middleware('auth');
Route::put('/home/info','InfoController@update')->name('info.update')->middleware('auth');


//Admin
Route::resource('admin/bouton','BoutonController')->middleware('can:admin');
Route::get('admin/home','HomeController@edit')->name('home.edit')->middleware('can:admin');
Route::put('admin/home','HomeController@update')->name('home.update')->middleware('can:admin');
Route::resource('admin/users','UserController')->middleware('can:admin');
Route::resource('admin/services','ServicesController')->middleware('can:admin');
Route::resource('admin/projets','ProjetsController')->middleware('can:admin');
Route::resource('admin/medias','MediasController')->middleware('can:admin');
Route::resource('admin/testimonials','TestimonialsController')->middleware('can:admin');
Route::resource('admin/teams','TeamsController')->middleware('can:admin');
Route::get('admin/contact','ContactController@edit')->name('contact.edit')->middleware('can:admin');
Route::put('admin/contact','ContactController@update')->name('contact.update')->middleware('can:admin');
Route::get('admin/articles/validation','ArticleController@validations')->name('article.validation')->middleware('can:admin');
Route::put('/articles/nonValide/{article}','ArticleController@userModif')->name('articles.userModif')->middleware('can:admin');

//Editeur
Route::resource('tags','TagController')->middleware('auth');
Route::resource('articles','ArticleController')->middleware('auth');
Route::resource('categories','CategorieController')->middleware('auth');

Route::post('/sendMessage', function(MessageRequest $request){

    Mail::to('labs@admin.com')
    ->send(new SendMessage($request));

    $message = "Merci de votre message";

    return redirect()->back()->with('msg',$message);

});


//Envoi de mail
Route::get('/sendNewArticle/{id}',function(){

    $users = User::all();

       
    function envoi($user){
        $article = Article::find(request('id'));
        Mail::to($user)->send(new ArticleNew($article));
    }

    foreach($users as $user){
        if($user->role == 'admin')
            envoi($user->email);
    }
    
    $newsletters = Newsletter::all();

    foreach($newsletters as $newsletter){
        envoi($newsletter->email);
    }

    return redirect(route('articles.index'));

});

//Route pour la validation est à true et envoi un mail a chaque user
Route::put('article/{article}/valider',function(Article $article){
    
    $article->etat = "Publié";

    $article->save();

    // Envoi de mail quand l'article est validé
    $users = User::all();

    foreach($users as $user){
        if($user->role == 'admin')
        Mail::to($user->email)->send(new ArticleNew($article));
        // sleep(5);
    }

    $newsletters = Newsletter::all();

    foreach($newsletters as $newsletter){
        Mail::to($newsletter->email)->send(new ArticleNew($article));
        // sleep(5);
    }
    
    return redirect(route('articles.index'));

})->middleware('can:admin');


    

//Newsletter
Route::post('/newsletter',function(NewsletterRequest $request){
    $newsletter = new Newsletter();

    $newsletter->email = $request->input('mail');

    $newsletter->save();

    Mail::to(request()->input('mail'))->send(new WelcomeNewsletter($request));

    return redirect()
        ->back()
        ->with('newsletter','Merci d\'être inscrit à la newsletter')
        ->withErrors('newsletter','Erreur');

});

