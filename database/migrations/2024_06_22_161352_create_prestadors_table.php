<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestadorsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prestadors', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('numero');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestadors');
    }
}