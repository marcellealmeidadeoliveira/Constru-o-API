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
        Schema::create('tbremedios', function (Blueprint $table) {
            $table->id();
              $table->string('nome');

            $table->string('indicacao');

           $table->string('codigoDeBarras');

            $table->string('peso');

            $table->string('NecessarioReceita?');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbremedios');
    }
};
