<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 100);
            $table->date('date_ini');
            $table->date('date_fim');
            $table->longText('programa')->nullable();
            $table->string('local', 100)->nullable();
            $table->string('tipo', 100)->nullable();
            $table->string('endereco', 100)->nullable();
            $table->string('numero', 100)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cidade', 100)->nullable();
            $table->string('uf', 100)->nullable();
            $table->string('cep', 100)->nullable();
            $table->string('site', 100)->nullable();
            $table->string('contato', 100)->nullable();
            $table->string('telefone', 100)->nullable();
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
        Schema::dropIfExists('evento');
    }
}
