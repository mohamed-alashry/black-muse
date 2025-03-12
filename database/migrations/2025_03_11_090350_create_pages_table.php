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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('meta_title')->nullable();
            $table->json('meta_desc')->nullable();
            $table->boolean('viewable')->default(1);
            $table->boolean('editable')->default(1);
            $table->boolean('deletable')->default(0);
            $table->enum('status', ["active","inactive"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
