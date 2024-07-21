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
        Schema::create('cart_order_confirm_details', function (Blueprint $table) {
            $table->id();
            $table->integer('cart_order_id')->nullable();
            $table->string('invoice', 225);
            $table->string('products')->nullable();
            $table->string('address',255)->nullable();
            $table->double('amount_paid')->default(0.0);
            $table->integer('paid')->default(0);
            $table->string('added_by');
            $table->timestamps();
        });
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_order_confirm_details');
    }
};