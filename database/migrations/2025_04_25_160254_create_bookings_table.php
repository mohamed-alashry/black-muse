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

        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number')->unique();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->foreignId('package_id')->constrained()->cascadeOnDelete();
            $table->date('event_date');
            $table->decimal('paid_amount');
            $table->decimal('remaining_amount');
            $table->decimal('total_price');
            $table->text('notes')->nullable();
            $table->enum('payment_stage', ["down_payment", "full_payment"])->default('down_payment');
            $table->enum('payment_status', [
                'pending',
                'paid',
                'failed',
                'canceled',
                'expired',
            ])->default('pending');
            $table->enum('status', ["pending", "new", "confirmed", "completed", "canceled"])->default('pending');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
