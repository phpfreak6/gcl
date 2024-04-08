<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('request_id')->nullable();
            $table->string('reference')->nullable();
            $table->string('origin_country')->nullable();
            $table->string('origin_postal')->nullable();
            $table->string('origin_name')->nullable();
            $table->string('origin_email')->nullable();
            $table->string('origin_phone')->nullable();
            $table->string('origin_city')->nullable();
            $table->string('origin_address')->nullable();

            $table->string('destination_country')->nullable();
            $table->string('destination_postal')->nullable();
            $table->string('destination_name')->nullable();
            $table->string('destination_email')->nullable();
            $table->string('destination_phone')->nullable();
            $table->string('destination_city')->nullable();
            $table->string('destination_address')->nullable();

            $table->string('total_items')->nullable();
            $table->string('total_weight')->nullable();
            $table->string('total_price')->nullable();
            $table->string('service_code')->nullable();

            $table->string('type')->nullable();
            $table->string('tracking_codes')->nullable();
            $table->string('tracking_urls')->nullable();
            $table->string('uri')->nullable();
            $table->string('key')->nullable();
            $table->string('tracking_request_id')->nullable();
            $table->string('tracking_request_hash')->nullable();
            $table->string('label_size')->nullable();
            $table->string('courier')->nullable();
            $table->string('dc_service_id')->nullable();
            $table->string('dc_request_id')->nullable();

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
        Schema::dropIfExists('bookings');
    }
}
