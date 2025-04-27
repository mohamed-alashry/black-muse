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
        Schema::disableForeignKeyConstraints();

        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->json('description')->nullable();
            $table->decimal('base_price')->default(0);
            $table->enum('status', ["active", "inactive"])->default('active');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
