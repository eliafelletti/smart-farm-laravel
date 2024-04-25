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
        Schema::table('smart_farms', function (Blueprint $table) {
            $table->unsignedBigInteger('id_proprietario')->after('cap')->nullable();

            $table->foreign('id_proprietario')->references('id')->on('owners');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('smart_farms', function (Blueprint $table) {
            $table->dropForeign('smart_farms_id_proprietario_foreign');
            $table->dropColumn('id_proprietario');
        });
    }
};
