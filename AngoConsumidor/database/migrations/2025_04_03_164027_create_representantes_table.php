<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentantesTable extends Migration
{
    public function up()
    {
        Schema::create('representantes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('apelido', 50)->nullable();
            $table->string('bi', 14)->unique();
            $table->string('sector', 100);
            $table->string('email', 100)->unique();
            $table->string('senha');
            $table->rememberToken();
            $table->string('caminho_imagem', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('representantes');
    }
}
