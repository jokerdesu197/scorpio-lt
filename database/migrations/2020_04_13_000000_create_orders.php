<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->string('order_code', 10)->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->nullable();
            $table->foreign('payment_id')->references('id')->on('payments')->nullable();
            $table->integer('total_price', 11)->nullable();
            $table->string('tel_num', 18)->nullable();
            $table->string('email', 18)->nullable();
            $table->string('order_address', 50)->nullable();
            $table->string('message', 100)->nullable();
            $table->tinyInteger('status', 100)->default(8);
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
