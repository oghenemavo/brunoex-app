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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->references('id')->on('transactions');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('plan');
            $table->decimal('amount', 16, 2);
            $table->decimal('profit', 16, 2);
            $table->json('details')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->dateTime('due_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investments');
    }
};
