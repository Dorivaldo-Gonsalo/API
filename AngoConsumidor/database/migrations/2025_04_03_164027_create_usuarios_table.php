<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('apelido', 50)->nullable();
            $table->string('bi', 14)->unique();
            $table->char('genero', 1)->nullable();
            $table->string('telefone', 9)->nullable();
            $table->date('data_nasc');
            $table->string('provincia', 50);
            $table->string('municipio', 50)->nullable();
            $table->string('email', 100)->unique();
            $table->string('senha');
            $table->string('caminho_imagem', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
