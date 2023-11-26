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

            // Foreign key to the customers table
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');

            // Other fields
            $table->date('date');
            $table->string('cloth_code');
            $table->string('customer_name')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->decimal('order_total', 8, 2)->nullable();
            $table->decimal('order_advance', 8, 2)->nullable();
            $table->decimal('order_due', 8, 2)->nullable();
            $table->string('order_processed_by')->nullable();
            $table->string('remark')->nullable();

            // Standard timestamps
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
