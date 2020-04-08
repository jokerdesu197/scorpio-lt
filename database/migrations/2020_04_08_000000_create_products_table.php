<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('group_id', 50)->nullable();
            $table->interger('creator_id', 18)->nullable();
            $table->string('search_word')->unique();
            $table->string('title', 50)->nullable();
            $table->string('description', 5000)->nullable();
            $table->string('unit', 10)->nullable();
            $table->string('brand', 18)->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
