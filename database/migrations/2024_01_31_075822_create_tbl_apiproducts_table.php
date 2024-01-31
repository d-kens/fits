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
        Schema::create('tbl_apiproducts', function (Blueprint $table) {
            $table->increments('apiproduct_id');
            $table->enum('productname', ['userdetails', 'products', 'transactions']);
            $table->unsignedInteger('added_by')->nullable(false);
            $table->tinyInteger('is_deleted')->default(0);
            $table->timestamps();

            $table->foreign('added_by')->references('user_id')->on('tbl_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_apiproducts');
    }
};
