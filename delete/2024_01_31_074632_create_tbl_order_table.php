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
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->unsignedInteger('customer_id');
            $table->double('order_amount')->default(0);
            $table->enum('order_status', ['pending', 'pending payment', 'paid']);
            $table->unsignedInteger('payment_type')->nullable();
            $table->tinyInteger('is_deleted')->default(0);
            $table->timestamps();

            $table->foreign('customer_id')->references('user_id')->on('tbl_users');
            $table->foreign('payment_type')->references('paymenttype_id')->on('tbl_paymenttypes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_order');
    }
};
