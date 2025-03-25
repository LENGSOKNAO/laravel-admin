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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->json('product_category');  
            $table->string('product_brand'); 
            $table->json('product_sizes')->nullable();  
            $table->text('product_description')->nullable();
            $table->decimal('product_regular_price');
            $table->decimal('product_sale_price');
            $table->integer('product_qty');
            $table->boolean('product_is_enable')->default(true);
            $table->boolean('product_comming_soon')->default(true);
            $table->string('product_image');
            $table->json('product_list_image')->nullable();     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
