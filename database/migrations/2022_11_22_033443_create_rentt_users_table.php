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
        Schema::create('rentt_users', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('motor_id');
            $table->string('customer_name');
            $table->string('motor_model');
            $table->integer('rent_price');
            $table->integer('rent_duration');
            $table->date('rent_start');
            $table->date('rent_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentt_users');
    }
};
