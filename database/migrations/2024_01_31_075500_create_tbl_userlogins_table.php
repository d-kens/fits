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
        Schema::create('tbl_userlogins', function (Blueprint $table) {
            $table->increments('userlogin_id');
            $table->unsignedInteger('user_id');
            $table->string('user_ip', 25);
            $table->dateTime('login_time');
            $table->dateTime('logout_time')->nullable();
            $table->tinyInteger('is_deleted')->default(0);

            $table->foreign('user_id')->references('user_id')->on('tbl_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_userlogins');
    }
};
