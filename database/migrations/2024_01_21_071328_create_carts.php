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
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('card_id');
            
            $table->foreignId('product')->constrained('all_products', 'id') 
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreignId('category')->constrained('categories', 'id') 
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->integer('quantity');
            $table->decimal('price', 60, 10);
            
            $table->foreignId('added_by')->constrained('user_detail', 'id') 
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->default(0);

            $table->softDeletes();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};