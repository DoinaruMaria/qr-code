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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nume');
            $table->date('data');
            $table->date('excert');
            $table->text('descriere');
            $table->string('locatie');
            $table->string('logo');
            $table->string('cover');
            $table->string('thumbnail');
            $table->string('porti_acces');
            $table->integer('editie');
            $table->string('culoare_primara');
            $table->string('culoare_secundara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

