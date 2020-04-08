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
            $table->string('product_code', 5000)->nullable();
            $table->interger('product_id')->nullable();
            $table->interger('product_group_id')->nullable();
            $table->interger('product_type_id')->nullable();
            $table->interger('creator_id', 18)->nullable();
            $table->interger('stock')->default(1);
            $table->interger('sale_limit', 255)->nullable();
            $table->interger('price', 255)->nullable();
            $table->datetime('delivery_date')->nullable();
            $table->boolean('del_flg')->default(0);
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
