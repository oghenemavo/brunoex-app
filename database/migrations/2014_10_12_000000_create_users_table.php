<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->json('profile')->nullable();
            $table->json('account')->nullable();
            $table->json('kyc')->nullable();
            $table->json('kyc_verified')->nullable();
            $table->string('kyc_status')->nullable();
            $table->string('kyc_submitted')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('status')->default('ACTIVE');
            $table->timestamps();
            $table->string('last_login_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
