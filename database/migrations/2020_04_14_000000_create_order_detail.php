<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailTable extends Migration
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
            $table->foreign('order_id')->references('id')->on('orders')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->nullable();
            $table->foreign('product_class_id')->references('id')->on('product_classes')->nullable();
            $table->string('product_name', 50)->nullable();
            $table->integer('quantity', 11)->nullable();
            $table->integer('total', 11)->nullable();
            $table->string('email', 18)->nullable();
            $table->datetime('deleted_at')->nullable();
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
        Schema::dropIfExists('order_detail');
    }
}
