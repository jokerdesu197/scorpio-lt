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
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('product_groups')->nullable();
            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users')->nullable();
            $table->string('search_word', 50)->unique();
            $table->string('title', 50)->nullable();
            $table->string('description', 5000)->nullable();
            $table->string('unit', 10)->nullable();
            $table->string('brand', 18)->nullable();
            // $table->integer('supplier_id')->unsigned();
            $table->string('supplier_id', 18)->references('id')->on('suppliers')->nullable();
            $table->string('tags', 18)->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
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
