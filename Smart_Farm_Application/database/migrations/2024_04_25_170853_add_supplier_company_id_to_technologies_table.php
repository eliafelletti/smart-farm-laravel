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
        Schema::table('technologies', function (Blueprint $table) {
            $table->unsignedBigInteger('id_azienda_fornitrice')->after('tipologia')->nullable();

            $table->foreign('id_azienda_fornitrice')->references('id')->on('supplier_companies')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('technologies', function (Blueprint $table) {
            $table->dropForeign('technologies_id_azienda_fornitrice_foreign');
            $table->dropColumn('id_azienda_fornitrice');
        });
    }
};
