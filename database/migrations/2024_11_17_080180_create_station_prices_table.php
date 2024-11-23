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
        Schema::create('station_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('station_id')->constrained()->onDelete('cascade');
            $table->foreignId('station_fuel_type_id')->constrained('station_fuel_types')->onDelete('cascade');
            $table->decimal('price', 8, 2); // cena paliwa
            $table->date('price_date'); // data, kiedy cena była aktualna
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('station_prices');
    }
};
