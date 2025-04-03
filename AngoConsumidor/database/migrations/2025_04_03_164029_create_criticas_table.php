<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriticasTable extends Migration
{
    public function up()
    {
        Schema::create('criticas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_servico', 100);
            $table->string('texto', 255);
            $table->integer('classific')->nullable();
            $table->foreignId('id_user')->constrained('usuarios');
            $table->foreignId('id_emp')->constrained('empresas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('criticas');
    }
}
