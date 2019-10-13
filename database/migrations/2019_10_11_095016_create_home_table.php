<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('logo',125);
            $table->string('logo_carousel',125);
            $table->string('texte_carousel',125);
            $table->string('texte_gauche',125);
            $table->string('texte_droite',125);
            $table->string('url_video',125);
            $table->string('titre_browse',50);
            $table->string('text_browse');
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
        Schema::dropIfExists('home');
    }
}
