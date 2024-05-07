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
        Schema::create('realized_measures', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_tecnologia')->nullable();
            $table->unsignedBigInteger('id_misura')->nullable();

            $table->timestamps();

            $table->foreign('id_tecnologia')->references('id')->on('technologies')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('id_misura')->references('id')->on('measures')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('realized_measures', function (Blueprint $table) {
            $table->dropForeign('realized_measures_id_tecnologia_foreign');
            $table->dropForeign('realized_measures_id_misura_foreign');
        });

        Schema::dropIfExists('realized_measures');
    }
};
