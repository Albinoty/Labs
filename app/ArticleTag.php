<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ArticleTag extends Pivot
{
    protected $table = 'article_tags';
}
