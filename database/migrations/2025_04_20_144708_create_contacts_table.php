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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable()->constrained('clients')->nullOnDelete();
            $table->string('email');
            $table->string('name');
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', ["new", "in-progress", "finished"])->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
