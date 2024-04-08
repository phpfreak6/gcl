<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dcID')->nullable();
            $table->string('user_code')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone_no')->nullable();
            $table->string('company_name')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('industry')->nullable();
            $table->string('vat')->nullable();
            $table->string('business_location')->nullable();
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->string('town')->nullable();
            $table->string('city')->nullable();
            $table->string('postal')->nullable();
            $table->string('country')->nullable();
            $table->string('contact_first_name')->nullable();
            $table->string('contact_last_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone_no')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('active')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
