<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
{
    Schema::create('personal_data', function (Blueprint $table) {
        $table->id();
        $table->string('firstname', 45);
        $table->string('lastname', 45);
        $table->date('birthdate');
        $table->string('cep', 9);
        $table->char('uf', 3);
        $table->string('cidade', 10);
        $table->string('bairro', 50);
        $table->string('endereco', 255);
        $table->string('telefone', 11);
        $table->string('firstquestion', 255);
        $table->string('atuanaarea')->nullable();
        $table->string('degreetextarea')->nullable();
        $table->string('bloodtype', 3);
        $table->string('raca', 50);
        $table->string('doador', 25);
        $table->string('genero');
        $table->string('tinycourses', 1000);
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('personal_data');
    }
};
