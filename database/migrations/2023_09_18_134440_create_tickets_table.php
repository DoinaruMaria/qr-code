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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->uuid('event_id');
            $table->timestamp('purchase_date')->nullable();
            $table->string("entry_location");
            $table->timestamp('scanned_at')->nullable();
             $table->unsignedBigInteger('gate_id')->nullable();
            $table->unsignedInteger('scan_count')->default(0);
            $table->timestamps();

            // Chei străine
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('gate_id')->references('id')->on('gates')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
