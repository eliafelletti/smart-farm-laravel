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
        Schema::create('realized_crops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proprietario')->nullable();
            $table->unsignedBigInteger('id_serra')->nullable();
            $table->unsignedBigInteger('id_coltura')->nullable();
            $table->date('data_semina');
            $table->date('data_raccolta_teorica');
            $table->date('data_raccolta_effettiva')->nullable();

            $table->timestamps();

            $table->foreign('id_proprietario')->references('id')->on('owners')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('id_serra')->references('id')->on('green_houses')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('id_coltura')->references('id')->on('cultivations')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {        
        Schema::table('realized_crops', function (Blueprint $table) {
            $table->dropForeign('realized_crops_id_coltura_foreign');
            $table->dropForeign('realized_crops_id_proprietario_foreign');
            $table->dropForeign('realized_crops_id_serra_foreign');
        });

        Schema::dropIfExists('realized_crops');
    }
};
