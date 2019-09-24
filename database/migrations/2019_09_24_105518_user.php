<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $new) {
            $new->bigIncrements('id');
            $new->string('username', 50);
            $new->string('password', 100);
            $new->rememberToken();
            $new->integer('people_id');
            $new->integer('type');
            $new->char('status');
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
        Schema::dropIfExists('users');
    }
}
