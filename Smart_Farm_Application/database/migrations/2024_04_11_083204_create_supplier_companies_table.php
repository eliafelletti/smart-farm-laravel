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
        Schema::create('supplier_companies', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->string('mail')->unique();
            $table->string('telefono');
            $table->string('fax')->nullable();
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
        Schema::dropIfExists('supplier_companies');
    }
};
