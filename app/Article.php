<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function tags(){
        return $this->belongsToMany('App\Tag','article_tags');
    }

    public function utilisateur(){
        return $this->belongsTo('App\User');
    }

}
