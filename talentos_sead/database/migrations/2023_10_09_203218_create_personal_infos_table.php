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
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_data_id'); //foreign key
            $table->string('situacaofunc');
            $table->string('departament');
            $table->string('funcaogratificada');
            $table->string('timeofservice');
            $table->string('role');
            $table->string('permuta');
            $table->string('formadetrabalho');
            $table->string('teletrabalho');
            $table->string('reuniaotrabalho');
            $table->string('competencia');
            $table->string('hardcompetencia');
            $table->timestamps();
            $table->foreign('personal_data_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade'); // Define a ação em cascata ao excluir o usuário

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_infos');
    }
};
