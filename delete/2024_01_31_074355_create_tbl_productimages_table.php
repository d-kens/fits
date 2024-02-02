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
        Schema::create('tbl_productimages', function (Blueprint $table) {
            $table->increments('productimages_id');
            $table->string('product_image', 40);
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('added_by')->nullable();
            $table->tinyInteger('is_deleted')->default(0);

            $table->foreign('product_id')->references('product_id')->on('tbl_products');
            $table->foreign('added_by')->references('user_id')->on('tbl_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_productimages');
    }
};
