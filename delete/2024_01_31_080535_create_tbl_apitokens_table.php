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
        Schema::create('tbl_apitokens', function (Blueprint $table) {
            $table->increments('apitoken_id');
            $table->unsignedInteger('api_userid');
            $table->unsignedInteger('api_productid');
            $table->string('api_token', 40);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('expires_on')->nullable();
            $table->tinyInteger('is_deleted')->default(0);

            $table->foreign('api_userid')->references('apiuser_id')->on('tbl_apiusers');
            $table->foreign('api_productid')->references('apiproduct_id')->on('tbl_apiproducts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_apitokens');
    }
};
