<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->json('text');
            $table->enum('type', [
                "text",
                "textarea",
                "select",
                "radio",
                "checkbox",
                "number",
                "date",
                "file-upload",
                "color-select",
                "image-select"
            ])->default('text');
            $table->unsignedSmallInteger('sort')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
