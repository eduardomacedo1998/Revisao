<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisoesTable extends Migration
{
    public function up()
    {
        Schema::create('revisoes', function (Blueprint $table) {
            $table->increments('revisao_id');
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->integer('disciplina_id')->unsigned()->nullable();
            $table->date('data_revisao');
            $table->integer('numero_revisoes')->default(0);
            $table->integer('dias_proxima_revisao');
            $table->string('observacao', 255)->nullable();
            $table->string('conteudo', 255)->nullable();
            $table->string('link_revisao', 255)->default('vazio');
            $table->foreign('usuario_id')->references('usuario_id')->on('usuarios');
            $table->foreign('disciplina_id')->references('disciplina_id')->on('disciplinas');
        });
    }

    public function down()
    {
        Schema::drop('revisoes');
    }
}