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
        Schema::create('question_dependencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_option_id')->constrained()->cascadeOnDelete();
            $table->foreignId('child_question_id')->constrained('questions')->cascadeOnDelete();
            $table->unsignedTinyInteger('sort')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_dependencies');
    }
};
