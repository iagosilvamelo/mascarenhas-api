<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class People extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $new) {
            $new->bigIncrements('id');
            $new->string('nome', 50);
            $new->string('type', 100);
            $new->string('endereco')->nullable();
            $new->string('numero')->nullable();
            $new->string('complemento')->nullable();
            $new->string('bairro')->nullable();
            $new->string('uf')->nullable();
            $new->string('cep')->nullable();
            $new->string('email')->nullable();
            $new->string('fone')->nullable();
            $new->string('celular')->nullable();
            $new->date('nascimento')->nullable();
            $new->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
