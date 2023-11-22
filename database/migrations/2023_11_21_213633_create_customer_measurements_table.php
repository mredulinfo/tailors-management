<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_measurements', function (Blueprint $table) {
            $table->bigIncrements('id'); // Use bigIncrements instead of id
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('measurement_id');
            $table->string('value'); // or another appropriate data type
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('measurement_id')->references('id')->on('measurements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_measurements');
    }
}
