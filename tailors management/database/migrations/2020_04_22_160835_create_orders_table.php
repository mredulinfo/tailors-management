<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('customer_id')->nullable();
            $table->integer('date');
            $table->integer('cloth_code');
            $table->string('customer_name');
            $table->integer('mobile');
            $table->string('product_name');
            $table->integer('cus_h');
            $table->integer('cus_n');
            $table->integer('cus_b');
            $table->integer('cus_w');
            $table->text('process_by');
            $table->text('remark');
            $table->integer('order_total');
            $table->integer('order_advance');
            $table->integer('order_due');

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
        Schema::dropIfExists('orders');
    }
}
