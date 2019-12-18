<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('od_id');
            $table->biginteger('ord_id')->unsigned();
            $table->biginteger('product_id')->unsigned();
            $table->biginteger('product_qty');
            $table->biginteger('product_price');
            $table->timestamps();
            $table->foreign('ord_id')->references('ord_id')->on('orders');
            $table->foreign('product_id')->references('product_id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}