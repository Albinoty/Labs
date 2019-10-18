<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_tags', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('article_id')->unsigned();
            $table->foreign('article_id')
                ->on('articles')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')
                ->on('tags')
                ->references('id')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('article_tags');
    }
}
