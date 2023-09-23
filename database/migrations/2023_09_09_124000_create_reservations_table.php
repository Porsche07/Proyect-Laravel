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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('reservation_id');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->foreignId('calendar_id')->constrained('calendars', 'calendar_id');
            $table->foreignId('shift_id')->constrained('shifts', 'shift_id');
            $table->dateTime('date')->default(now());
            $table->decimal('party_size', 5, 2)->nullable();
            $table->string('status', 10);
            $table->decimal('total', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
