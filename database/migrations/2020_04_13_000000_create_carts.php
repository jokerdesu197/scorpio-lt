<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_code', 10)->nullable();
            $table->foreign('product_id')->references('id')->on('products')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->nullable();
            $table->integer('quantity', 11)->nullable();
            $table->boolean('is_item_cancel')->default(1);
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
        Schema::dropIfExists('carts');
    }
}
