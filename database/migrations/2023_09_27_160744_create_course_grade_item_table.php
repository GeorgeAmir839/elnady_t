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
        Schema::create('course_grade_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grade_item_id')->constrained('grade_items'); 
            $table->foreignId('course_id')->constrained('courses'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_grade_item');
    }
};
