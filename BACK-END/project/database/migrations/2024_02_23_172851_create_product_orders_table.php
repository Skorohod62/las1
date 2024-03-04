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
        Schema::create('product_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('quantity');
            $table->unsignedFloat('subtotal_price');
            $table->timestamps();

            $table->index('order_id', 'product_orders_order_idx');
            $table->index('product_id', 'product_orders_products_idx');

            $table->foreign('order_id', 'product_orders_orders_fk')->references('id')->on('orders');
            $table->foreign('product_id', 'product_orders_products_fk')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_orders');
    }
};
