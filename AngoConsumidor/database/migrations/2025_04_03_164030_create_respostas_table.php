<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespostasTable extends Migration
{
    public function up()
    {
        Schema::create('respostas', function (Blueprint $table) {
            $table->id();
            $table->string('texto', 255)->nullable();
            $table->integer('classific')->nullable();
            $table->foreignId('id_critica')->constrained('criticas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('respostas');
    }
}
