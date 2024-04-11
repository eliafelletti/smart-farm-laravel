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
        Schema::create('smart_farms', function (Blueprint $table) {
            $table->id();
            
            $table->string('nome');
            $table->float('dimensione');
            $table->string('telefono');
            $table->string('mail');
            $table->string('via');
            $table->string('civico');
            $table->string('citta');
            $table->string('cap');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smart_farms');
    }
};
