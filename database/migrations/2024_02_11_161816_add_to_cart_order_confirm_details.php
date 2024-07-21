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
        Schema::table('cart_order_confirm_details', function (Blueprint $table) {
            $table->string('gateway_payment_id',100)->after('added_by') ;
            $table->string('gateway_order_id',100)->after('gateway_payment_id') ; 
            $table->string('gateway_signature',100)->after('gateway_order_id') ; 

        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart_order_confirm_details', function (Blueprint $table) {
            //
        });
    }
};