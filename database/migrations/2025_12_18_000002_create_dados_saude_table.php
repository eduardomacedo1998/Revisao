<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadosSaudeTable extends Migration
{
    public function up()
    {
        Schema::create('dados_saude', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->decimal('peso', 5, 2);
            $table->decimal('altura', 3, 2);
            $table->decimal('peso_pretendido', 5, 2);
            $table->date('data_registro');
            $table->index('usuario_id');
        });
    }

    public function down()
    {
        Schema::drop('dados_saude');
    }
}