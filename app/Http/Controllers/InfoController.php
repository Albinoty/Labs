<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InfoRequest;
use Illuminate\Support\Facades\Storage;
use App\User;

class InfoController extends Controller
{
    public function edit(){

        $user = User::find(auth()->user()->id);
        
        return view('admin.info',compact('user'));   

    }
    public function update(InfoRequest $request){

        $user = User::find(auth()->user()->id);

        $user->name = $request->input('nom');
        $user->bio = $request->input('bio');
    

        //Si l'user met une image et qu'il a deja une photo existant
        if($request->file('img_user') != null && $user->img_user != null){
            $request->validate(['img_user'=>'image'],['img_user.image' => 'Le fichier doit etre une image']);
            Storage::delete($user->img_user);
            $user->img_user = $request->file('img_user')->store('img');
        }
        //Si l'user met une image et qu'il en à pas par défaut
        else if($request->file('img_user') != null && $user->img_user == null){
            $request->validate(['img_user'=>'image'],['img_user.image' => 'Le fichier doit etre une image']);
            $user->img_user = $request->file('img_user')->store('img');
        }
        // Sinon on mets null et par défaut on affiche un john doe
        else
            $user->img_user = null;
        
    
        $user->save();
    
        return redirect()->route('home');
    }
}
