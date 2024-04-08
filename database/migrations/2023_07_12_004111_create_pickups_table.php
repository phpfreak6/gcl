<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->string('earliest_time');
            $table->string('latest_time');
            $table->text('instructions')->nullable();
            $table->string('no_packages')->default(1);
            $table->string('weight');
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->string('courier');
            $table->text('admin_comment')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();

            // Setup foreign key on customer_id
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');

            // Setup foreign key on admin_id, note that onDelete('set null') might be desired if admin can be removed but you want to keep the pickup record
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('set null'); // or omit onDelete if cascading delete is not desired
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pickups');
    }
}
