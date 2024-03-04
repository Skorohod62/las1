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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('administrator_id');
            $table->unsignedFloat('total_price');
            $table->string('address');
            $table->enum('payment_method', \App\Enum\PaymentEnum::toArray());
            $table->enum('payment_status', \App\Enum\PaymentStatusEnum::toArray());
            $table->date('date');
            $table->enum('status', \App\Enum\OrderStatusEnum::toArray());
            $table->date('order_date');
            $table->timestamps();

            $table->index('user_id', 'orders_users_idx');
            $table->index('administrator_id', 'admin_idx');

            $table->foreign('user_id', 'orders_users_fk')->references('id')->on('users');
            $table->foreign('administrator_id', 'admin_fk')->references('id')->on('users');
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
