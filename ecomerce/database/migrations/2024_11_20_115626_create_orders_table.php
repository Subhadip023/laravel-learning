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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); 
            $table->integer('quantity')->default(1); 
            $table->decimal('price', 10, 2); 
            $table->enum('status', [
                'pending',      // Order is pending
                'completed',    // Order is completed
                'canceled',     // Order is canceled
                'shipped',      // Order is shipped
                'processing',   // Order is being processed
                'on_hold',      // Order is on hold
                'failed',       // Order failed (e.g., payment failure)
                'refunded',     // Order is refunded
                'delivered'     // Order is delivered
            ])->default('pending');
                        $table->string('payment_method')->nullable(); 
            $table->foreignId('shipping_address_id')->nullable()->constrained('addresses')->onDelete('set null'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
