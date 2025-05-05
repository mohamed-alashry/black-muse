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
            $table->string('reference_number')->unique();
            $table->foreignId('client_id')->nullable()->constrained('clients')->nullOnDelete();
            $table->string('email');
            $table->string('name');
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->text('notes')->nullable();
            $table->enum('status', ["new", "in-progress", "closed"])->default('new');
            $table->text('reply_message')->nullable();
            $table->dateTime('replied_at')->nullable();
            $table->foreignId('replied_by')->nullable()->constrained('users')->nullOnDelete();
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
