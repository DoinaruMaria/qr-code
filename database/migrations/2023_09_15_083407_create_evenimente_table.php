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
        Schema::create('evenimente', function (Blueprint $table) {
            $table->id();
            $table->string('nume');
            $table->date('data');
            $table->text('descriere');
            $table->string('locatie');
            $table->string('logo');
            $table->string('cover');
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
        Schema::dropIfExists('evenimente');
    }
};
