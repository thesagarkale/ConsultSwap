<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ticks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticks', function (Blueprint $table) {
            $table->id();
            $table->string('related_type');
            $table->unsignedBigInteger('related_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('ticks', function (Blueprint $table) {
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
        Schema::dropIfExists(('ticks'));
    }
}
