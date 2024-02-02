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
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name', 25)->nullable(false);
            $table->text('product_description')->nullable();
            $table->double('unit_price');
            $table->integer('available_quantity')->default(0);
            $table->unsignedInteger('subcategory_id')->nullable(false);
            $table->unsignedInteger('added_by')->nullable(false);
            $table->tinyInteger('is_deleted')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('subcategory_id')->references('subcategory_id')->on('tbl_subcategories');
            $table->foreign('added_by')->references('user_id')->on('tbl_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_products');
    }
};
