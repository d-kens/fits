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
        Schema::create('tbl_apiusers', function (Blueprint $table) {
            $table->increments('apiuser_id');
            $table->string('username', 40);
            $table->string('key', 60);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_on')->nullable();
            $table->unsignedInteger('added_by')->nullable();
            $table->tinyInteger('is_deleted')->default(0);

            $table->foreign('added_by')->references('user_id')->on('tbl_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_apiusers');
    }
};
