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
        Schema::create('reservation_dish', function (Blueprint $table) {
            $table->foreignId('reservation_id');
            $table->foreignId('dish_id');
            $table->integer('quantity');
            $table->primary(['reservation_id', 'dish_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_dish');
    }
};
