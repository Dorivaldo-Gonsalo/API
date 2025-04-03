<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubrespTable extends Migration
{
    public function up()
    {
        Schema::create('subresp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_resp')->constrained('respostas');
            $table->string('texto', 255)->nullable();
            $table->integer('classific')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subresp');
    }
}
