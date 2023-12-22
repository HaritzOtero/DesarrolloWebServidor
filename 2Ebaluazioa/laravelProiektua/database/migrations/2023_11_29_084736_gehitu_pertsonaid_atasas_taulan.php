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
        Schema::table('atazas', function (Blueprint $table) {
            $table->bigInteger('pertsona_id')->unsigned();
            $table
                ->foreign('pertsona_id')
                ->references('id')
                ->on('pertsonas')  // Corrige el nombre de la tabla aquí
                ->after('izena');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('atazas', function (Blueprint $table) {
            $table->dropForeign(['pertsona_id']);
            $table->dropColumn('pertsona_id');
        });
    }
};
