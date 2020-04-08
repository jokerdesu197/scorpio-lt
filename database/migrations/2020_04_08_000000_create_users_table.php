<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('login_id', 18)->unique();
            $table->string('email')->unique();
            $table->datetime('birth')->nullable();
            $table->tinyInteger('sex')->nullable();
            $table->string('password', 18)->bcryt();
            $table->interger('creator_id')->nullable();
            $table->datetime('login_date')->nullable();
            $table->boolean('status')->default(0);
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->boolean('del_flg')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
