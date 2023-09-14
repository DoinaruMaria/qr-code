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
        Schema::create('evenimentes', function (Blueprint $table) {
            $table->id();
            $table->string('nume');
            $table->date('data');
            $table->string('descriere');
            $table->string('locatie');
            $table->logo();
            $table->cover();
            $table->string('porti_acces');
            $table->integer('editie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenimentes');
    }
};
