<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_code', 10)->nullable();
            $table->foreign('product_id')->references('id')->on('products')->nullable();
            $table->foreign('product_group_id')->references('id')->on('product_groups')->nullable();
            $table->foreign('product_type_id')->references('id')->on('product_types')->nullable();
            $table->foreign('creator_id')->references('id')->on('users')->nullable();
            $table->interger('stock')->default(1);
            $table->interger('sale_limit', 255)->nullable();
            $table->interger('price', 255)->nullable();
            $table->datetime('delivery_date')->nullable();
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
        Schema::dropIfExists('product_classes');
    }
}
