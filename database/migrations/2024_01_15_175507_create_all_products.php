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
        Schema::create('all_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name',255);
            $table->string('product_description',255);
            $table->decimal('product_price', 60, 2)->default(0); // Changed to 'decimal' for price with precision
            $table->unsignedBigInteger('product_category')->default(0);
            $table->timestamp('product_online_date')->default(now());
            $table->softDeletes() ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_products');
    }
};