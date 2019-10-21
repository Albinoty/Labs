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
//Modem
use App\User;
use App\Projet;
use App\Article;
use App\Tag;
use App\ArticleTag;
use App\Commentaire;
use App\Categorie;
use App\Bouton;
use App\Newsletter;
//Mail
use App\Mail\ArticleValidation;
use App\Mail\ArticleNew;
use App\Mail\SendMessage;
use App\Mail\WelcomeNewsletter;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Request;


//View Labs
Route::get('/','HomeController@index')->name('index');

Route::get('/service', function(){
    //Je fais passer le nom pour pourvoir dynamiser chemin.blade
    // qu'il afficher le nom de la page acutel
    $name = "Services";
    $actif = "services";
    $services = DB::table('services')->paginate(9);
    $projets = Projet::all();
    $bouton = Bouton::find(1);

    if(count($projets)>=3)
        $projets = $projets->random(3);

    return view('service',compact('name','actif','services','projets','bouton'));
});

Route::get('/blog', function(){
    $name = "Blog";
    $actif = "blog";

    $articles = Article::where('etat','=','Publié')->orderBy('id','desc')->paginate(3);
    $tags = Tag::all();
    $articleTags = ArticleTag::all();
    $users = User::all();
    $commentaires = Commentaire::all();
    $categories = Categorie::all();

    return view('blog',compact('name','actif','articles','tags','users','articleTags','commentaires','categories'));
});

Route::get('/blog-post/{id}', function(){
    $name = "Blog";
    $actif = "blog";

    $article = Article::find(request('id'));
    $tags = Tag::all();
    $articleTags = ArticleTag::all();
    $users = User::all();
    $categories = Categorie::all();
    $commentaires = Commentaire::where('id_article','=',$article->id)
        ->orderBy('id','desc')
        ->paginate(5);  
    

    return view('blogPost',compact('name','actif','article','tags','users','articleTags','commentaires','categories'));
});

Route::resource('commentaires','CommentaireController');
Route::post('/blog-post/{id}/commentaire','CommentaireController@store');
Route::delete('/blog-post/{id}/commentaire/delete','CommentaireController@destroy');

Route::get('/contact', function(){
    //Je fais passer le nom pour pourvoir dynamiser chemin.blade
    // qu'il afficher le nom de la page acutel
    $name = "Contact";
    $actif = "contact";

    return view('contact',compact('name','actif'));
});

//Route pour faire une query pour chercher un mot clé dans le titre d'article
Route::get('/search',function (){
    
    $name = "Blog";
    $actif = "blog";

    $articles = Article::where('titre','like','%'.request()->input('search').'%')
        ->paginate(3);
    //permet d'ajouter les liens de la pagination
    $articles->appends(['search' => request()->input('search')]);


    // dd('%'.request()->input('search').'%');

    $tags = Tag::all();
    $articleTags = ArticleTag::all();
    $users = User::all();
    $commentaires = Commentaire::all();
    $categories = Categorie::all();

    if(count($articles) == null){
        $errors = "Il n'y a rien avec le mot '".request()->input('search')."'";
        return view('blog',compact('name','actif','articles','tags','users','articleTags','commentaires','categories'))->withErrors($errors);
    }

    return view('blog',compact('name','actif','articles','tags','users','articleTags','commentaires','categories'));
});

Route::put('/home/info/update',function(){
    $user = User::find(auth()->user()->id);

    $user->name = request()->input('nom');
    $user->bio = request()->input('bio');

    //Si l'user ne mets rien et dans la db ya rien
    if(request()->hasfile('img_user') == null && $user->img_user == null){

        $user->img_path = 'img/avatar/john-doe.png';

    }
    // Si l'user met une photo mais qu'il n'a rien dans la db
    else if(request()->hasfile('img_user') && $user->img_user == null){
        $file = request()->file('img_user');
        $filename = $file->store(env('IMG_DIR'));
        $user->img_user = $filename;
    }
    // sinon on supprime dans le storage l'image et on mets le nv path de l'image
    else {
        Storage::delete($user->img_user);
        $file = request()->file('img_user');
        $filename = $file->store(env('IMG_DIR'));
        $user->img_user = $filename;
    }

    $user->save();

    return redirect(url('/home'));

});

//Back Office
Route::get('/home', function() {
    $user = User::find(auth()->user()->id);
    return view('home', compact('user'));
})->name('home')->middleware('auth');

Auth::routes();
//Passer le auth et le role  pour determiner qui se connecte


Route::post('/sendMessage', function(){
    
    Mail::to('labs@admin.com')
    ->send(new SendMessage(request()));

    $message = "Merci de votre message";

    return redirect()->back()->with('msg',$message);

});


Route::middleware(['auth','IsAdmin'])->group(function (){

    Route::get('/home/info',function(){
        $user = User::find(auth()->user()->id);
        return view('admin.adminInfo',compact('user'));    
    });

    Route::resource('bouton','BoutonController');

    Route::resource('users','UserController');

    Route::get('/home/index/edit','HomeController@edit');
    Route::put('/home/index/update','HomeController@update');

    Route::resource('services','ServicesController');
    Route::get('/home/services','ServicesController@index');

    Route::resource('projets','ProjetsController');
    Route::get('/home/projets','ProjetsController@index');

    Route::resource('medias','MediasController');
    Route::get('/home/medias','MediasController@index');

    Route::resource('testimonials','TestimonialsController');
    Route::get('/home/testimonials','TestimonialsController@index');

    Route::resource('teams','TeamsController');
    Route::get('/home/teams','TeamsController@index');

    Route::get('/home/contact/edit','ContactController@edit');
    Route::put('/home/contact/update','ContactController@update');

    Route::get('/articles/validation',function(){

        $articles = Article::where('etat','=','Pending')->get();

        return view('admin.articleValidation',compact('articles'));

    });

    //Envoi de mail
    Route::get('/sendNewArticle',function(){

        $users = User::all();

        foreach($users as $user){
            Mail::to($user->email)->send(new ArticleNew(request()));
            sleep(5);
        }
        
        $newsletters = Newsletter::all();

        foreach($newsletters as $newsletter){
            Mail::to($newsletter->email)->send(new ArticleNew(request()));
            sleep(5);
        }

        return redirect(route('articles.index'));

    });

    //Route pour la validation est à true et envoi un mail a chaque user
    Route::put('article/{id}/valider',function(){
        
        $article = Article::find(request('id'));
        $article->etat = "Publié";

        $article->save();

        // Envoi de mail quand l'article est validé
        $users = User::all();

        foreach($users as $user){
            Mail::to($user->email)->send(new ArticleNew(request()));
            sleep(5);
        }

        $newsletters = Newsletter::all();

        foreach($newsletters as $newsletter){
            Mail::to($newsletter->email)->send(new ArticleNew(request()));
            sleep(5);
        }
        
        return redirect(route('articles.index'));

    });

});

Route::middleware(['auth','IsEditeur'])->group(function(){
    Route::resource('tags','TagController');
    Route::get('/home/tags','TagController@index');
    
    Route::resource('articles','ArticleController');
    Route::get('/home/articles','ArticleController@index');
    
    Route::resource('categories','CategorieController');
    Route::get('/home/catergories','CategorieController@index');
    
    Route::put('/articleTag/{$tag}','ArticleTagController@store');
});

//Newsletter
Route::post('/newsletter',function(){
    $newsletter = new Newsletter();

    $newsletter->email = request()->input('email');

    $newsletter->save();

    Mail::to(request()->input('email'))->send(new WelcomeNewsletter(request()));

    return redirect()->back();

});