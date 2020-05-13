<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductClasses extends Migration
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
            $table->string('class_code', 10)->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('product_group_id')->unsigned()->nullable(;
            $table->foreign('product_group_id')->references('id')->on('product_groups'));
            $table->integer('product_type_id')->unsigned()->nullable();
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->integer('creator_id')->unsigned()->nullable();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->integer('stock')->default(1);
            $table->integer('sale_limit')->value(225)->nullable();
            $table->integer('price')->nullable();
            $table->datetime('delivery_date')->nullable();
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
        Schema::dropIfExists('product_classes');
    }
}
