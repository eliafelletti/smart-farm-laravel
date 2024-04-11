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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();

            $table->string('cf');
            $table->string('nome');
            $table->string('cognome');
            $table->date('data_nascita');
            $table->string('luogo_nascita');
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
        Schema::dropIfExists('owners');
    }
};
