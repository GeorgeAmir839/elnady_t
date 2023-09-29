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
        Schema::create('student_grade_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students'); 
            $table->foreignId('grade_item_id')->constrained('grade_items'); 
            $table->decimal('grade', 8, 2); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_grade_item');
    }
};
