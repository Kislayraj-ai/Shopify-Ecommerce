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
        Schema::table('all_products', function (Blueprint $table) {
            $table->string('product_image_path' , 255)->nullable()->after('product_online_date') ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('all_products', function (Blueprint $table) {
            //
        });
    }
};