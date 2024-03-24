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
        Schema::create('myparents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            // information of parent 
            $table->string('name_f');
            $table->string('national_id_f');
            $table->string('passport_id_f');
            $table->string('phone_f');
            $table->string('job_f');
            $table->foreignId('blood_id')->constrained();
            $table->foreignId('nationalitie_id')->constrained();
            $table->foreignId('religion_id')->constrained();
            $table->string('address_f');
            // information of mother 
            $table->string('name_m');
            $table->string('national_id_m');
            $table->string('passport_id_m');
            $table->string('phone_m');
            $table->string('job_m');
            $table->foreignId('blood_id_m')->constrained('bloods');
            $table->foreignId('nationalitie_id_m')->constrained('nationalities');
            $table->foreignId('religion_id_m')->constrained('religions');
            $table->string('address_m');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('myparents');
    }
};
