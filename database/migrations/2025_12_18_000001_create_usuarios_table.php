<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('usuario_id');
            $table->string('usuario_nome', 255);
            $table->string('senha', 255);
            $table->integer('adminxuser')->default(0);
        });
    }

    public function down()
    {
        Schema::drop('usuarios');
    }
}