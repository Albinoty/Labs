<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_categories', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_article')->unsigned();
            $table->foreign('id_article')
                ->on('articles')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('id_categorie')->unsigned();
            $table->foreign('id_categorie')
                ->on('categories')
                ->references('id')
                ->onDelete('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_categories');
    }
}
