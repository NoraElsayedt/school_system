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
        Schema::create('student__accounts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('type');
            // $table->foreignId('student_id')->constrained('students');
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');

            $table->foreignId('grade_id')->references('id')->on('grades')->onDelete('cascade');

            $table->foreignId('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');

            // $table->foreignId('grade_id')->constrained();
            // $table->foreignId('classroom_id')->constrained();
          
            $table->foreignId('fee_invoice_id')->nullable()->references('id')->on('fee__invoices')->onDelete('cascade');
            $table->foreignId('receipt_student_id')->nullable()->references('id')->on('receipt__students')->onDelete('cascade');

            $table->decimal('debit',8,2)->nullable();
            $table->decimal('credit',8,2)->nullable();

            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student__accounts');
    }
};
