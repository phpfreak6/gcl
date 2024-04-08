<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_temps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('description')->nullable();
            $table->string('email')->nullable();
            $table->string('origin_name')->nullable();
            $table->string('origin_address_1')->nullable();
            $table->string('origin_address_2')->nullable();
            $table->string('origin_city')->nullable();
            $table->string('origin_country')->nullable();
            $table->string('origin_postal')->nullable();
            $table->string('origin_contact_name')->nullable();
            $table->string('origin_email')->nullable();
            $table->string('origin_phone')->nullable();
            $table->string('destination_name')->nullable();
            $table->string('destination_address_1')->nullable();
            $table->string('destination_address_2')->nullable();
            $table->string('destination_city')->nullable();
            $table->string('destination_country')->nullable();
            $table->string('destination_postal')->nullable();
            $table->string('destination_contact_name')->nullable();
            $table->string('destination_email')->nullable();
            $table->string('destination_phone')->nullable();
            $table->string('collection_note')->nullable();
            $table->string('delivery_instructions')->nullable();

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
        Schema::dropIfExists('booking_temps');
    }
}
