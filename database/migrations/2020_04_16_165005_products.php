<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('product_code', 10)->unique();
            $table->string('name', 255);
            $table->integer('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on('product_groups');
            $table->integer('creator_id')->unsigned()->nullable(;
            $table->foreign('creator_id')->references('id')->on('users'));
            $table->string('search_word', 50)->unique();
            $table->string('title', 50)->nullable();
            $table->string('description', 5000)->nullable();
            $table->string('unit', 10)->nullable();
            $table->string('brand', 18)->nullable();
            $table->string('supplier_id')->unsigned()->nullable();
            $table->string('supplier_id')->references('id')->on('suppliers');
            $table->string('tags', 18)->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps()->default('CURRENT_TIMESTAMP');
            $table->datetime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
