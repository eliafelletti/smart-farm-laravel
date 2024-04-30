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
        Schema::create('used_technologies', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_tecnologia')->nullable();
            $table->unsignedBigInteger('id_smart_farm')->nullable();

            $table->timestamps();

            $table->foreign('id_tecnologia')->references('id')->on('technologies');
            $table->foreign('id_smart_farm')->references('id')->on('smart_farms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('used_technologies', function (Blueprint $table) {
            $table->dropForeign('used_technologies_id_tecnologia_foreign');
            $table->dropForeign('used_technologies_id_smart_farm_foreign');
        });

        Schema::dropIfExists('used_technologies');
    }
};
