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
        Schema::table('fuel_price_suggestions', function (Blueprint $table) {
            // Usuwamy kolumnę station_id
            $table->dropForeign(['station_id']);
            $table->dropColumn('station_id');

            // Dodajemy nową kolumnę station_fuel_type_id jako klucz obcy
            $table->foreignId('station_fuel_type_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fuel_price_suggestions', function (Blueprint $table) {
            $table->foreignId('station_id')->constrained()->onDelete('cascade');

            // Usuwamy kolumnę station_fuel_type_id
            $table->dropForeign(['station_fuel_type_id']);
            $table->dropColumn('station_fuel_type_id');
        });
    }
};
