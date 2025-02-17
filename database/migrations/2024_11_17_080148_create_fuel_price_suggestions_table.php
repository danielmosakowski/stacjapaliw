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
        Schema::create('fuel_price_suggestions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('station_fuel_type_id')->constrained('station_fuel_types')->onDelete('cascade');
            $table->decimal('suggested_price', 8, 2)->default(0);
            $table->string('photo_path')->nullable();
            $table->date('price_date'); // data ostatniej aktualizacji
            $table->boolean('approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_price_suggestions');
    }
};
