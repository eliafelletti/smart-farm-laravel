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
        Schema::table('measures', function (Blueprint $table) {
            $table->unsignedBigInteger('id_serra')->after('luminosita')->nullable();

            $table->foreign('id_serra')->references('id')->on('green_houses')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('measures', function (Blueprint $table) {
            $table->dropForeign('measures_id_serra_foreign');
            $table->dropColumn('id_serra');
        });
    }
};
