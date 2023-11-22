<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormatMeasurementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('format_measurement', function (Blueprint $table) {
            $table->unsignedBigInteger('format_id');
            $table->unsignedBigInteger('measurement_id');

            $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade');
            $table->foreign('measurement_id')->references('id')->on('measurements')->onDelete('cascade');

            $table->primary(['format_id', 'measurement_id']);
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
        Schema::dropIfExists('format_measurement');
    }
}
