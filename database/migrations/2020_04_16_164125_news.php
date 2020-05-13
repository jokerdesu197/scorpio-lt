<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('news_code', 10)->unique();
            $table->string('name', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->datetime('news_date')->nullable();
            $table->string('search_word', 50)->nullable();
            $table->string('news_url', 255)->nullable();
            $table->string('description', 5000)->nullable();
            $table->string('news_type', 255)->nullable();
            $table->string('source', 255)->nullable();
            $table->string('tags', 50)->nullable();
            $table->integer('creator_id')->unsigned()->nullable(;
            $table->foreign('creator_id')->references('id')->on('users'));
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
        Schema::dropIfExists('news');
    }
}
