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
        Schema::table('green_houses', function (Blueprint $table) {
            $table->unsignedBigInteger('id_smart_farm')->after('numero_piante')->nullable();

            $table->foreign('id_smart_farm')->references('id')->on('smart_farms')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('green_houses', function (Blueprint $table) {
            $table->dropForeign('green_houses_id_smart_farm_foreign');
            $table->dropColumn('id_smart_farm');
        });
    }
};
