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
        Schema::disableForeignKeyConstraints();

        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->foreignId('page_id')->constrained();
            $table->json('subtitle')->nullable();
            $table->json('content')->nullable();
            $table->string('sort')->default('1');
            $table->boolean('viewable')->default(1);
            $table->boolean('editable')->default(1);
            $table->boolean('deletable')->default(1);
            $table->enum('status', ["active","inactive"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
