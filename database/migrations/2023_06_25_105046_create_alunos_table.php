<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('slug');
            $table->string('pai')->nullable();
            $table->string('mae')->nullable();
            $table->string('morada');
            $table->string('telefone')->nullable();
            
            $table->string('curso');

            $table->integer('classe');
            $table->string('periodo');
            $table->string('sala');
            
            $table->string('turma');

            $table->string('imagem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
};
