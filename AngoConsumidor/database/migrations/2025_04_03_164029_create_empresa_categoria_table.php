<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaCategoriaTable extends Migration
{
    public function up()
    {
        Schema::create('empresa_categoria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empresa')->constrained('empresas');
            $table->foreignId('id_categoria')->constrained('categorias');
            $table->unique(['id_empresa', 'id_categoria']); // garante que a mesma empresa não pode ter a mesma categoria duplicada
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empresa_categoria');
    }
}
