<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalestra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palestra', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 100);
            $table->longText('conteudo')->nullable();
            $table->integer('evento_id');
            $table->integer('palestrante_id');
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
        Schema::dropIfExists('palestra');
    }
}
