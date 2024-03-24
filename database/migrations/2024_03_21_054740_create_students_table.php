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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->foreignId('blood_id')->constrained();
            $table->foreignId('nationalitie_id')->constrained();
            $table->foreignId('gender_id')->constrained();
            $table->date('Date_of_Birth');
            $table->foreignId('grade_id')->constrained();
            $table->foreignId('classroom_id')->constrained();
            $table->foreignId('section_id')->constrained();
            $table->foreignId('myparent_id')->constrained();
            $table->string('academic_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
