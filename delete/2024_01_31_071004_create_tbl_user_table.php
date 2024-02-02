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
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('first_name', 25)->nullable(false);
            $table->string('last_name', 25)->nullable(false);
            $table->string('email', 60)->unique()->nullable(false);
            $table->string('password', 60);
            $table->enum('gender', ['male', 'female']);
            $table->unsignedInteger('role')->nullable(false);
            $table->tinyInteger('is_deleted')->default(0);
            $table->timestamps();

            $table->foreign('role')->references('role_id')->on('tbl_roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_users');
    }
};
