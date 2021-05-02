<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TickTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tick_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tick_id');
            $table->unsignedInteger('credit')->nullable();
            $table->unsignedInteger('debit')->nullable();
            $table->integer('balance')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
        });

        Schema::table('tick_transactions', function (Blueprint $table) {
            $table->foreign('tick_id')->references('id')->on('ticks');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tick_transactions');
    }
}
