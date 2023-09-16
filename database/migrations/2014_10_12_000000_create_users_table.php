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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nume');
            $table->string('prenume');
            $table->string('email')->unique();
            $table->string('telefon');
            $table->string('tip'); 
            $table->string('judet'); 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->string('idBilet');
            // $table->boolean('tipUser');
            // $table->string('idPoartaAcces');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
