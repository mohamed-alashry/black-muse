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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->morphs('payable');
            $table->string('payment_reference')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('brand')->nullable(); // VISA, MADA, MasterCard etc.
            $table->string('action')->nullable();

            $table->enum('status', [
                'pending',
                'paid',
                'failed',
                'canceled',
                'expired',
            ])->default('pending');

            $table->decimal('amount', 10, 2);
            $table->string('currency', 10)->default('SAR');

            $table->json('raw_response')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
