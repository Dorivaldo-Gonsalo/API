<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('endereco', 100)->nullable();
            $table->string('email', 100)->unique();
            $table->string('caminho_imagem', 255)->nullable();
            $table->string('senha');
            $table->foreignId('id_representante')->constrained('representantes');
            $table->string('telefone', 9)->nullable();
            $table->integer('ano_util')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
