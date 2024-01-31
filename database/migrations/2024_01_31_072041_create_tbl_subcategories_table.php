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
        Schema::create('tbl_subcategories', function (Blueprint $table) {
            $table->increments('subcategory_id');
            $table->string('subcategory_name', 25)->nullable(false);
            $table->unsignedInteger('category')->nullable(false);
            $table->tinyInteger('is_deleted')->default(0);
            $table->timestamps();

            $table->foreign('category')->references('category_id')->on('tbl_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_subcategories');
    }
};
