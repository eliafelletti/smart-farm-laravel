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
        Schema::create('user_requests', function (Blueprint $table) {
            $table->id();

            $table->string('tipologia_mittente');
            $table->text('descrizione');
            $table->date('data');
            $table->boolean('completata');
            $table->unsignedBigInteger('id_proprietario')->nullable();
            $table->unsignedBigInteger('id_azienda_fornitrice')->nullable();

            $table->foreign('id_proprietario')->references('id')->on('owners')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('id_azienda_fornitrice')->references('id')->on('supplier_companies')->cascadeOnUpdate()->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_requests', function (Blueprint $table) {
            $table->dropForeign('user_requests_id_proprietario_foreign');
            $table->dropForeign('user_requests_id_azienda_fornitrice_foreign');
        });

        Schema::dropIfExists('user_requests');
    }
};
