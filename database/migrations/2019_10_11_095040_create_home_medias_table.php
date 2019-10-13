<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_medias', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_media')->unsigned();
            $table->foreign('id_media')
                ->on('medias')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('id_home')->unsigned();
            $table->foreign('id_home')
                ->on('home')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('home_medias');
    }
}
