<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('product_id')->unsigned()->nullable(;
            $table->foreign('product_id')->references('id')->on('products'));
            $table->integer('product_class_id')->unsigned()->nullable(;
            $table->foreign('product_class_id')->references('id')->on('product_classes'));
            $table->string('product_name', 50)->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('total')->nullable();
            $table->string('email', 18)->nullable();
            $table->datetime('deleted_at')->nullable();
            $table->timestamps()->default('CURRENT_TIMESTAMP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
}
