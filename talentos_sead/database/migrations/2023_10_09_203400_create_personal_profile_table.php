<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_profile', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_data_id'); //chave estrangeira 
            $table->string('habespacial');
            $table->string('habcorporal');
            $table->string('habmusical');
            $table->string('hablinguistica');
            $table->string('habmath');
            $table->string('habinterpessoal');
            $table->string('habnatureba');
            $table->string('habemocional');
            $table->string('deadlines');
            $table->string('suggestion')->nullable();
            $table->json('setorop')->nullable();
            $table->json('habsace')->nullable();
            $table->json('atividadesp')->nullable();
            $table->timestamps();
            $table->foreign('personal_data_id')
            ->references('id')
            ->on('personal_data')
            ->onDelete('cascade'); // Define a ação em cascata ao excluir o usuário

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_profile');
    }
};
