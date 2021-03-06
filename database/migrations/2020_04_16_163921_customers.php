<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Customers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('login_id', 18)->unique();
            $table->string('tel_num', 18)->nullable();
            $table->string('email', 254)->unique();
            $table->datetime('birth')->nullable();
            $table->tinyInteger('sex')->nullable();
            $table->string('address', 50)->nullable();
            $table->string('password', 18)->bcryt();
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->integer('creator_id')->unsigned()->nullable();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->datetime('login_date')->nullable();
            $table->boolean('status')->default(0);
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('customers');
    }
}
