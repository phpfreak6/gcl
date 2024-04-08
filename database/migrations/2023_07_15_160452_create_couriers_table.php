<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('preset_id');
            $table->string('Name');
            $table->string('service_id');
            $table->string('service_key')->nullable();
            $table->string('service_code')->nullable();
            $table->string('service_surcharge')->nullable();
            $table->string('global_product_code')->nullable();
            $table->string('local_product_code')->nullable();
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
        Schema::dropIfExists('couriers');
    }
}
