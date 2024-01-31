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
        Schema::create('tbl_orderdetails', function (Blueprint $table) {
            $table->increments('orderdetails_id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_id');
            $table->double('product_price');
            $table->integer('order_quantity')->default(1);
            $table->double('orderdetails_total');
            $table->tinyInteger('is_deleted')->default(0);
            $table->timestamps();

            $table->foreign('order_id')->references('order_id')->on('tbl_order');
            $table->foreign('product_id')->references('product_id')->on('tbl_products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_orderdetails');
    }
};
