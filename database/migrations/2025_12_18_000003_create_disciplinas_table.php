<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinasTable extends Migration
{
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->increments('disciplina_id');
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->string('nome_disciplina', 255);
            $table->string('tema_revisao', 255);
            $table->date('data_entrada');
            $table->foreign('usuario_id')->references('usuario_id')->on('usuarios');
        });
    }

    public function down()
    {
        Schema::drop('disciplinas');
    }
}